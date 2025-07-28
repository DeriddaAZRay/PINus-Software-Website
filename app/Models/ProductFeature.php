<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = 'tb_product_feature';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nID_Product',
        'cFitur',
    ];

    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'nID_Product', 'ID');
    }
}
