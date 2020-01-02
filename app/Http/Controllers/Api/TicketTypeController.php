<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\TicketType;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = TicketType::all();
        return $this->response200($data);
    }

    public function store(BaseRequest $request)
    {
        $validatedData = $request->validate([
            'header_content' => 'required',
            'body_content' => 'required',
            'footer_content' => 'required',
        ]);
    }
}
