<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

route::get('/', [HomeController::class, 'index']);

//show create form
Route::get('/create', [AdminController::class, 'create']);

//store list mtc
Route::post('/index', [HomeController::class, 'store']);

//store list location
Route::post('/loc', [HomeController::class, 'store_loc']);

//store list new model
Route::post('/add_model', [HomeController::class, 'store_model']);

//store list of indemnityform
Route::post('/forms', [HomeController::class, 'store_form']);

//show edit form
Route::get('/index/{mtc}/edit', [AdminController::class, 'edit']);

//show 3 action to mtc
Route::get('/property/{mtc}', [HomeController::class, 'property']);

//update listing
Route::put('/index/{mtc}', [HomeController::class, 'update']);
//update listing2
Route::put('/index2/{mtc}', [HomeController::class, 'update2']);
//update listing3 (indemnity form)
Route::put('/editform/{form}', [HomeController::class, 'update_form']);

//show single mtc
Route::get('/index/{mtc}', [HomeController::class,'show']);

//show add location (admin)
Route::get('/add_loc', [AdminController::class, 'addloc']);

//show seat location
Route::get('/seat', [HomeController::class, 'show_seat']);


Route::get('/welcome2', function () {
    return view('welcome2'); // Replace 'welcome' with the name of your view file
})->name('welcome2');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/homeadminkara', [HomeController::class, 'index']);


//show create indemnityform bruh
Route::get('/addforms', [AdminController::class, 'createform']);

//show edit indemnityform bruh
Route::get('/editform/{form}', [AdminController::class, 'editform']);

//show list of indemnityform
Route::get('/forms', [HomeController::class, 'show_form']);

//try
Route::get('/index/{serialno}', [HomeController::class, 'showBySerialNo']);

//try
Route::get('/testadmin', [AdminController::class, 'test2']);

//delete mtc
Route::delete('/mtc/{id}',[AdminController::class, 'destroy'])->name("mtc.destroy");





// Route::get('/', function () {
//     return view('welcome');
// });