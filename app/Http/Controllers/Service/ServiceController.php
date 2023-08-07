<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Service\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if ($request->user_type == 'FLAT_OWNER') {
            $users = DB::table('flat_rentee')->where('flat_owner_id', $request->user_id)->get();
            $service = Service::join('users', 'users.id', '=', 'services.service_request_from')
                ->join('flats', 'flats.id', '=', 'services.service_request_flat_no')
                ->join('buildings', 'buildings.id', '=', 'flats.building_id')
                ->select('service_id', 'service_request_category', 'service_request_from', 'service_request_description', 'service_request_date', 'service_request_success_date', 'service_status', 'name', 'type', 'flat_no', 'floor_no', 'road_no', 'building_name', 'unique_user_id')
                ->get();


            $filteredServiceResults = [];

            foreach ($users as $user) {
                // Assuming 'flat_owner_id' column corresponds to the 'user_id' you want to match
                $matchingServices = $service->filter(function ($serviceRecord) use ($user) {
                    // Replace 'flat_owner_id' and 'service_request_from' with actual column names
                    return $serviceRecord->service_request_from ==  $user->rentee;
                });

                $filteredServiceResults = array_merge($filteredServiceResults, $matchingServices->all());
            }


            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $filteredServiceResults], 200);
        } elseif ($request->user_type == 'RENTEE') {
            $data['service'] = Service::join('users', 'users.id', '=', 'services.service_request_from')
                ->join('flats', 'flats.id', '=', 'services.service_request_flat_no')
                ->join('buildings', 'buildings.id', '=', 'flats.building_id')
                ->where('services.service_request_from', $request->user_id)
                ->select('service_id', 'service_request_category', 'service_request_from', 'service_request_description', 'service_request_date', 'service_request_success_date', 'service_status', 'name', 'type', 'flat_no', 'floor_no', 'road_no', 'building_name', 'unique_user_id')
                ->get();

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['service']], 200);
        } else {
            $data['service'] = Service::join('users', 'users.id', '=', 'services.service_request_from')
                ->join('flats', 'flats.id', '=', 'services.service_request_flat_no')
                ->join('buildings', 'buildings.id', '=', 'flats.building_id')
                ->where('users.unique_user_id', $request->unique_user_id)
                ->select('service_id', 'service_request_category', 'service_request_from', 'service_request_description', 'service_request_date', 'service_request_success_date', 'service_status', 'name', 'type', 'flat_no', 'floor_no', 'road_no', 'building_name', 'unique_user_id')
                ->get();

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['service']], 200);
        }
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
            'service_request_from' => 'required',
            'service_request_category' => 'required',
            'service_request_category' => 'required'
        ]);


        if ($validator->fails()) {

            return response()->json([
                'message' => 'Invalid params passed',
                'success' => true, // the ,message you want to show
                'errors' => $validator->errors()
            ], 422);
        } else {
            $service = new Service();
            $service->service_request_from = $request->service_request_from;
            $service->service_request_category = $request->service_request_category;
            $service->service_request_description = $request->service_request_description;
            $service->service_request_flat_no = $request->service_request_flat_no;
            $service->service_request_date = date('Y-m-d');
            $service->save();
            $data = new CommonResource($service);

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
        $service =   Service::where('service_id', $id)->update([
            'service_request_success_date' => date('Y-m-d'),
            'service_status' => 'CLEARED',
        ]);


        return response()->json(['success' => true, 'message' => 'Successfully Updated'], 200);
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
