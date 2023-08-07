<?php

namespace App\Http\Controllers\ExpenseSubHead;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommonResource;
use App\Http\Resources\ExpenseSubHeadResource;
use App\Models\ExpenseSubhead\ExpenseSubHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseSubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['expenseSubhead'] = CommonResource::collection(ExpenseSubHead::where('subhead_status', 1)->get());


        if (isAPIRequest()) {
            $data['expenseSubhead'] = ExpenseSubHead::where('subhead_status', 1)->join('users', 'users.id', '=', 'expense_sub_heads.created_by')->where('users.unique_user_id', $request->unique_user_id)->get();
            foreach ($data['expenseSubhead'] as $item) {
                unset($item['access_token']);
                unset($item['description']);
                unset($item['email']);
                unset($item['name']);
                unset($item['slug']);
                unset($item['image']);
                unset($item['email_verified_at']);
                unset($item['password']);
                unset($item['user_has_deleted']);
                unset($item['user_type']);
                unset($item['address']);
                unset($item['phone']);
                unset($item['remember_token']);
                unset($item['role']);
            }
            return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data['expenseSubhead']], 200);
        } else {

            return view('pages.expensesubhead.list_expense_sub_head', $data);
        }





        // $data['head'] = ExpenseHead::where('status',1)->get();
        // return view('pages.expensehead.list_expense_head',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.expensesubhead.create_expense_sub_head');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = [
        //     'title' => 'required|string|max:255',
        //     'created_by' => 'required|integer',
        // ];

        $expensesubhead = new ExpenseSubHead();
        $expensesubhead->sub_title  = $request->sub_title;
        $expensesubhead->expense_head_id  = $request->expense_head_id;
        if (isAPIRequest()) {
            $expensesubhead->created_by  = $request->created_by;
        } else {
            $expensesubhead->created_by  = Auth::user()->id;
        }
        $expensesubhead->save();


        $data = new CommonResource($expensesubhead);

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
        $data['head'] = ExpenseSubHead::where('expense_sub_head_id', $id)->first();
        return view('pages.expensesubhead.edit_expense_sub_head', $data);
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

        $item = ExpenseSubHead::find($id);
        $item->title = $request->title;
        $item->updated_by = $request->updated_by;
        $item->expense_head_id = $request->expense_head_id;
        if (isAPIRequest()) {
            $item->updated_by = $request->updated_by;
        } else {
            $item->updated_by = Auth::user()->id;
        }

        $item->save();


        $data = new CommonResource($item);

        return response()->json(['success' => true, 'message' => 'Successfully Done', 'data' => $data], 200);





        // $request->validate([
        //     'title' => 'required',
        //     'updated_by' => 'required'
        // ]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense_head = ExpenseSubHead::find($id);
        $expense_head->subhead_status = 0;
        $expense_head->save();
        return response()->json(['success' => true, 'message' => 'Successfully Deleted'], 200);
    }
}
