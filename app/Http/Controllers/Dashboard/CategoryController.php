<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public $url = 'https://sicapin-backend-rest-api.herokuapp.com/api/v1/category';

    public function index()
    {
        $response = Http::get($this->url);
        $categories = json_decode($response->body())->data;

        return view('pages.dashboard.category.index', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'icon' => 'required'
        ]);

        $response = Http::attach(
            'icon',
            file_get_contents($request->file('icon')),
            $request->file('icon')->getClientOriginalName()
        )->post($this->url, [
            'title' => $request->title
        ]);

        return redirect()->route('category.index');
    }

    public function delete($categoryId)
    {
        $response = Http::delete($this->url . '/' . $categoryId);
        $status = json_decode($response->body())->status;

        if ($status != 'success') return abort(404);

        return redirect()->back();
    }
}
