<?php

namespace App\Http\Controllers;

use App\Models\ShippingStatus;
use Illuminate\Http\Request;

class ShippingStatusController extends Controller
{
    public function index()
    {
        $shippingStatuses = ShippingStatus::all();
        return response()->json($shippingStatuses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        $shippingStatus = ShippingStatus::create([
            'status_name' => $request->status_name,
        ]);

        return response()->json($shippingStatus, 201);  
    }

    public function show(string $id)
    {
        $shippingStatus = ShippingStatus::find($id);

        if (!$shippingStatus) {
            return response()->json(['message' => 'ShippingStatus not found'], 404);
        }

        return response()->json($shippingStatus);
    }

    public function update(Request $request, string $id)
    {
        $shippingStatus = ShippingStatus::find($id);

        if (!$shippingStatus) {
            return response()->json(['message' => 'ShippingStatus not found'], 404);
        }

        $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        $shippingStatus->update([
            'status_name' => $request->status_name,
        ]);

        return response()->json($shippingStatus);
    }

    public function destroy(string $id)
    {
        $shippingStatus = ShippingStatus::find($id);

        if (!$shippingStatus) {
            return response()->json(['message' => 'ShippingStatus not found'], 404);
        }

        $shippingStatus->delete();

        return response()->json(['message' => 'ShippingStatus deleted successfully']);
    }
}
