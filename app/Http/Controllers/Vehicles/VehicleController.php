<?php

namespace App\Http\Controllers\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Fuel\Fuel;
use App\Models\Vehicle\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->vehicle_owner) {
            $data['vehicles'] = Vehicle::where('vehicle_owner', $request->vehicle_owner)
                ->join('fuels', 'fuels.fuel_id', '=', 'vehicles.fuel_type')
                ->join('driver', 'driver.vehicle_assignment', '=', 'vehicles.vehicle_id')
                ->get();
        } else {
            $data['vehicles'] = Vehicle::join('fuels', 'fuels.fuel_id', '=', 'vehicles.fuel_type')
                ->join('driver', 'driver.vehicle_assignment', '=', 'vehicles.vehicle_id')
                ->join('users', 'users.id', '=', 'vehicles.vehicle_owner')
                ->where('users.unique_user_id', $request->unique_user_id)
                ->get();
        }

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['vehicles']], 200);
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
            'vin' => 'required|unique:vehicles',
            'license_plate_number' => 'required|unique:vehicles',
            'vehicle_type' => 'required',
            'fuel_type' => 'required',
            'vehicle_status' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $vehicle = new Vehicle();
            $vehicle->vin = $request->vin;
            $vehicle->make_and_model = $request->make_and_model;
            $vehicle->license_plate_number = $request->license_plate_number;
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->year_of_manufacture = $request->year_of_manufacture;

            // $get_fuel_type = Fuel::where('fuel_id', $request->fuel_type)->first();

            $vehicle->fuel_type = $request->fuel_id;
            $vehicle->vehicle_status = $request->vehicle_status;
            $vehicle->insurance_information = $request->insurance_information;
            $vehicle->maintenance_history = $request->maintenance_history;
            $vehicle->vehicle_owner = $request->vehicle_owner;
            $vehicle->mileage = $request->mileage;
            $vehicle->save();
            $data = new CommonResource($vehicle);

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
        //
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
