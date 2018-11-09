<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, Response};

class NewsController extends Controller
{
    public function index(Request $request, $service)
    {
        return app()->services->get($service);
    }
}
