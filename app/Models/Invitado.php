<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    protected $fillable = ['name', 'email', 'attendance', 'guests'];
}