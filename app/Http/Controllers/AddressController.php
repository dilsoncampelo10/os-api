<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $adresses = Address::all();

        return response()->json($adresses, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $address = Address::create($data);

        return response()->json($address, 201);
    }

    public function show(string $id)
    {
        $address = Address::findOrFail($id);

        return response()->json($address, 200);
    }

    public function update(Request $request, string $id)
    {
        $address = Address::findOrFail($id);

        $address->update([
            'street' => $request->street,
            'number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'complement' => $request->complement,
            'reference' => $request->reference,
            'zip_code' => $request->zip_code,
            'customer_id' => $request->customer_id
        ]);

        return response()->json($address, 201);
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);

        $address->delete();
    }
}
