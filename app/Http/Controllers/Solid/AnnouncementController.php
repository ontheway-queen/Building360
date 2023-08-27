<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Http\Requests\updateAnnouncement;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Announcement\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        $announcement = Announcement::where('announcement_created_by', $request->announcement_created_by)->where('is_deleted', false)->get();
        if ($announcement->isEmpty()) {
            return $this->sendErrorResponse('No announcement found.', 404);
        }
        return $this->sendSuccessResponse('Announcement fetched successfully.', $announcement, 201);
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
    public function store(AnnouncementRequest $request)
    {

        $announcement = new Announcement();
        $announcement->announcement_created_by = $request->announcement_created_by;
        $announcement->announcement_topic      = $request->announcement_topic;
        $announcement->announcemet_text        = $request->announcemet_text;
        $announcement->announcemet_date        = $request->announcemet_date;
        $announcement->announcemet_for         = $request->announcemet_for;
        $announcement->save();

        // Return a successful response
        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Created',
                'data' => $announcement
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
    public function update(updateAnnouncement $request, $id)
    {
        $announcement = Announcement::find($id);
        if (!$announcement) {
            return $this->updateFailMsg('Notice not found.', 404);
        }
        $announcement->announcement_created_by = $request->announcement_created_by;
        $announcement->announcement_topic      = $request->announcement_topic;
        $announcement->announcemet_text        = $request->announcemet_text;
        $announcement->announcemet_date        = $request->announcemet_date;
        $announcement->announcemet_for         = $request->announcemet_for;
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
        // Find the directory entry by ID
        $directory = Announcement::where('is_deleted', false)->find($id);

        if (!$directory) {
            return $this->deleteFailMess('Announcement not found.', 404);
        }
        $directory->is_deleted = true;

        $directory->update();

        return $this->deleteSuccessMess('Announcement deleted.', $directory);
    }

    private function deleteSuccessMess($message)
    {
        return response()->json([
            'success' => true,
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
