<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Mostrar todas las marcas
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }
    

    // Crear una nueva marca
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::create([
            'name' => $validatedData['name'],
        ]);

        return response()->json($brand, 201);
    }

    // Mostrar una marca por su ID
    public function show(string $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        return response()->json($brand);
    }

    // Actualizar una marca por su ID
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand->update([
            'name' => $validatedData['name'],
        ]);

        return response()->json($brand);
    }

    // Eliminar una marca por su ID
    public function destroy(string $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully'], 200);
    }
}
