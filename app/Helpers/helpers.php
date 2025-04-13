<?php



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

