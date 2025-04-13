<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function list(Request $request)
    {
        $lang = $request->header('lang');
        $supported_langs = ['en', 'ar'];

        if (!$lang || !in_array($lang, $supported_langs)) {
            return sendError('You must send a valid language in the header.', [
                'provided' => $lang,
                'supported_languages' => $supported_langs
            ], 400);
        }

        $title_col = "title_{$lang}";
        $name_col = "name_{$lang}";
        $job_col = "job_name_{$lang}";

        $selects = [
            'settings' => ['key_id', "$title_col as title", 'value'],
            'members'  => ['id', 'image', "$name_col as name", "$job_col as job_title"],
        ];

        try {
            // Get settings and apply asset() only for image keys
            $about_settings = Setting::where('type_en', 'About Page Settings')
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

            // Get all members with localized fields
            $members = Member::select($selects['members'])
                ->orderByDesc('id')
                ->get()
                ->transform(function ($member) {
                    $member->image = $member->image ? asset($member->image) : null;
                    return $member;
                });

            return sendResponse(compact(
                'about_settings',
                'members'
            ), 'Data loaded successfully.');

        } catch (\Throwable $e) {
            return sendError('Failed to load data.', $e->getMessage(), 500);
        }
    }

}
