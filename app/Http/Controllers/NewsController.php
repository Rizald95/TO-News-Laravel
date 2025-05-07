<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsApiServices;

class NewsController extends Controller
{
    public function index(NewsApiServices $newsApi)
    {
        $headlines = $newsApi->getTopHeadlines('us', 'general', 12); // atur 12 artikel
        $trending = $newsApi->getTrendingNews(); // new trending articles
    
        return view('landing', compact('headlines', 'trending'));
    }
}
