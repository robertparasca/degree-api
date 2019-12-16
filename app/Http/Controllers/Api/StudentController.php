<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return $this->response200(compact('students'));
    }

    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'year' => 'required'
        ]);
//        dd($validatedData);
//        Excel::import(new StudentsImport, '/Users/robertparasca/Documents/Github/degree-api/app/Http/Controllers/Api/baza an I 2019_2020.xls');
//        Excel::import(new StudentsImport, '/Users/robertparasca/Documents/Github/degree-api/app/Http/Controllers/Api/an1.xlsx');
        Excel::import(new StudentsImport($validatedData['year']), $validatedData['file']);

        return $this->response200(['Importul a fost realizat cu succes.']);
    }
}
