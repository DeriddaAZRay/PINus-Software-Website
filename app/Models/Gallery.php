<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Table name
    protected $table = 'tb_gallery';

    // Primary key
    protected $primaryKey = 'ID';

    // Indicates if the model should be timestamped (created_at/updated_at)
    public $timestamps = false;

    // Fillable columns
    protected $fillable = [
        'cFoto',
        'cJudul',
        'cUserID_Input',
        'dTgl_Input',
        'cUserID_Edit',
        'dTgl_Edit',
    ];

    // Casting to proper data types
    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit'  => 'datetime',
    ];
}
