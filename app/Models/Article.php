<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_article';

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
        'nID_Kategori',
        'cJudul',
        'cThumbnailPath',
        'cThumbnail',
        'cKeterangan',
        'lVoid',
        'cUserID_Input',
        'cUserID_Edit',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'nID_Kategori' => 'integer',
        'lVoid' => 'integer',
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
     * Define relationship with Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'nID_Kategori', 'ID');
    }

    /**
     * Accessor for title
     */
    public function getTitleAttribute()
    {
        return $this->cJudul;
    }

    /**
     * Accessor for content/description
     */
    public function getContentAttribute()
    {
        return $this->cKeterangan;
    }

    /**
     * Accessor for excerpt
     */
    public function getExcerptAttribute()
    {
        $content = strip_tags($this->cKeterangan);
        return strlen($content) > 150 ? substr($content, 0, 147) . '...' : $content;
    }

    /**
     * Accessor for author
     */
    public function getAuthorAttribute()
    {
        return $this->cUserID_Input ?? 'Admin';
    }

    /**
     * FIXED: Handle blob data in cThumbnail
     */
    public function getImageAttribute()
    {
        // First priority: cThumbnailPath (file path/URL)
        if (!empty($this->cThumbnailPath) && trim($this->cThumbnailPath) !== '') {
            $thumbnailPath = trim($this->cThumbnailPath);
            
            // Check if it's already a full URL
            if (str_starts_with($thumbnailPath, 'http://') || str_starts_with($thumbnailPath, 'https://')) {
                return $thumbnailPath;
            }
            
            // Check if it starts with / (absolute path)
            if (str_starts_with($thumbnailPath, '/')) {
                return asset($thumbnailPath);
            }
            
            // Check if it contains path separators
            if (str_contains($thumbnailPath, '/')) {
                return asset($thumbnailPath);
            }
            
            // Just a filename, add the standard path
            return asset('images/articles/' . $thumbnailPath);
        }
        
        // Second priority: cThumbnail (blob data)
        if (!empty($this->cThumbnail)) {
            // Option 1: Return blob as base64 data URL (immediate solution)
            return $this->getBlobAsDataUrl();
            
            // Option 2: Use route to serve blob (uncomment if you prefer this approach)
            // return route('article.image', ['id' => $this->ID]);
        }
        
        // Default fallback
        return asset('images/default-article.webp');
    }

    /**
     * Convert blob data to base64 data URL
     */
    public function getBlobAsDataUrl()
    {
        if (empty($this->cThumbnail)) {
            return asset('images/default-article.webp');
        }

        try {
            // Get the blob data
            $blobData = $this->cThumbnail;
            
            // If it's already a resource, get the contents
            if (is_resource($blobData)) {
                $blobData = stream_get_contents($blobData);
            }
            
            // Detect MIME type from blob data
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($blobData);
            
            // If MIME type detection fails, assume it's JPEG
            if (!$mimeType || !str_starts_with($mimeType, 'image/')) {
                $mimeType = 'image/jpeg';
            }
            
            // Convert to base64 data URL
            $base64 = base64_encode($blobData);
            return "data:{$mimeType};base64,{$base64}";
            
        } catch (\Exception $e) {
            \Log::error("Error converting blob to data URL for article {$this->ID}: " . $e->getMessage());
            return asset('images/default-article.webp');
        }
    }

    /**
     * Get cached blob as data URL (to avoid repeated base64 encoding)
     */
    public function getCachedBlobAsDataUrl()
    {
        $cacheKey = "article_image_blob_{$this->ID}";
        
        return cache()->remember($cacheKey, 3600, function() {
            return $this->getBlobAsDataUrl();
        });
    }

    /**
     * Get optimized image URL with optional size parameter
     */
    public function getImageUrlAttribute($size = 'medium')
    {
        $baseImage = $this->getImageAttribute();
        return $baseImage;
    }

    /**
     * Check if article has a custom thumbnail
     */
    public function getHasThumbnailAttribute()
    {
        return !empty($this->cThumbnail) || !empty($this->cThumbnailPath);
    }

    /**
     * Get image filename only (without path)
     */
    public function getImageFilenameAttribute()
    {
        if ($this->cThumbnailPath) {
            return $this->cThumbnailPath;
        }
        
        if ($this->cThumbnail) {
            return "article_{$this->ID}_thumbnail";
        }
        
        return 'default-article.webp';
    }

    /**
     * Check if thumbnail is blob data
     */
    public function getIsBlobThumbnailAttribute()
    {
        return !empty($this->cThumbnail) && empty($this->cThumbnailPath);
    }

    /**
     * Check if thumbnail is file path
     */
    public function getIsPathThumbnailAttribute()
    {
        return !empty($this->cThumbnailPath);
    }

    /**
     * Accessor for category name
     */
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : null;
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
     * Scope a query to only include active articles (not voided)
     */
    public function scopeActive($query)
    {
        return $query->where('lVoid', 0);
    }

    /**
     * Scope a query to only include published articles
     */
    public function scopePublished($query)
    {
        return $query->where('lVoid', 0);
    }

    /**
     * Get articles by category ID
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('nID_Kategori', $categoryId);
    }

    /**
     * Get articles by category name
     */
    public function scopeByCategoryName($query, $categoryName)
    {
        return $query->whereHas('category', function($q) use ($categoryName) {
            $q->where('cKeterangan', $categoryName);
        });
    }

    /**
     * Search articles
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('cJudul', 'like', '%' . $term . '%')
              ->orWhere('cKeterangan', 'like', '%' . $term . '%')
              ->orWhereHas('category', function($categoryQuery) use ($term) {
                  $categoryQuery->where('cKeterangan', 'like', '%' . $term . '%');
              });
        });
    }

    /**
     * Get latest articles
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('dTgl_Input', 'desc');
    }

    /**
     * Get voided articles
     */
    public function scopeVoided($query)
    {
        return $query->where('lVoid', 1);
    }

    /**
     * Scope to eager load category relationship
     */
    public function scopeWithCategory($query)
    {
        return $query->with('category');
    }

    /**
     * Scope to eager load active category relationship
     */
    public function scopeWithActiveCategory($query)
    {
        return $query->with('category');
    }

    /**
     * Scope to filter articles that have thumbnails
     */
    public function scopeWithThumbnail($query)
    {
        return $query->where(function($q) {
            $q->whereNotNull('cThumbnail')
              ->orWhere(function($subQ) {
                  $subQ->whereNotNull('cThumbnailPath')
                       ->where('cThumbnailPath', '!=', '');
              });
        });
    }

    /**
     * Scope to filter articles without thumbnails
     */
    public function scopeWithoutThumbnail($query)
    {
        return $query->where(function($q) {
            $q->whereNull('cThumbnail');
        })->where(function($q) {
            $q->whereNull('cThumbnailPath')
              ->orWhere('cThumbnailPath', '=', '');
        });
    }
}