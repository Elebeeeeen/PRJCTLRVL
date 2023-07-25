<?php

use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/registration',[App\Http\Controllers\RegistrationsController::class, "index"]);
Route::post('/registration',[App\Http\Controllers\RegistrationsController::class, "create"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('/leaveform', App\Http\Controllers\EmployeeController::class);

//print
Route::post("/printform/{id}", [App\Http\Controllers\PrintController::class, "printform"])->name("printform");
Route::post("/printformDC/{id}", [App\Http\Controllers\PrintController::class, "printformDC"])->name("printformDC");

//division chief
Route::resource('/divisionchief', App\Http\Controllers\DCController::class);
Route::get('/divisionlist', [App\Http\Controllers\DCController::class, 'index2']);
Route::get('/divemplist', [App\Http\Controllers\DCController::class, 'index3']);
Route::get('/viewemplist/{id}', [App\Http\Controllers\DCController::class, 'show3']);


//new route

//Creating a form of the employee
Route::get('/employeeCreateForm', [App\Http\Controllers\leaveFormController::class, 'createLeaveForm']);

//storing a form of the employee
Route::post('/employeeCreateForm', [App\Http\Controllers\leaveFormController::class, 'storeLeaveForm']);

//showing  the table of the created form
Route::get('/employeeCreatedForm', [App\Http\Controllers\leaveFormController::class, 'tableEmployee']);

//viewing the inputed data of the employee 
Route::get('/employeeCreatedForm/{id}', [App\Http\Controllers\leaveFormController::class, 'viewEmployees']);

//for division chief, approving the employees leave form
Route::get('/divisionCreatedForm', [App\Http\Controllers\leaveFormController::class, 'tableDivision']);

//table for approving the employees form by the division chief
Route::get('/approvingEmployeesForm', [App\Http\Controllers\leaveFormController::class, 'tableDivisionEmployee']);

//for home page of the pending applications
Route::get('/pendingApplication', [App\Http\Controllers\leaveFormController::class, 'pendingApplication']);

// //for viewing the approval form to the employee by the division chief
Route::get('/approvalApplication/{id}', [App\Http\Controllers\leaveFormController::class, 'viewEmployees']);

//for viewing division application
Route::get('/viewApplication/{id}', [App\Http\Controllers\leaveFormController::class, 'viewDivision']);

//for email approving the application of the employee by the division chief
Route::put('/approvingApplicationDC/{id}', [App\Http\Controllers\leaveFormController::class, 'emailDC']);

// //for viewing the approval form to the division by the director
Route::get('/approvalApplicationDir', [App\Http\Controllers\leaveFormController::class, 'tableDirector']);

//for viewing division application by the director
Route::get('/viewApplicationDir/{id}', [App\Http\Controllers\leaveFormController::class, 'viewDirector']);

//for email approving the application of the division chief by the director
Route::put('/approvingApplicationDir/{id}', [App\Http\Controllers\leaveFormController::class, 'emailDirector']);

// //for viewing all the approval form for the employee and division by the hr
Route::get('/approvalApplicationHR', [App\Http\Controllers\leaveFormController::class, 'tableHR']);

//for viewing all application by the HR
Route::get('/viewApplicationHR/{id}', [App\Http\Controllers\leaveFormController::class, 'viewHR']);

//approving account that direct into the users in database
Route::post('/hrAccountApproved/{id}', [App\Http\Controllers\leaveFormController::class, 'hrAccountApproved']);

//for email approving the application of the employee by the division chief
Route::put('/verifyingApplicationHR/{id}', [App\Http\Controllers\leaveFormController::class, 'emailHR']);

// //for viewing all the approval form for the employee and division that verified by the hr and now it should verified by head
Route::get('/approvalApplicationHead', [App\Http\Controllers\leaveFormController::class, 'tableHead']);

//for viewing all verified application by the HO
Route::get('/viewApplicationHead/{id}', [App\Http\Controllers\leaveFormController::class, 'viewHead']);

//for email verifying the application of the employee and the division chief that is also verified by the hr
Route::put('/verifyingApplicationHead/{id}', [App\Http\Controllers\leaveFormController::class, 'emailHead']);

//all the leaves are indicated to the type of leave
Route::get('/leavelist', [App\Http\Controllers\leaveFormController::class, 'leavelist']);

//for accepting accounts
Route::get('/acceptAccounts', [App\Http\Controllers\leaveFormController::class, 'tableHRAcounts']);

//viewing the pending accounts of the employee
Route::get('/viewAcceptAccounts/{id}', [App\Http\Controllers\leaveFormController::class, 'viewHRAccounts']);

//after viewing sending emails to the applied accounts
Route::post('/emailAccounts/{id}', [App\Http\Controllers\leaveFormController::class, 'emailHRAccounts']);

//password
Route::resource('/changepassword', App\Http\Controllers\ChangePassController::class);


Auth::routes();
