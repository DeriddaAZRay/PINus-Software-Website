<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tb_gallery';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'cJudul',
        'cFoto',
        'cUserID_Input',
        'cUserID_Edit',
        'dTgl_Input',
        'dTgl_Edit'
    ];

    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit'  => 'datetime',
        'ID'         => 'integer'
    ];
    
    /**
     * Scope to get recent galleries
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('dTgl_Input', 'desc');
    }

    /**
     * Get formatted creation date
     */
    public function getFormattedCreatedAtAttribute()
    {
        return $this->dTgl_Input ? $this->dTgl_Input->format('d/m/Y H:i') : 'N/A';
    }

    /**
     * Get formatted update date
     */
    public function getFormattedUpdatedAtAttribute()
    {
        return $this->dTgl_Edit ? $this->dTgl_Edit->format('d/m/Y H:i') : 'N/A';
    }

    /**
     * Check if gallery has image
     */
    public function hasImage()
    {
        return !empty($this->cFoto);
    }

    /**
     * Get image size in bytes
     */
    public function getImageSize()
    {
        return $this->cFoto ? strlen($this->cFoto) : 0;
    }

    /**
     * Get formatted image size
     */
    public function getFormattedImageSize()
    {
        $bytes = $this->getImageSize();
        
        if ($bytes === 0) return '0 B';
        
        $units = ['B', 'KB', 'MB', 'GB'];
        $factor = floor(log($bytes, 1024));
        
        return sprintf('%.2f %s', $bytes / pow(1024, $factor), $units[$factor]);
    }

    /**
     * Auto-set creation timestamp when creating
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->dTgl_Input)) {
                $model->dTgl_Input = now();
            }
        });

        static::updating(function ($model) {
            $model->dTgl_Edit = now();
        });
    }
}