<?php

namespace App\Http\Controllers\Parking;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Parking\Parking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {


        if ($request->parking_slot_status == 'VACENT') {
            $data['parking'] = Parking::where('created_by', $request->unique_user_id)
                ->where('payment_staus', 'UNPAID')
                ->where('parking_slot_status', $request->parking_slot_status)
                ->where('created_by', $request->unique_user_id)
                ->get();
            // $data['parking'] = Parking::where('payment_staus', 'UNPAID')->where('parking_slot_status', $request->parking_slot_status)->join('users', 'users.id', '=', 'parking.parking_occupied_by')->get();
        } elseif ($request->parking_slot_status == 'OCCUPIED') {
            $data['parking'] = Parking::where('created_by', $request->unique_user_id)
                ->where('parking_slot_status', $request->parking_slot_status)
                ->where('created_by', $request->unique_user_id)
                ->join('users', 'users.id', '=', 'parking.parking_occupied_by')
                ->join('vehicles', 'vehicles.vehicle_id', '=', 'parking.vehicle')
                ->select('parking_id', 'parking_slot_fee', 'parking_slot_name', 'payment_staus', 'parking_slot_status', 'vehicle', 'name', 'make_and_model', 'license_plate_number', 'vin')
                ->get();
        } elseif ($request->parking_slot_status == null && $request->parking_slot_status == null && $request->unique_user_id != null) {
            $data['parking'] = Parking::where('created_by', $request->unique_user_id)
                ->where('created_by', $request->unique_user_id)
                ->get();
        }




        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parking_slot_fee' => 'required',
            'parking_slot_name' => 'required|unique:parking',
            // 'parking_slot_status' => 'required',
            // 'vehicle' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $parking = new Parking();
            $parking->parking_slot_fee = $request->parking_slot_fee;
            $parking->parking_slot_name = $request->parking_slot_name;
            $parking->payment_staus = 'UNPAID';
            $parking->parking_slot_status = 'VACENT';
            $parking->parking_occupied_by = intval($request->parking_occupied_by);
            $parking->created_by = $request->created_by;
            $parking->save();


            $data = new CommonResource($parking);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vehicle' => 'required|unique:parking',
            // 'parking_slot_status' => 'required',
            // 'vehicle' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $parking = Parking::find($id);
            $parking->parking_occupied_by = $request->parking_occupied_by;
            $parking->parking_slot_status = $request->parking_slot_status;
            $parking->vehicle = $request->vehicle;
            $parking->save();


            $data = new CommonResource($parking);

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
