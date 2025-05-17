<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{

    public function list(Request $request)
    {
        $lang = $request->header('lang') ?? 'en';

        if (!in_array($lang, ['en', 'ar'])) {
            return sendError('Unsupported language', [
                'provided' => $lang,
                'you must send the lang on the header ,supported_languages' => ['en', 'ar']
            ], 400);
        }

        $title_column = "title_{$lang}";

        $selects = [
            'settings'          => ['key_id', "$title_column as title", 'value'],
        ];

        try {
            $Contact_settings = Setting::where('type_en', 'Contact Page Settings')
                ->where('key_id', 'like', "%{$lang}%")
                ->select($selects['settings'])
                ->get();


            return sendResponse(compact(
                'Contact_settings',
            ), 'Contact settings loaded successfully');
        } catch (\Throwable $e) {
            return sendError('Failed to load homepage data', $e->getMessage(), 500);
        }
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return sendError('Validation failed.', $validator->errors(), 422);
        }

        try {
            ContactMessage::create([
                'name'     => $request->first_name . ' ' . $request->last_name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'message'  => $request->message,
                'is_read'  => false,
            ]);

            return sendResponse(null, 'Your message has been sent successfully.');
        } catch (\Throwable $e) {
            return sendError('Failed to send message.', $e->getMessage(), 500);
        }
    }


}
