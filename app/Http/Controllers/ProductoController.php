<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        $products = Producto::all();

        return view('products.index', compact('products'));
    }
}
