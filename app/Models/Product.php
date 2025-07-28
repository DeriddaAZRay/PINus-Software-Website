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
    public $timestamps = false;

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

    /**
     * Get the logo as base64 data URL for HTML display
     */
    public function getLogoBase64Attribute()
    {
        if (!$this->cLogo) {
            return null;
        }

        // Detect MIME type
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($this->cLogo);
        
        // Fallback to jpeg if detection fails
        if (!$mimeType || !str_starts_with($mimeType, 'image/')) {
            $mimeType = 'image/jpeg';
        }

        return 'data:' . $mimeType . ';base64,' . base64_encode($this->cLogo);
    }

    /**
     * Check if product has a logo
     */
    public function hasLogo()
    {
        return !empty($this->cLogo);
    }
}