<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeEvent;
use App\Models\Event\Event;
use App\Models\Event\EventParticipation;
use Illuminate\Http\Request;

class EventManagementController extends Controller
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
        $complain = Event::where('unique_creator', $request->unique_creator)
            ->join('users', 'users.id', '=', 'event_management.event_created_by')
            ->select('users.name AS event_creator', 'event_id', 'event_title', 'event_description', 'event_date', 'event_fee', 'event_location')
            ->get();





        foreach ($complain as &$event) {
            // Simulating the participator count, you need to replace this with your logic
            $participatorCount = 1; // Replace with your logic to get the actual count
            $event['participator_count'] = EventParticipation::where('per_event_id', $event['event_id'])->count();
        }

        // Convert the array to JSON





        // Convert the array to JSON
        // $jsonResponse = json_encode($response, JSON_PRETTY_PRINT);


        if ($complain->isEmpty()) {
            return $this->sendErrorResponse('No announcement found.', 404);
        }
        return $this->sendSuccessResponse('Announcement fetched successfully.', $complain, 201);
    }
    //priyangon_unique_7896456_ID
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
    public function store(storeEvent $request)
    {
        $event = new Event();
        $event->event_created_by   = $request->event_created_by;
        $event->unique_creator     = $request->unique_creator;
        $event->event_title        = $request->event_title;
        $event->event_description  = $request->event_description;
        $event->event_date         = $request->event_date;
        $event->event_location     = $request->event_location;
        $event->save();

        // Return a successful response
        return response()->json(
            [
                'success' => true,
                'message' => 'Successfully Created',
                'data' => $event
            ],
            201
        );
    }


    public function eventParticipate(Request $request)
    {


        $getCOunt = EventParticipation::where('per_event_id', $request->event_id)->where('participator', $request->participator)->count();



        if ($getCOunt < 1) {
            if ($request->ans == 'YES') {
                $participate = new EventParticipation();
                $participate->per_event_id = intval($request->event_id);
                $participate->participator = intval($request->participator);
                $participate->save();

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'You Are Going to the event',
                        'data' => $participate
                    ],
                    201
                );
            }


            return response()->json(
                [
                    'success' => true,
                    'message' => 'Not Interested!You Are Not Going to the event'
                ],
                201
            );
        }


        return response()->json(
            [
                'success' => true,
                'message' => 'You have Already Joined'
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
