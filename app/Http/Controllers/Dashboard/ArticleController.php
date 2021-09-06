<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public $url = 'https://sicapin-backend-rest-api.herokuapp.com/api/v1/article';
    public $urlCategories = 'https://sicapin-backend-rest-api.herokuapp.com/api/v1/category';

    public function index()
    {
        $response = Http::get($this->url);
        $articles = json_decode($response->body())->data;

        return view('pages.dashboard.article.index', [
            'articles' => $articles
        ]);
    }

    public function createView()
    {
        $response = Http::get($this->urlCategories);
        $categories = json_decode($response->body())->data;

        return view('pages.dashboard.article.create', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'body' => 'required'
        ]);

        preg_match_all('#<p>(.+?)</p>#', $request->body, $elements);

        $response = Http::attach(
            'thumbnail',
            file_get_contents($request->file('thumbnail')),
            $request->file('thumbnail')->getClientOriginalName()
        )->post($this->url, [
            'title' => $request->title,
            'body' => json_encode($elements[0]),
            'category_id' => $request->category
        ]);

        return redirect()->route('article.index');
    }
}
