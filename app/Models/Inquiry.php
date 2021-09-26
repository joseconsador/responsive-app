<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiries';
    protected $fillable = ['email', 'first_name', 'last_name', 'phone', 'subject', 'message'];
}
