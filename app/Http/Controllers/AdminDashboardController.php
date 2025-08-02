<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Article;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = $this->getStats();
        $recentActivities = $this->getRecentActivities();
        
        return view('admin.dashboard', compact('stats', 'recentActivities'));
    }
    
    public function getStats()
    {
        return [
            'total_users' => User::count(),
            'user_growth' => $this->calculateGrowth('users'),
            'unshown_testimonials' => Testimonial::where(function($query) {
                                            $query->where('lVoid', 0);
                                        })->count(),
            'testimonial_growth' => $this->getNewTestimonials(),
            'total_clients' => Client::count(),
            'total_articles' => Article::count(),
        ];
    }
    
    public function getRecentActivities()
    {
        $activities = [];
        
        // Recent Users (last 24 hours)
        $recentUsers = User::where('dTgl_Input', '>=', Carbon::now()->subDay())
                          ->orderBy('dTgl_Input', 'desc')
                          ->take(3)
                          ->get();
        
        foreach ($recentUsers as $user) {
            $activities[] = [
                'type' => 'user',
                'color' => 'green',
                'message' => "New user \"{$user->cUsername}\" registered",
                'time' => Carbon::parse($user->dTgl_Input)->diffForHumans(),
                'timestamp' => Carbon::parse($user->dTgl_Input)
            ];
        }
        
        // Recent Testimonials (pending approval)
        $recentTestimonials = Testimonial::where('dTgl_Input', '>=', Carbon::now()->subDays(3))
                                        ->where(function($query) {
                                            $query->where('lVoid', 0);
                                        })
                                        ->orderBy('dTgl_Input', 'desc')
                                        ->take(3)
                                        ->get();
        
        foreach ($recentTestimonials as $testimonial) {
            $activities[] = [
                'type' => 'testimonial',
                'color' => 'yellow',
                'message' => "New testimonial from \"{$testimonial->cNmLengkap}\" needs review",
                'time' => Carbon::parse($testimonial->dTgl_Input)->diffForHumans(),
                'timestamp' => Carbon::parse($testimonial->dTgl_Input)
            ];
        }
        
        // Recent Articles
        $recentArticles = Article::where('dTgl_Input', '>=', Carbon::now()->subWeek())
                                ->orderBy('dTgl_Input', 'desc')
                                ->take(2)
                                ->get();
        
        foreach ($recentArticles as $article) {
            $activities[] = [
                'type' => 'article',
                'color' => 'blue',
                'message' => "Article \"{$article->cJudul}\" published",
                'time' => Carbon::parse($article->dTgl_Input)->diffForHumans(),
                'timestamp' => Carbon::parse($article->dTgl_Input)
            ];
        }
        
        // Recent Clients
        $recentClients = Client::where('dTgl_Input', '>=', Carbon::now()->subWeek())
                              ->orderBy('dTgl_Input', 'desc')
                              ->take(2)
                              ->get();
        
        foreach ($recentClients as $client) {
            $activities[] = [
                'type' => 'client',
                'color' => 'purple',
                'message' => "New client \"{$client->cKeterangan}\" added",
                'time' => Carbon::parse($client->dTgl_Input)->diffForHumans(),
                'timestamp' => Carbon::parse($client->dTgl_Input)
            ];
        }
        
        // Sort by timestamp (most recent first)
        usort($activities, function($a, $b) {
            return $b['timestamp'] <=> $a['timestamp'];
        });
        
        return array_slice($activities, 0, 10); // Return top 10
    }
    
    // API endpoint for real-time stats
    public function apiStats()
    {
        return response()->json($this->getStats());
    }
    
    // API endpoint for activities
    public function apiActivities()
    {
        return response()->json($this->getRecentActivities());
    }
    
    // Helper method to calculate growth percentage
    private function calculateGrowth($model)
    {
        $modelClass = 'App\\Models\\' . ucfirst(Str::singular($model));
        
        if (!class_exists($modelClass)) {
            return '+0%';
        }
        
        $currentMonth = $modelClass::whereMonth('dTgl_Input', Carbon::now()->month)
                                  ->whereYear('dTgl_Input', Carbon::now()->year)
                                  ->count();
        
        $lastMonth = $modelClass::whereMonth('dTgl_Input', Carbon::now()->subMonth()->month)
                                ->whereYear('dTgl_Input', Carbon::now()->subMonth()->year)
                                ->count();
        
        if ($lastMonth == 0) {
            return $currentMonth > 0 ? '+100%' : '+0%';
        }
        
        $growth = (($currentMonth - $lastMonth) / $lastMonth) * 100;
        return ($growth >= 0 ? '+' : '') . round($growth) . '%';
    }
    
    private function getNewTestimonials()
    {
        $newCount = Testimonial::where('dTgl_Input', '>=', Carbon::now()->subWeek())
                              ->where(function($query) {
                                  $query->where('lVoid', 0);
                              })
                              ->count();
        
        return "+{$newCount} new";
    }
    
    // Get detailed stats for modal
    public function getDetailedStats($type)
    {
        switch ($type) {
            case 'users':
                return response()->json([
                    'total' => User::count(),
                    'new_this_month' => User::whereMonth('dTgl_Input', Carbon::now()->month)->count(),
                ]);
                
            case 'testimonials':
                return response()->json([
                    'pending' => Testimonial::where(function($query) {
                                    $query->where('lVoid', 0);
                                })->count(),
                    'approved' => Testimonial::where('lVoid', 1)->count(),
                    'new_this_week' => Testimonial::where('dTgl_Input', '>=', Carbon::now()->subWeek())->count(),
                ]);
                
            case 'clients':
                return response()->json([
                    'total' => Client::count(),
                    'new_this_month' => Client::whereMonth('dTgl_Input', Carbon::now()->month)->count(),
                ]);
                
            case 'articles':
                return response()->json([
                    'published' => Article::count(),
                    'new_this_month' => Article::whereMonth('dTgl_Input', Carbon::now()->month)->count(),
                ]);
                
            default:
                return response()->json([]);
        }
    }
}