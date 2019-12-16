<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $fillable = ['university_name', 'faculty_name', 'active_year', 'dean_name', 'chief_secretary', 'active_semester'];
}
