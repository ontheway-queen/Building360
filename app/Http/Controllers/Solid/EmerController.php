<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Solid\order\StoreOrder;
use App\Http\Requests\StoreOrderRequest;
use App\Models\SolidM\EmergencyDirectory;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmerController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the data
        $directories = EmergencyDirectory::where('created_by', $request->created_by)->get();

        if ($directories->isEmpty()) {
            return $this->sendErrorResponse('No directory entries found.', 404);
        }

        return $this->sendSuccessResponse('Directory entries fetched successfully.', $directories);
    }

    // Helper method to send a success response
    private function sendSuccessResponse($message, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    // Helper method to send an error response
    private function sendErrorResponse($message, $statusCode)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }

    public function store(StoreOrderRequest $request)
    {
        //$validated = $request->validated();

        // Validation has already been done by the Form Request
        //using Single Principle
        // Store the data
        $emergency = new EmergencyDirectory();
        $emergency->dir_name = $request->dir_name;
        $emergency->dir_number = $request->dir_number;
        $emergency->created_by = $request->created_by;
        $emergency->save();

        // Return a successful response
        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Created',
                'data' => $emergency
            ],
            201
        );
    }
}
