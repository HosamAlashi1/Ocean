<?php


use App\Models\Setting;

function sendResponse($result, $message = null)
{

    $response = [
        'status' => true,
//        'message' => $message,
//        'data'    => $result,
    ];
    if(!empty($result)){
        $response['data'] = $result;
    }
    if(!empty($message)){
        $response['message'] = $message;
    }

    return response()->json($response, 200);
}

function sendError($error = 'error', $errorMessages = [], $code = 200 , )
{
    $response = [
        'status' => false,
        'message' => $error,
    ];

    if(!empty($errorMessages)){
        $response['data'] = $errorMessages;
    }

    return response()->json($response, $code);
}
 function getSeoSettings(string $page, string $lang): array
{
    $keys = [
        "{$page}_seo_title_{$lang}",
        "{$page}_seo_description_{$lang}",
    ];

    $seo_items = Setting::where('set_group', 'seo')
        ->whereIn('key_id', $keys)
        ->pluck('value', 'key_id');

    return [
        'title' => $seo_items[$keys[0]] ?? '',
        'description' => $seo_items[$keys[1]] ?? '',
    ];
}


