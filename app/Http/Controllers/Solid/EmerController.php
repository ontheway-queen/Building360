<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Solid\order\StoreOrder;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\SolidM\EmergencyDirectory;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmerController extends Controller
{



    public function index(Request $request)
    {
        // Fetch the data
        $directories = EmergencyDirectory::where('created_by', $request->created_by)->where('is_deleted', false)->get();

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


    public function update(UpdateOrderRequest $request, $dir_id)
    {
        $emergency = EmergencyDirectory::find($dir_id);
        if (!$emergency) {
            return $this->updateFailMsg('Directory entry not found.', 404);
        }
        $emergency->dir_name = $request->dir_name;
        $emergency->dir_number = $request->dir_number;
        $emergency->created_by = $request->created_by;
        $emergency->update();



        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Updated Directory',
                'data' => $emergency
            ],
            201
        );
    }


    public function destroy($id)
    {
        // Find the directory entry by ID
        $directory = EmergencyDirectory::find($id);

        if (!$directory) {
            return $this->deleteFailMess('Directory entry not found.', 404);
        }
        $directory->is_deleted = true;

        $directory->update();

        return $this->deleteSuccessMess('Directory entry deleted successfully.', $directory);
    }


    private function deleteSuccessMess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    private function updateFailMsg($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }


    private function deleteFailMess($message)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }
}
