<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'contact_email',
        'grupa_i',
        'nr_matricol',
        'nume_si_prenume',
        'tara',
        'initiale_tata',
        'obsan_anterior',
        'taxa',
        'orfanfacii',
        'an_admitere',
        'an_inmatr',
        'domeniu_studii',
        'medie_adm',
        'an_curent',
    ];
}
