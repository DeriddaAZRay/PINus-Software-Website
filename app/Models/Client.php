<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'tb_client';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'cKeterangan',
        'cLogoPath',
        'cLogo',
        'nUrut',
        'cUserID_Input',
        'dTgl_Input',
        'cUserID_Edit',
        'dTgl_Edit',
    ];

    protected $casts = [
        'ID' => 'integer',
        'nUrut' => 'integer',
        'dTgl_Input' => 'datetime',
        'dTgl_Edit' => 'datetime',
    ];
}