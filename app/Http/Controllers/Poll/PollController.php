<?php

namespace App\Http\Controllers\Poll;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Poll\Poll;
use App\Models\PollAnwer\PollAnswer;
use App\Models\PollOption\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $poll_option = PollOption::get();
        // join('poll_options', 'poll_options.get_poll_id', '=', 'poll_question.poll_id')

        $poll_question = Poll::get();

        $formattedData = [];

        foreach ($poll_question as $poll) {
            $formattedPoll = [
                'topic' => $poll->topic,
                'objective' => $poll->objective,
                'created_by' => $poll->created_by
            ];

            $pollOptions = PollOption::where('get_poll_id', $poll['poll_id'])->get();

            foreach ($pollOptions as $option) {
                $formattedPoll['poll_option_text'][] = [
                    'poll_option_id ' => $option->poll_option_id,
                    'poll_option_text' => $option->poll_option_text,
                ];
            }

            $formattedData[] = $formattedPoll;
        }

        //return response()->json($formattedData);


        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $formattedData], 200);
    }


    public function getPollwiseQuestion($id)
    {

        $poll = Poll::where('poll_id', $id)->first();
        $data['poll_with_answer'] = PollOption::where('get_poll_id', $id)->select('poll_option_id', 'poll_option_text')->get();

        $option = PollOption::where('get_poll_id', $id)->select('poll_option_id')->get();

        $resk = json_decode(json_encode($option), true);

        $pollOptionIds = [];

        foreach ($resk as $item) {
            $pollOptionIds[] = $item['poll_option_id'];
        }

        $difficult = PollAnswer::whereIn('answerd', $pollOptionIds)
            ->select('answerd', DB::raw('count(*) as count'))
            ->groupBy('answerd')
            ->get();


        return response()->json(['success' => true, 'message' => 'Successfully Fetched', 'objective_id' => $poll->poll_id, 'objective' => $poll->objective, 'data' => $difficult], 200);
    }

    public function getPollwiseAnswer(Request $request)
    {
        $data = new PollAnswer();
        $data->user_id = $request->user_id;
        $data->answerd = $request->answerd;
        $data->save();



        return response()->json(['success' => true, 'message' => 'Successfully Fetched', 'data' => $data], 200);
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
        $poll = new Poll();
        $poll->topic = $request->topic;
        $poll->objective = $request->objective;
        $poll->created_by = $request->created_by;
        $poll->save();


        $option = $request->input('poll_option_text', []); // Default to empty array if not provided

        foreach ($option as $option) {
            $property1 = $option['poll_option_text'];
            // Access and process other properties as needed

            // Perform your desired processing for each billing row
            // For example, you might want to store the data in a database or perform some calculations
            // You can also create new model instances and use Eloquent to interact with the database

            // Example: Store the billing row data in the database
            PollOption::create([
                'get_poll_id' => $poll->poll_id,
                'poll_option_text' => $property1,
                // Other properties
            ]);
        }


        $data = new CommonResource($poll);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);
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
