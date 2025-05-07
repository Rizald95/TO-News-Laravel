<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsApiServices
{
    protected $baseUrl = 'https://newsapi.org/v2';

    public function getTopHeadlines($country = 'us', $category = 'general', $limit = 12) // <-- ubah default limit
    {
        $response = Http::get("{$this->baseUrl}/top-headlines", [
            'apiKey' => env('NEWS_API_KEY'),
            'country' => $country,
            'category' => $category,
            'pageSize' => $limit
        ]);

        return $response->successful() ? $response->json()['articles'] : [];
    }

    public function getTrendingNews($query = 'trending', $limit = 3)
{
    $response = Http::get("{$this->baseUrl}/everything", [
        'apiKey' => env('NEWS_API_KEY'),
        'q' => $query,
        'sortBy' => 'popularity',
        'pageSize' => $limit,
        'language' => 'en'
    ]);

    return $response->successful() ? $response->json()['articles'] : [];
}
}
