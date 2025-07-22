<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_product';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cJudul',
        'cKeterangan',
        'cLogo',
        'nUrut',
        'cUserID_Input',
        'dTgl_Input',
        'cUserID_Edit',
        'dTgl_Edit'
    ];

    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit' => 'datetime',
    ];

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'nID_Product', 'ID');
    }
}
