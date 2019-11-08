<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function import()
    {
        Excel::import(new StudentsImport, '/Users/robertparasca/Documents/Github/degree-api/app/Http/Controllers/Api/students.xlsx');

        return $this->response200(['Importul a fost realizat cu succes.']);
    }
}
