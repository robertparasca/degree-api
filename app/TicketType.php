<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = ['header_content', 'body_content', 'footer_content'];
}
