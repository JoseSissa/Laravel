<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class QueriesController extends Controller
{
    public function get()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function getById(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found!'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($product);
    }

    public function getNames()
    {
        $products = Product::select('name')
            ->orderBy('name', 'desc')
            ->get();

        return response()->json($products);
    }

    public function searchNames(string $name, float $price)
    {
        $products = Product::where('name', $name)
            ->where('price', '>=', $price)
            ->orderBy('name', 'desc')
            ->select('name', 'description')
            ->get();
        return response()->json($products);
    }

    public function searchString(string $value)
    {
        $products = Product::where('description', 'like', '%' . $value . '%')
            ->orWhere('name', 'like', '%' . $value . '%')
            ->get();
        return response()->json($products);
    }
}
