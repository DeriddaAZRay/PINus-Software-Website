<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(Request $request)
    {
        $query = Article::published()->withActiveCategory();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Category filter - updated to use the correct relationship
        if ($request->has('category') && $request->category) {
            $query->byCategoryName($request->category);
        }

        $articles = $query->latest()->paginate(3);
        
        // Get categories that have published articles - all active categories
        $categories = Category::active()
            ->withPublishedArticles()
            ->orderByName()
            ->pluck('cKeterangan');

        // Get featured articles (you can modify this logic based on your needs)
        $featuredArticles = Article::published()
            ->withActiveCategory()
            ->latest()
            ->take(3)
            ->get();

        return view('articles.index', compact('articles', 'categories', 'featuredArticles'));
    }

    /**
     * Display the specified article.
     */
    public function show($id)
    {
        $article = Article::where('ID', $id)
            ->published()
            ->withActiveCategory()
            ->firstOrFail();
        
        // Get related articles from same category
        $relatedArticles = Article::published()
            ->withActiveCategory()
            ->where('ID', '!=', $article->ID)
            ->where('nID_Kategori', $article->nID_Kategori)
            ->latest()
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    /**
     * Get articles by category for API or AJAX
     */
    public function getByCategory(Request $request)
    {
        $category = $request->get('category');
        
        $articles = Article::published()
            ->withActiveCategory()
            ->when($category, function($query, $category) {
                return $query->byCategoryName($category);
            })
            ->latest()
            ->get()
            ->map(function($article) {
                return [
                    'id' => $article->ID,
                    'title' => $article->title,
                    'excerpt' => $article->excerpt,
                    'author' => $article->author,
                    'created_at' => $article->created_at ? $article->created_at->format('d/m/Y') : '',
                    'image' => $article->image,
                    'category_id' => $article->nID_Kategori,
                    'category_name' => $article->category_name,
                ];
            });

        return response()->json($articles);
    }

    /**
     * Get articles by category ID for API or AJAX
     */
    public function getByCategoryId(Request $request)
    {
        $categoryId = $request->get('category_id');
        
        $articles = Article::published()
            ->withActiveCategory()
            ->when($categoryId, function($query, $categoryId) {
                return $query->byCategory($categoryId);
            })
            ->latest()
            ->get()
            ->map(function($article) {
                return [
                    'id' => $article->ID,
                    'title' => $article->title,
                    'excerpt' => $article->excerpt,
                    'author' => $article->author,
                    'created_at' => $article->created_at ? $article->created_at->format('d/m/Y') : '',
                    'image' => $article->image,
                    'category_id' => $article->nID_Kategori,
                    'category_name' => $article->category_name,
                ];
            });

        return response()->json($articles);
    }

    /**
     * Get all categories
     */
    public function getCategories()
    {
        $categories = Category::active()
            ->withPublishedArticles()
            ->orderByName()
            ->get()
            ->map(function($category) {
                return [
                    'id' => $category->ID,
                    'name' => $category->name,
                    'articles_count' => $category->publishedArticles()->count(),
                ];
            });

        return response()->json($categories);
    }

    /**
     * Get articles by category object (for additional API endpoint)
     */
    public function getByCategoryObject(Category $category)
    {
        // Since we don't have lVoid column, we'll just return the articles
        $articles = $category->publishedArticles()
            ->with('category')
            ->latest()
            ->get()
            ->map(function($article) {
                return [
                    'id' => $article->ID,
                    'title' => $article->title,
                    'excerpt' => $article->excerpt,
                    'author' => $article->author,
                    'created_at' => $article->created_at ? $article->created_at->format('d/m/Y') : '',
                    'image' => $article->image,
                    'category_id' => $article->nID_Kategori,
                    'category_name' => $article->category_name,
                ];
            });

        return response()->json([
            'category' => [
                'id' => $category->ID,
                'name' => $category->name,
            ],
            'articles' => $articles,
            'total' => $articles->count()
        ]);
    }

    /**
     * Search articles (additional endpoint for API)
     */
    public function search(Request $request)
    {
        $searchTerm = $request->get('q', '');
        $categoryId = $request->get('category_id');
        $limit = $request->get('limit', 10);

        $query = Article::published()->withActiveCategory();

        if ($searchTerm) {
            $query->search($searchTerm);
        }

        if ($categoryId) {
            $query->byCategory($categoryId);
        }

        $articles = $query->latest()->take($limit)->get()->map(function($article) {
            return [
                'id' => $article->ID,
                'title' => $article->title,
                'excerpt' => $article->excerpt,
                'author' => $article->author,
                'created_at' => $article->created_at ? $article->created_at->format('d/m/Y') : '',
                'image' => $article->image,
                'category_id' => $article->nID_Kategori,
                'category_name' => $article->category_name,
            ];
        });

        return response()->json([
            'search_term' => $searchTerm,
            'category_id' => $categoryId,
            'articles' => $articles,
            'total' => $articles->count()
        ]);
    }
    public function serveImage($id)
    {
        $article = Article::findOrFail($id);
        
        if (empty($article->cThumbnail)) {
            // Redirect to default image or return 404
            return redirect(asset('images/default-article.webp'));
        }

        try {
            // Get the blob data
            $blobData = $article->cThumbnail;
            
            // If it's a resource, get the contents
            if (is_resource($blobData)) {
                $blobData = stream_get_contents($blobData);
            }
            
            // Detect MIME type
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($blobData);
            
            // If MIME type detection fails, assume it's JPEG
            if (!$mimeType || !str_starts_with($mimeType, 'image/')) {
                $mimeType = 'image/jpeg';
            }
            
            // Return the image with proper headers
            return response($blobData)
                ->header('Content-Type', $mimeType)
                ->header('Content-Length', strlen($blobData))
                ->header('Cache-Control', 'public, max-age=3600') // Cache for 1 hour
                ->header('Expires', gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
                
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Error serving blob image for article {$id}: " . $e->getMessage());
            return redirect(asset('images/default-article.webp'));
        }
    }

    // Alternative cached version
    public function serveImageCached($id)
    {
    $cacheKey = "article_image_response_{$id}";
    
    // Check if we have cached response data
    $cachedData = cache()->get($cacheKey);
    
    if ($cachedData) {
        return response($cachedData['data'])
            ->header('Content-Type', $cachedData['mime_type'])
            ->header('Content-Length', $cachedData['length'])
            ->header('Cache-Control', 'public, max-age=3600')
            ->header('Expires', gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
    }
    
    $article = Article::findOrFail($id);
    
    if (empty($article->cThumbnail)) {
        return redirect(asset('images/default-article.webp'));
    }

    try {
        $blobData = $article->cThumbnail;
        
        if (is_resource($blobData)) {
            $blobData = stream_get_contents($blobData);
        }
        
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($blobData);
        
        if (!$mimeType || !str_starts_with($mimeType, 'image/')) {
            $mimeType = 'image/jpeg';
        }
        
        // Cache the response data for 1 hour
        cache()->put($cacheKey, [
            'data' => $blobData,
            'mime_type' => $mimeType,
            'length' => strlen($blobData)
        ], 3600);
        
        return response($blobData)
            ->header('Content-Type', $mimeType)
            ->header('Content-Length', strlen($blobData))
            ->header('Cache-Control', 'public, max-age=3600')
            ->header('Expires', gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
            
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error("Error serving cached blob image for article {$id}: " . $e->getMessage());
        return redirect(asset('images/default-article.webp'));
    }
    }

    public function adminIndex()
    {
        $articles = Article::with('category')->get();
        $categories = Category::all(); // for the form

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderByName()->get();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cKeterangan' => 'required',
            'nID_Kategori' => 'required|exists:tb_kategori,ID',
            'cThumbnail' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['cJudul', 'cKeterangan', 'nID_Kategori']);
        $data['cUserID_Input'] = session('admin_user') ?? 'admin';

        if ($request->hasFile('cThumbnail')) {
            $data['cThumbnailPath'] = $request->file('cThumbnail')->store('images/articles', 'public');
        }

        Article::create($data);
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::orderByName()->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cKeterangan' => 'required',
            'nID_Kategori' => 'required|exists:tb_kategori,ID',
            'cThumbnail' => 'nullable|image|max:2048',
        ]);

        $article->cJudul = $request->cJudul;
        $article->cKeterangan = $request->cKeterangan;
        $article->nID_Kategori = $request->nID_Kategori;
        $article->cUserID_Edit = session('admin_user') ?? 'admin';

        if ($request->hasFile('cThumbnail')) {
            $article->cThumbnailPath = $request->file('cThumbnail')->store('images/articles', 'public');
        }

        $article->save();
        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->lVoid = 1; // Soft delete
        $article->save();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'cKeterangan' => 'required|string|max:255'
        ]);

        Category::create([
            'cKeterangan' => $request->cKeterangan,
            'cUserID_Input' => session('admin_user') ?? 'admin',
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Category deleted.');
    }
    
}