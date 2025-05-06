<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function destroy($id)
    {
        // Verifica si el producto existe
        $product = Product::find($id);

        // Si no se encuentra el producto
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Elimina el producto
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}