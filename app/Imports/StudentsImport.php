<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements WithHeadingRow, ToCollection
{
    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
//        dd($rows);
        foreach ($rows as $row) {
//            dd($row);
            Student::create([
                'name' => $row['nume'],
                'email' => $row['email'],
                'year' => $row['an']
            ]);
        }
    }
}
