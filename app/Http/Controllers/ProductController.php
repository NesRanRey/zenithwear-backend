<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Obtener todos los productos
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Eliminar un producto por ID
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    // Obtener productos recomendados por estación del año
    public function getBySeason($season)
    {
        $products = Product::whereJsonContains('recommended_seasons', $season)->get();
        return response()->json($products, 200);
    }
}
