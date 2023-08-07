<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Maintenance\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['maintenance'] = Maintenance::orderBy('maintenance_id', 'desc')
            ->join('buildings', 'buildings.id', '=', 'maintenances.building_id')
            ->join('users', 'users.id', '=', 'maintenances.order_created_by')
            ->where('users.unique_user_id', $request->unique_user_id)
            ->select('maintenance_id', 'category', 'main_description', 'date_reported', 'main_status', 'date_completed', 'priority', 'order_created_by', 'building_name', 'name as order_creator', 'unique_user_id')
            ->get();
        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['maintenance']], 200);
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
            'order_created_by' => 'required',
            'building_id' => 'required',
            'priority' => 'required'
        ]);


        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $maintenance = new Maintenance();
            $maintenance->order_created_by = $request->order_created_by;
            $maintenance->category = $request->category;
            $maintenance->main_description = $request->main_description;
            $maintenance->date_reported = date('Y-m-d');
            $maintenance->building_id = $request->building_id;
            $maintenance->priority = $request->priority;
            $maintenance->main_status = 'Open';
            $maintenance->save();
            $data = new CommonResource($maintenance);

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
            'main_status' => 'required',
            'date_completed' => 'required',

        ]);



        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $maintenance = Maintenance::find($id);
            $maintenance->main_status = $request->main_status;
            $maintenance->date_completed = $request->date_completed;
            $maintenance->save();


            $data = new CommonResource($maintenance);

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
