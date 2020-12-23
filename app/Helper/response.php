<?php

/**
 * Default success response
 *
 * @param string $message
 * @param string $code
 * @return array
 */
function success($message, $code = CODE::S_GENERIC) {
    return [
        'message' => $message,
        'code' => $code
    ];
}

/**
 * Default error response
 *
 * @param string $message
 * @param string $code
 * @return array
 */
function error($message, $code = CODE::E_GENERIC) {
    return [
        'message' => $message,
        'code' => $code
    ];
}

/**
 * Default api response structure
 *
 * @param array $data
 * @param string $message
 * @param string $code
 * @return array
 */
function default_response($data, $message = null, $code = CODE::S_GENERIC){
    $response = [
        'code' => $code,
        'data' => $data
    ];

    if ($message)
        $response['message'] = $message;
        
    return $response;
}