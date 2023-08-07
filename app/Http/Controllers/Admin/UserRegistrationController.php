<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserRegistrationController extends Controller
{
    public function userRegisterController(Request $request)
    {


        if ($request->ismethod('post')) {
            $data = $request->all();





            $rules = [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6'
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0]
                    ];

                    return response()->json($a);
                    // die;
                }
            }


            function generateRandomString($length = 6)
            {
                $characters = 'abcdefghijklmnopqrstuvwxyz';
                $randomString = '';

                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }

                return $randomString;
            }


            $user = new User();
            $user->name  = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->role  = $data['role'];
            $user->type  = $data['type'];
            $user->device_id  = $data['device_id'];
            $user->unique_user_id = $data['unique_user_id'];
            $user->password = bcrypt($data['password']);
            $user->save();

            if (isAPIRequest()) {
                DB::table('flat_rentee')->insert(['flat_owner_id' => $request->logged_in_owner, 'rentee' => $user->id]);
            } else {
                DB::table('flat_rentee')->insert(['flat_owner_id' => Auth::user()->id, 'rentee' => $user->id]);
            }





            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $user = User::where('email', $data['email'])->first();
                $access_token = $user->createToken($data['email'])->accessToken;
                User::where('email', $data['email'])->update(['access_token' => $access_token]);
                $message = 'User Successfully Registerd';
                return response()->json(['message' => $message, 'access_token' => $access_token, 'success' => true,], 201);
            } else {
                $message = 'Oppss Something Went Wrong';
                return response()->json(['message' => $message, 'success' => false], 422);
            }
        }
    }


    public function userLoginController(Request $request)
    {
        if ($request->ismethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|exists:users',
                'password' => 'required'
            ];

            $validator =  Validator::make($data, $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->getMessages() as $key => $value) {
                    $a = array();
                    $a = [
                        'success' => false,
                        'message' => $value[0],
                    ];
                    return response()->json($a);
                }
            }




            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $user = User::where('email', $data['email'])->first();
                unset($user['facebook_id'], $user['access_token'], $user['google_id'], $user['google_id'], $user['designation'], $user['institution_id'], $user['description'], $user['slug'], $user['email_verified_at'], $user['ministry_department'], $user['organization_user'], $user['regulatory_authority'], $user['branch_user'], $user['signature'], $user['division'], $user['role'], $user['user_creator'], $user['user_category']);
                $access_token = $user->createToken($data['email'])->accessToken;


                //dashboard 
                if ($user['type'] == 'ASSOCIATION') {

                    $buildings = DB::table('buildings')->count();
                    $flats = DB::table('flats')->count();
                    $flat_owner = DB::table('users')->where('type', 'flat_owner')->count();
                    $expenses = DB::table('expenses')->sum('expense_amount');
                    $your_balance = 100000;
                    $total_bill = DB::table('invoices')->where('invoice_payment_status', 'UNPAID')->sum('invoice_grand_total');
                    $total_paid = DB::table('invoices')->where('invoice_payment_status', 'PAID')->sum('invoice_grand_total');
                    $service_charge = $expenses;
                } elseif ($user['type'] == 'FLAT_OWNER') {
                    $my_rentees = DB::table('flat_rentee')->where('flat_owner_id', $user['id'])->join('users', 'users.id', '=', 'flat_rentee.rentee')->count();
                    $total_paid = DB::table('money_receipt')->whereMoneyReceiptHasDeleted('NO')->where('money_receipt_flat_owner_id', '=', $user)->sum('money_receipt_total_amount');
                    $total_bill = DB::table('invoices')->where('invoice_has_deleted', 'NO')
                        ->where('invoice_payment_status', 'UNPAID')
                        ->where('flat_owner_id', $user['id'])
                        ->sum('invoice_grand_total');
                    $my_flats   = DB::table('flat_rentee')->where('flat_owner_id', $user['id'])->count();
                    $total_created_bill_items   = DB::table('billing_items')->where('items_for', 'RENTEE')->where('flat_owner_id', $user['id'])->count();
                } else {

                    $total_paid =
                        DB::table('money_receipt')->whereMoneyReceiptHasDeleted('NO')->where('money_receipt_flat_owner_id', '=', $user['id'])->sum('money_receipt_total_amount');
                    $total_bill = DB::table('invoices')->where('invoice_has_deleted', 'NO')
                        ->where('invoice_payment_status', 'UNPAID')
                        ->where('rentee_id', $user['id'])
                        ->sum('invoice_grand_total');

                    $payments_completed =
                        DB::table('money_receipt')->whereMoneyReceiptHasDeleted('NO')->where('money_receipt_flat_owner_id', '=', $user['id'])->count();

                    $payments_due =
                        DB::table('invoices')->where('invoice_has_deleted', 'NO')
                        ->where('invoice_payment_status', 'UNPAID')
                        ->where('rentee_id', $user['id'])
                        ->count();
                }



                User::where('email', $data['email'])->update(['access_token' => $access_token]);
                $message = 'User Successfully Login';

                if ($user['type'] == 'ASSOCIATION') {
                    return response()->json([
                        'message' => $message,
                        'access_token' => $access_token,
                        'data' =>  $user,
                        'success' => true,
                        'buildings' => $buildings,
                        'flats' => $flats,
                        'flat_owner' => $flat_owner,
                        'expenses' => $expenses,
                        'your_balance' => $your_balance,
                        'total_bill' => $total_bill,
                        'total_paid' => $total_paid,
                        'service_charge' => $service_charge
                    ], 201);
                } elseif ($user['type'] == 'FLAT_OWNER') {
                    return response()->json([
                        'message' => $message,
                        'access_token' => $access_token,
                        'data' =>  $user,
                        'success' => true,
                        'my_rentees' => $my_rentees,
                        'total_paid' => $total_paid,
                        'total_bill' => $total_bill,
                        'my_flats' => $my_flats,
                        'total_created_bill_items' => $total_created_bill_items,


                    ], 201);
                } else {
                    return response()->json([
                        'message' => $message,
                        'access_token' => $access_token,
                        'data' =>  $user,
                        'success' => true,
                        'total_paid' => $total_paid,
                        'total_bill' => $total_bill,
                        'payments_completed' => $payments_completed,
                        'payments_due' => $payments_due


                    ], 201);
                }
            } else {
                $message = 'Ooops Something Went Wrong';
                return response()->json(['message' => $message, 'success' => false], 422);
            }
        }
    }
}
