<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AssetController extends Controller
{
    public $url = 'https://zuperior-backend-rest-api.herokuapp.com/api/v1/asset';
    public function index()
    {
        $response = Http::get($this->url);
        $assets = json_decode($response->body())->data;

        return view('pages.dashboard.asset.index', [
            'assets' => $assets
        ]);
    }
}
