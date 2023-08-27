<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Requests\insertComplain;
use App\Models\Complain\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{

    private function sendErrorResponse($message, $statusCode)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }


    private function sendSuccessResponse($message, $data, $statusCode)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public function index(Request $request)
    {
        $complain = Complain::where('unique_creator', $request->unique_creator)->where('is_deleted', false)
            ->join('users', 'users.id', '=', 'complain_managment.complain_creator')
            ->select('users.name AS complain_creator', 'users.type AS complain from', 'complain_managment.complain_category', 'complain_managment.complain_date', 'complain_managment.complain_text', 'complain_managment.status', 'complain_managment.priority', 'resolved_date')
            ->get();
        if ($complain->isEmpty()) {
            return $this->sendErrorResponse('No announcement found.', 404);
        }
        return $this->sendSuccessResponse('Announcement fetched successfully.', $complain, 201);
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
    public function store(insertComplain $request)
    {
        $complain = new Complain();
        $complain->complain_creator     = $request->complain_creator;
        $complain->complain_category    = $request->complain_category;
        $complain->complain_date        = $request->complain_date;
        $complain->unique_creator       = $request->unique_creator;
        $complain->complain_text        = $request->complain_text;
        $complain->status               = 'New';
        $complain->save();

        // Return a successful response
        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Created',
                'data' => $complain
            ],
            201
        );
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
        $announcement = Complain::find($id);
        $announcement->status = $request->status;
        $announcement->priority = $request->priority;
        $announcement->resolved_date = $request->resolved_date;
        $announcement->update();



        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Updated Directory',
                'data' => $announcement
            ],
            201
        );
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
