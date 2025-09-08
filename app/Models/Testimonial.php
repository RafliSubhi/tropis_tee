<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'nama_pengirim',
        'komentar',
        'disukai_admin',
    ];
}
