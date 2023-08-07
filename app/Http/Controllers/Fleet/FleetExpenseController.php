<?php

namespace App\Http\Controllers\Fleet;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Fleet\FleetExpense;
use App\Models\Fuel\Fuel;
use App\Models\Vehicle\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FleetExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expense = FleetExpense::where('created_by', $request->created_by)->where('fleet_expense_date', $request->fleet_expense_date)
            ->join('vehicles', 'vehicles.vehicle_id', '=', 'fleet_expense.fleet_vehicle')
            ->join('driver', 'driver.vehicle_assignment', '=', 'vehicles.vehicle_id')
            ->join('fuels', 'fuels.fuel_id', '=', 'vehicles.fuel_type');


        if ($request->fleet_expense_type == 'fuel') {
            $expense = FleetExpense::where('created_by', $request->created_by)->where('fleet_expense_date', $request->fleet_expense_date)->where('fleet_expense_type', $request->fleet_expense_type)
                ->join('vehicles', 'vehicles.vehicle_id', '=', 'fleet_expense.fleet_vehicle')
                ->join('driver', 'driver.vehicle_assignment', '=', 'vehicles.vehicle_id')
                ->join('fuels', 'fuels.fuel_id', '=', 'vehicles.fuel_type');
        }





        $data['fuel'] =  $expense->get();
        $data['total_amount'] =  $expense->sum('fleet_expense_amount');


        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Done',
                'data' => $data['fuel'],
                'total_expent_amount' => $data['total_amount']
            ],
            200
        );
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
            'fleet_expense_date' => 'required',
            'fleet_expense_type' => 'required',
            'fleet_expense_amount' => 'required',
            'owner_id' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $fleetexpense = new FleetExpense();
            $fleetexpense->fleet_expense_date = $request->fleet_expense_date;
            $fleetexpense->fleet_expense_type = $request->fleet_expense_type;
            $fleetexpense->fleet_expense_amount = $request->fleet_expense_amount;
            $fleetexpense->fleet_vehicle = $request->fleet_vehicle;
            $fleetexpense->fuel_id = $request->fuel_id;



            if ($request->fleet_expense_type == 'fuel') {
                $type_get = Fuel::where('fuel_id', $request->fuel_id)->first();
                $fuel_price = $type_get->fuel_current_price;
                $vehicles = Vehicle::where('vehicle_id', $request->fleet_vehicle)->first();
                $vehicles_covergae_per_kg = $vehicles->mileage;
                $total_amount_coverage = ($vehicles_covergae_per_kg / $fuel_price) * $request->fleet_expense_amount;
                $fleetexpense->approximate_coverage = $total_amount_coverage;
                $fleetexpense->claimed_coverage =   $request->claimed_coverage;
                $fleetexpense->difference_coverage  = $total_amount_coverage - $request->claimed_coverage;
            }

            $fleetexpense->fleet_expense_note  = $request->fleet_expense_note;
            $fleetexpense->owner_id  = $request->owner_id;
            $fleetexpense->created_by  = $request->created_by;
            $fleetexpense->save();
            $data = new CommonResource($fleetexpense);

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
