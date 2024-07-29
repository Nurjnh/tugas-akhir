<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Kabid extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'akun';
    protected $primaryKey = 'akun_id';

  
}
