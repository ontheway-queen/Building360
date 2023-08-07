<?php

namespace App\Http\Controllers\Admin;

use App\Events\Noticable;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Models\Notice\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RealTimeNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function realTime()
    {
        $data['notice'] = DB::table('notices')->get();
        if (isAPIRequest()) {

            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['notice']], 200);
        } else {

            return view('pages.notice.newnotice', $data);
        }
    }

    public function realTimePost(Request $request)
    {

        // $data = [
        //     'notice_title' => $request->input('notice_title'),
        //     'notice_body' => $request->input('notice_body'),
        //     'notice_created_by' => Auth::user()->id,
        //     'notice_published_time' => date('Y-m-d'),
        //     'noticed_created_for' => $request->input('noticed_created_for'),
        // ];



        // DB::table('notices')->insert([
        //     'notice_title'       => $request->input('notice_title'),
        //     'notice_body'        => $request->input('notice_body'),


        //     'notice_published_time' => date('Y-m-d'),
        //     'noticed_created_for' => $request->input('noticed_created_for'),
        // ]);


        $request->validate([
            'notice_title' => 'required',
            'notice_body' => 'required'
        ]);

        $notice = new Notice();

        $notice->notice_title = $request->notice_title;
        $notice->notice_body = $request->notice_body;

        if (isAPIRequest()) {
            $notice->notice_created_by = $request->notice_created_by;
        } else {
            $notice->notice_created_by = Auth::user()->id;
        }

        $notice->notice_published_time = $request->notice_published_time;
        $notice->noticed_created_for = $request->noticed_created_for;
        $notice->notice_published_time = date('Y-m-d');
        $notice->save();

        $data = new CommonResource($notice);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);







        // return gettype($name);
        // die;
        // return $name;
        // die;

        // event(new Noticable($data));
    }
}
