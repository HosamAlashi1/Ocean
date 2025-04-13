<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function list(Request $request)
    {
        $lang = $request->header('lang');

        if (!in_array($lang, ['en', 'ar'])) {
            return sendError('Unsupported language', [
                'provided' => $lang,
                'you must send the lang on the header ,supported_languages' => ['en', 'ar']
            ], 400);
        }

        $title_column = "title_{$lang}";
        $desc_column = "desc_{$lang}";

        $selects = [
            'settings'          => ['key_id', "$title_column as title", 'value'],
            'services_with_id'  => ['id', "$title_column as title", "$desc_column as description", 'image'],
        ];

        try {
            $projects_settings = Setting::where('type_en', 'Projects Page Settings')
                ->where('key_id', 'like', "%{$lang}%")
                ->select($selects['settings'])
                ->get();

            $services = Service::where('show_on_recent_work', true)
                ->whereHas('works')
                ->select($selects['services_with_id'])
                ->with(['works' => fn($q) => $q->select('id', 'image', 'service_id')->orderByDesc('id')])
                ->get()
                ->transform(function ($service) {
                    $service->image = $service->image ? asset($service->image) : null;
                    $service->works = $service->works->map(function ($work) {
                        $work->image = $work->image ? asset($work->image) : null;
                        return $work;
                    });
                    return $service;
                });

            return sendResponse(compact(
                'projects_settings',
                'services'
            ), 'Projects data loaded successfully.');
        } catch (\Throwable $e) {
            return sendError('Failed to load homepage data', $e->getMessage(), 500);
        }
    }


}
