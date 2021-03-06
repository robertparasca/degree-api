<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'reason'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
