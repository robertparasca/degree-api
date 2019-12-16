<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function index()
    {
        $data = Institute::where('id', 1)->get();
        return $this->response200($data);
    }

    public function update(BaseRequest $request)
    {

    }
}
