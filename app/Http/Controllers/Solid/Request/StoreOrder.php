<?php

namespace App\Http\Controllers\Solid\order;

use App\Http\Controllers\Controller;
use App\Models\SolidM\EmergencyDirectory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StoreOrder extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        //$validated = $request->validated();

        // Validation has already been done by the Form Request

        // Store the data
        $user = new EmergencyDirectory([
            'dir_name' => $request->dir_name,
            'dir_number' => $request->dir_number,
            // Fill in other fields as needed
        ]);

        $user->save();

        // Return a successful response
        return response()->json(['message' => 'User created successfully'], Response::HTTP_CREATED);
    }
}
