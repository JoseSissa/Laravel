<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

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

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:2000',
                'price' => 'required|numeric',
                'category_id' => 'required|numeric|exists:category,id',
            ], [
                'name.required' => 'El nombre del producto es obligatorio',
                'name.string' => 'El nombre del producto debe ser de tipo string',
                'description.required' => 'La descripción del producto es obligatoria',
                'price.required' => 'El precio del producto es obligatorio',
                'category_id.required' => 'La categoría del producto es obligatoria',
                'category_id.exists' => 'El producto no existe en la categoría',
            ]);
            $product = Product::create($validatedData);

            return response()->json($product);
        } catch (ValidationException $err) {
            return response()->json($err->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
