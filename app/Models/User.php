<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'cUsername';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['cUsername', 'cPassword', 'lAdmin'];

    protected $hidden = ['cPassword'];
}

