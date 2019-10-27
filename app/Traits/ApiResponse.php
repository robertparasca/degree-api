<?php

namespace App\Traits;

trait ApiResponse {
    public function response200($data)
    {
        return response($data, 200);
    }

    public function response422($data)
    {
        return response([
            'errors' => $data
        ], 422);
    }
}
