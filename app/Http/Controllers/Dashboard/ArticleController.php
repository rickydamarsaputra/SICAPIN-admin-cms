<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public $url = 'https://sicapin-backend-rest-api.herokuapp.com/api/v1/article';

    public function index()
    {
        $response = Http::get($this->url);
        $articles = json_decode($response->body())->data;

        return view('pages.dashboard.article.index', [
            'articles' => $articles
        ]);
    }
}
