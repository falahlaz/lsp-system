<?php

namespace App\Services;

Trait ResponseService
{
    protected function responseOk($data = [])
    {
        return response()->json([
            "success" => true,
            "message" => "Ok",
            "error" => null,
            "data" => $data
        ], 200);
    }

    protected function responseNotFound($message)
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "error" => null,
            "data" => null
        ], 404);
    }
}