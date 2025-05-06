<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|string|max:10',
            'password' => 'required|string|min:8',
            'user' => 'required|string|unique:users|max:100',
        ]);

        // Encriptar la contraseña
        $validated['password'] = bcrypt($validated['password']);

        // Crear el usuario
        $user = User::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201); // Código 201 para creación exitosa
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Actualizar los datos del usuario
        $user->update($request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Eliminar el usuario
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}