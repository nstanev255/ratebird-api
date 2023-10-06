<?php

namespace App\Util;

use Illuminate\Http\JsonResponse;

class ResponseUtills
{
    public static function handleErrorResponse(string $data, int $code): JsonResponse {

        // Sometimes we can get 0 as a status code, which means that we have not catched the error.
        // We will set it to 500 as default.
        if($code === 0) {
            $code = 500;
        }

        return response()->json(['message' => $data], $code);

    }
}
