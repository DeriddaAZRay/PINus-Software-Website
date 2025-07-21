<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_kategori';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cKeterangan',
        'cUserID_Input',
        'cUserID_Edit',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'dTgl_Input';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'dTgl_Edit';

    /**
     * Define relationship with Articles
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'nID_Kategori', 'ID');
    }

    /**
     * Get published articles only
     */
    public function publishedArticles()
    {
        return $this->hasMany(Article::class, 'nID_Kategori', 'ID')->published();
    }

    /**
     * Accessor for name
     */
    public function getNameAttribute()
    {
        return $this->cKeterangan;
    }

    /**
     * Accessor for created_at compatibility
     */
    public function getCreatedAtAttribute()
    {
        return $this->dTgl_Input;
    }

    /**
     * Accessor for updated_at compatibility  
     */
    public function getUpdatedAtAttribute()
    {
        return $this->dTgl_Edit;
    }

    /**
     * Scope a query to only include active categories
     * Since there's no lVoid column, we'll assume all categories are active
     * You can modify this based on your actual table structure
     */
    public function scopeActive($query)
    {
        // If you have a different column to determine active status, replace this
        // For now, we'll return all categories as active
        return $query;
        
        // Alternative implementations if you have different columns:
        // return $query->where('status', 1);
        // return $query->where('is_active', true);
        // return $query->whereNull('deleted_at');
    }

    /**
     * Scope a query to only include categories that have published articles
     */
    public function scopeWithPublishedArticles($query)
    {
        return $query->whereHas('publishedArticles');
    }

    /**
     * Get categories ordered by name
     */
    public function scopeOrderByName($query)
    {
        return $query->orderBy('cKeterangan', 'asc');
    }

    /**
     * Get voided categories
     * Since there's no lVoid column, this will return empty
     */
    public function scopeVoided($query)
    {
        // Return no results since we don't have a void column
        return $query->whereRaw('1 = 0');
        
        // Alternative if you have a different column:
        // return $query->where('status', 0);
        // return $query->where('is_active', false);
        // return $query->whereNotNull('deleted_at');
    }
}