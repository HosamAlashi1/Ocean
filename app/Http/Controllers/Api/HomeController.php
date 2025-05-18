<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Process;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $lang = $request->header('lang') ?? 'en';

        if (!in_array($lang, ['en', 'ar'])) {
            return sendError('you must send the lang on the header ,Unsupported language', [
                'provided' => $lang,
                'supported_languages' => ['en', 'ar']
            ], 400);
        }

        $title_column = "title_{$lang}";
        $desc_column = "desc_{$lang}";
        $name_column = "name_{$lang}";

        $selects = [
            'settings'          => ['key_id', "$title_column as title", 'value'],
            'services'          => ['image', "$desc_column as description", "$title_column as title"],
            'services_with_id'  => ['id', "$title_column as title", "$desc_column as description", 'image'],
            'processes'         => ["$name_column as name", "$desc_column as description", 'image'],
            'blogs'             => ['image', "$title_column as title"],
        ];

        try {
            $home_settings = Setting::where('type_en', 'Home Page Settings')
                ->where('key_id', 'like', "%{$lang}%")
                ->select($selects['settings'])
                ->get();

            $general_settings = Setting::where('type_en', 'General Settings')
                ->select($selects['settings'])
                ->get();

            $our_services = Service::where('show_on_our_service', true)
                ->select($selects['services'])
                ->orderByDesc('id')
                ->limit(6)
                ->get()
                ->transform(function ($service) {
                    $service->image = $service->image ? asset($service->image) : null;
                    return $service;
                });

            $recent_services = Service::where('show_on_recent_work', true)
                ->whereHas('works')
                ->select($selects['services_with_id'])
                ->with(['works' => fn($q) => $q->select('id','type', 'image', 'service_id')->orderByDesc('id')])
                ->get()
                ->transform(function ($service) {
                    $service->image = $service->image ? asset($service->image) : null;
                    $service->works = $service->works->map(function ($work) {
                        $work->image = $work->image ? asset($work->image) : null;
                        $work->type = $work->type ?? 'image';
                        return $work;
                    });
                    return $service;
                });
                // return $recent_services;

            $process_steps = Process::select($selects['processes'])
                ->orderByDesc('id')
                ->limit(3)
                ->get()
                ->transform(function ($process) {
                    $process->image = $process->image ? asset($process->image) : null;
                    return $process;
                });

            $latest_blogs = Blog::select($selects['blogs'])
                ->orderByDesc('id')
                ->limit(3)
                ->get()
                ->transform(function ($blog) {
                    $blog->image = $blog->image ? asset($blog->image) : null;
                    return $blog;
                });

            return sendResponse(compact(
                'home_settings',
                'general_settings',
                'our_services',
                'recent_services',
                'process_steps',
                'latest_blogs'
            ), 'Homepage data loaded successfully.');
        } catch (\Throwable $e) {
            return sendError('Failed to load homepage data', $e->getMessage(), 500);
        }
    }

}
