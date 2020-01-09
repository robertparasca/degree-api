<?php

namespace App\Imports;

use App\Student;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements WithHeadingRow, ToCollection
{
    public function  __construct($year)
    {
        $this->year = $year;
    }

//    public function headingRow(): int
//    {
//        return 1;
//    }

    public function collection(Collection $rows)
    {
        // Ciclu_studii_actual (licenta, master)
        // Forma_finantare 19/20 (buget, taxa)
        //
        foreach ($rows as $row) {
            dd($row, $this->year, 123);
            if (
                $row['grupa_i'] &&
                $row['nrmatricol'] &&
                $row['nume_si_prenume'] &&
                $row['initiale_tata'] &&
                $row['tara'] &&
                $row['obsan_anterior'] &&
                $row['taxa'] &&
                $row['orfanfacii'] &&
                $row['an_admitere'] &&
                $row['an_inmatr'] &&
                $row['domeniu_studii'] &&
                $row['medie_adm'] &&
                $row['contact_email'] &&
                $row['nume_actual']
            ) {
                $student = Student::where('contact_email', $row['contact_email']);
                if (count($student->get())) {
                    $student->update([
                        'grupa_i' => $row['grupa_i'],
                        'nr_matricol' => $row['nrmatricol'],
                        'nume_si_prenume' => $row['nume_si_prenume'],
                        'initiale_tata' => $row['initiale_tata'],
                        'tara' => $row['tara'],
                        'obsan_anterior' => $row['obsan_anterior'],
                        'taxa' => $row['taxa'] == 'Nu' ? false : true,
                        'orfanfacii' => $row['orfanfacii'] == 'Nu' ? false : true,
                        'an_admitere' => intval($row['an_admitere']),
                        'an_inmatr' => intval($row['an_inmatr']),
                        'domeniu_studii' => $row['domeniu_studii'],
                        'medie_adm' => floatval($row['medie_adm']),
                        'contact_email' => $row['contact_email'],
                        'an_curent' => intval($this->year)
                    ]);
                } else {
                    $newStudent = Student::create([
                        'grupa_i' => $row['grupa_i'],
                        'nr_matricol' => $row['nrmatricol'],
                        'nume_si_prenume' => $row['nume_si_prenume'],
                        'initiale_tata' => $row['initiale_tata'],
                        'tara' => $row['tara'],
                        'obsan_anterior' => $row['obsan_anterior'],
                        'taxa' => $row['taxa'] == 'Nu' ? false : true,
                        'orfanfacii' => $row['orfanfacii'] == 'Nu' ? false : true,
                        'an_admitere' => intval($row['an_admitere']),
                        'an_inmatr' => intval($row['an_inmatr']),
                        'domeniu_studii' => $row['domeniu_studii'],
                        'medie_adm' => floatval($row['medie_adm']),
                        'contact_email' => $row['contact_email'],
                        'an_curent' => intval($this->year)
                    ]);
//                    $newUser = User::create([
//                        'email' => $row['contact_email'],
//                        'name' => $row['nume_si_prenume'],
//                        'first_name' => $row['prenume'],
//                        'last_name' => $row['nume_actual'],
//                        'password' => bcrypt('asd123')
//                    ]);
                }

            }
        }
    }
}
