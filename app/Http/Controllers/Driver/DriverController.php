<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Driver\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['driver'] = Driver::join('vehicles', 'vehicles.vehicle_id', '=', 'driver.vehicle_assignment')
            ->join('fuels', 'fuels.fuel_id', '=', 'vehicles.fuel_type')
            ->join('users', 'users.id', '=', 'vehicles.vehicle_owner')
            ->where('users.unique_user_id', $request->unique_user_id)
            ->select('driver_id', 'driver.contact_info', 'driver.driving_experience', 'driver.name', 'vehicles.vin', 'vehicles.make_and_model', 'vehicles.vehicle_type')
            ->get();
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['driver']], 200);
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
            'name' => 'required',
            'contact_info' => 'required|unique:driver',
            'driver_identification_number' => 'required|unique:driver'
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $driver = new Driver();
            $driver->name = $request->name;
            $driver->contact_info = $request->contact_info;
            $driver->driving_experience = $request->driving_experience;
            $driver->driver_identification_number = $request->driver_identification_number;
            $driver->training_qualifications = $request->training_qualifications;
            $driver->vehicle_assignment  = $request->vehicle_assignment;
            $driver->save();
            $data = new CommonResource($driver);

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
    // liters, gallons, or kilograms.
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
