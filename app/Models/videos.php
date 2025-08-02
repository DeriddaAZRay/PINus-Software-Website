<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Make sure this matches your actual table name
     */
    protected $table = 'tb_videos'; // Adjust if your table name is different

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id'; // Based on your database structure

    /**
     * Indicates if the model should be timestamped.
     * Set to false if you're managing timestamps manually
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'cJudul',
        'cDeskripsi', 
        'cLink',
        'cJenis',
        'dTgl_Input',
        'cUserID_Input',
        'dTgl_Edit',
        'cUserID_Edit'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'dTgl_Input' => 'datetime',
        'dTgl_Edit' => 'datetime',
        'cUserID_Input' => 'integer',
        'cUserID_Edit' => 'integer',
    ];

    /**
     * Get the user who created this video
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'cUserID_Input', 'id');
    }

    /**
     * Get the user who last edited this video
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'cUserID_Edit', 'id');
    }

    /**
     * Scope to get videos by type
     */
    public function scopeByType($query, $type)
    {
        return $query->where('cJenis', $type);
    }

    /**
     * Scope to get regular videos
     */
    public function scopeVideos($query)
    {
        return $query->where('cJenis', 'v');
    }

    /**
     * Scope to get testimonial videos
     */
    public function scopeTestimonials($query)
    {
        return $query->where('cJenis', 't');
    }

    /**
     * Get the YouTube thumbnail URL
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->cLink) {
            return "https://img.youtube.com/vi/{$this->cLink}/maxresdefault.jpg";
        }
        return null;
    }

    /**
     * Get the YouTube embed URL
     */
    public function getEmbedUrlAttribute()
    {
        if ($this->cLink) {
            return "https://www.youtube.com/embed/{$this->cLink}";
        }
        return null;
    }

    /**
     * Get the full YouTube watch URL
     */
    public function getWatchUrlAttribute()
    {
        if ($this->cLink) {
            return "https://www.youtube.com/watch?v={$this->cLink}";
        }
        return null;
    }

    /**
     * Get the video type display name
     */
    public function getTypeDisplayAttribute()
    {
        return $this->cJenis === 'v' ? 'Video' : 'Testimonial';
    }
}