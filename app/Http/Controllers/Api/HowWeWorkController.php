<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HowWeWorkController extends Controller
{

    public function list(Request $request)
    {
        $lang = $request->header('lang') ?? 'en';
        $supported_langs = ['en', 'ar'];

        if (!$lang || !in_array($lang, $supported_langs)) {
            return sendError('You must send a valid language in the header.', [
                'provided' => $lang,
                'supported_languages' => $supported_langs
            ], 400);
        }

        $title_col = "title_{$lang}";

        $selects = [
            'settings' => ['key_id', "$title_col as title", 'value'],
        ];

        try {

            $how_we_work_settings = Setting::where('type_en', 'How We Work Page Settings')
                ->where(function ($q) use ($lang) {
                    $q->where('key_id', 'like', "%{$lang}%")
                        ->orWhere('key_id', 'like', '%image%');
                })
                ->select($selects['settings'])
                ->get()
                ->map(function ($setting) {
                    if (str_contains($setting->key_id, 'image')) {
                        $setting->value = $setting->value ? asset($setting->value) : null;
                    }
                    return $setting;
                });

            return sendResponse(compact(
                'how_we_work_settings',
            ), 'Data loaded successfully.');

        } catch (\Throwable $e) {
            return sendError('Failed to load data.', $e->getMessage(), 500);
        }
    }

}
