<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'tb_testimonial';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'cNmLengkap',
        'cEmail',
        'cNmPerusahaan',
        'cPosisi',
        'cHeadline',
        'cTestimonial',
        'lVoid',
        'dTgl_Input',
        'cUserID_Edit',
        'dTgl_Edit',
        'nID_Client',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'nID_Client', 'ID');
    }
}
