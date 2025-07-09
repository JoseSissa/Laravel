<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $page = $request->get('page', 0);
        $offset = $perPage * $page;

        $products = Product::skip($offset)->take($perPage)->get();

        return response()->json($products);
    }
}
