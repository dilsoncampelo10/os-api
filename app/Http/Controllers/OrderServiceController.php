<?php

namespace App\Http\Controllers;

use App\Models\OrderService;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    public function index()
    {
        $orderServices = OrderService::all();

        return response()->json($orderServices, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $orderService = OrderService::create($data);

        return response()->json($orderService, 201);
    }

    public function show(string $id)
    {
        $orderService = OrderService::findOrFail($id);

        return response()->json($orderService, 200);
    }

    public function update(Request $request, string $id)
    {
        $orderService = OrderService::findOrFail($id);

        $orderService->update([
            'description' => $request->description,
            'price' => $request->price,
            'service' => $request->service,
            'defect' => $request->defect,
            'equipment' => $request->equipment,
            'date_order' => $request->date_order,
            'status' => $request->status
        ]);

        return response()->json($orderService, 201);
    }

    public function destroy(string $id)
    {
        $orderService = OrderService::findOrFail($id);

        $orderService->delete();
    }
}
