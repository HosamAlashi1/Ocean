<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return sendError('Validation failed.', $validator->errors(), 422);
        }

        try {
            Subscriber::create([
                'email' => $request->email,
                'is_read' => false,
            ]);

            return sendResponse(null, 'Thanks for subscribing to our weekly updates!');
        } catch (\Throwable $e) {
            return sendError('Subscription failed', $e->getMessage(), 500);
        }
    }
}
