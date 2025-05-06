<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($category);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->name = $request->name;
        $category->save();

        return response()->json($category);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
