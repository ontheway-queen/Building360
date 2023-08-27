<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Expense Head */
Route::resource('expense-head', ExpenseHead\ExpenseHeadController::class);

Route::resource('expense-sub-head', ExpenseSubHead\ExpenseSubHeadController::class);



Route::resource('account-transfer', Accounts\AccountTransferController::class);
Route::get('account/balance-statement', 'Accounts\AccountsController@balance_statement');
Route::post('account/save-opening-balance', 'AccountTransactions\AccountTransactionsController@save_opening_balance');
Route::get('search-account', function (Request $request) {
    return search_account($request->q);
});

Route::get('search-account-full-data', function (Request $request) {
    return search_account_full_data($request->q);
});



/* Money Receipt */
Route::resource('money-receipt', MoneyReceipt\MoneyReceiptController::class);
/* Money Receipt */


Route::resource('delivery-men', DeliveryMan\DeliveryManController::class);

/* expense */
Route::resource('expenses', Expenses\ExpensesController::class);


Route::get('expense-report', 'Expenses\ExpensesController@expenseReport');

Route::resource('delivery-men', DeliveryMan\DeliveryManController::class);
Route::resource('company-info', CompanyInfo\CompanyInfoController::class);


Route::get('get-invoice-full-information', function (Request $request) {
    return get_invoice_full_information($request->q);
});

Route::resource('billing-items', Configuration\BillingItemsController::class);

Route::resource('invoice', Invoice\InvoiceController::class);
Route::get('invoice-report', 'Invoice\InvoiceController@invoiceSaleReport');





/* 2-27-23 Building Management */

Route::resource('building', Configuration\Building\BuildingController::class);

Route::resource('flat', Configuration\FlatController::class);


Route::get(
    'search-flat-owner-wise-invoice',
    function (Request $request) {
        return search_flat_owner_wise_invoice($request->q);
    }
);

Route::get('get-invoice-full-information', function (Request $request) {
    return get_invoice_full_information($request->q);
});

Route::get(
    'flat-owner-name-search',
    function (Request $request) {
        return searchFlatOwner($request->q);
    }
);

Route::get(
    'rentee-name-search',
    function (Request $request) {
        return searchRentee($request->q);
    }
);


Route::get('flat-owners', 'Configuration\FlatController@list_of_flat_owners');

Route::resource('accounts', Accounts\AccountsController::class);

Route::resource('rentee', Rentee\RenteeController::class);

Route::resource('flat-owner-payment', Payment\FlatOwnerPaymentController::class);
Route::post('payment/approve-payment-request', 'Payment\PaymentRequestController@approve_payment_request');

Route::resource('rentee-payment', Payment\RenteePaymentController::class);

Route::get('list-of-payment-request', 'Payment\PaymentRequestController@list_of_payment_request');


Route::resource('employee', Configuration\EmployeeController::class);

Route::resource('payroll-expense-items', Configuration\PayrollExpenseController::class);

Route::resource('payroll', Payroll\PayrollController::class);
Route::get('payroll-report', 'Payroll\PayrollController@payrollReport');


Route::post('test-sms', 'Payroll\PayrollController@testSms');


Route::post('registration', 'Admin\UserRegistrationController@userRegisterController');

Route::post('new-login', 'Admin\UserRegistrationController@userLoginController');


/* accounts */

Route::resource('accounts', Accounts\AccountsController::class);


/* account transfer*/
Route::resource(
    'account-transfer',
    Accounts\AccountTransferController::class
);


/* balance Statement */
Route::get('account/balance-statement', 'Accounts\AccountsController@balance_statement');

/* non invoice amount */

Route::get('account/non-invoice-income', 'Accounts\AccountsController@non_invoice_income');


/* roles */
Route::resource('roles', Admin\RoleController::class);

/* permissions */
Route::resource('permissions', Admin\PermissionController::class);

/* users */

Route::resource('users', Admin\UserController::class);



/* building wise info */
Route::get('building-wise-info/{id}', 'Configuration\Building\BuildingController@buildingWise');


Route::resource('cheque-management', MoneyReceipt\ChecqueController::class);


//
Route::get('get-account-type-wise/{method}', 'Accounts\AccountsController@getAccountTypeInfo');


//user wise invoice

Route::get('invoice-user-wise/{created_by}', 'Invoice\InvoiceController@getInvoicesUserWise');





//invoice list

Route::get('list-user-wise-invoice/{created_by}', 'Invoice\InvoiceController@getInvoiceListUserWise');

//CHANGED  3.35
Route::get('invoice-money-reciept-user-wise/{type}/{rentee}', 'Invoice\InvoiceController@getInvoicesUserWiseMoneyReciept');




Route::get('only-flat-owners', 'Configuration\FlatController@onlyFlatOwner');

Route::resource('money-receipt', MoneyReceipt\MoneyReceiptController::class);

//Route::get('money-receipt/money-rec-creator-wise/{creator_id}/{user_type_get}', 'MoneyReceipt\MoneyReceiptController@getMoneyRecieptUserWise');

Route::get('money-receipt/money-rec-creator-wise/{creator_id}', 'MoneyReceipt\MoneyReceiptController@getMoneyRecieptUserWise');


//user wise money reciept
Route::get('money-receipt/user-wise-money-reciepts/{type}/{user_id}', 'MoneyReceipt\MoneyReceiptController@MoneyRecieptRentee');

//PAID INVOICE
Route::get('invoice/paid-invoice-flat-owner/{user_id}', 'Invoice\InvoiceController@paidInvoice');

//get unpaid invoice
Route::get('invoice/user-wise-money-unpaid-reciepts/{type}/{user_id}', 'Invoice\InvoiceController@unpaidInvoiceUserWise');




Route::resource('flat-owner-payment', Payment\FlatOwnerPaymentController::class);

Route::get('real-time-notice', 'Admin\RealTimeNoticeController@realTime');


Route::post('real-time-notice-post', 'Admin\RealTimeNoticeController@realTimePost');



//type wise user

Route::get('user-list-type-wise/{type}/{id}/{unique}', 'Admin\UserController@typeWiseUser');



Route::get('flat-owner-wise-rentee/{flat_owner_id}/{unique_id}', 'Invoice\InvoiceController@flatWiseRentee');

Route::get('association-wise-flat_owner/{unique}', 'Invoice\InvoiceController@assoWiseFlatOwner');

Route::resource('vehicles', Vehicles\VehicleController::class);

Route::resource('drivers', Driver\DriverController::class);

Route::resource('fuels', Fuel\FuelController::class);

Route::resource('fleet', Fleet\FleetExpenseController::class);

Route::resource('parking', Parking\ParkingController::class);

Route::resource('services', Service\ServiceController::class);

Route::resource('maintenance', Maintenance\MaintenanceController::class);


//
Route::resource('polls', Poll\PollController::class);


Route::get('polls/get-pollswise-question/{id}', 'Poll\PollController@getPollwiseQuestion');


Route::post('polls/get-pollswise-answer', 'Poll\PollController@getPollwiseAnswer');

Route::post('emergency', 'Solid\EmerController@store');

Route::get('emergency', 'Solid\EmerController@index');


Route::put('emergency/{dir_id}', 'Solid\EmerController@update');

Route::delete('emergency/{dir_id}', 'Solid\EmerController@destroy');


Route::resource('announcement', Solid\AnnouncementController::class);

Route::resource('complain', Solid\ComplainController::class);

Route::resource('events', Solid\EventManagementController::class);

Route::post('events/participate', 'Solid\EventManagementController@eventParticipate');
