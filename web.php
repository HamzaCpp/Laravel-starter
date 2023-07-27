<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
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
    return view('home');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('role:admin'); // this will redirect the page to home from dashboard when role == admin

/////////////////////////////////////////////////////////////////
// Route::get('stock', function () {
//     return view('stock');
// })->middleware('construction');

// 'construction' => \App\Http\Middleware\UnderConstruction::class,
/////////////////////////////////////////////////////////////////
//Route::get('report', [ReportController::class , 'show'])->middleware('construction');


//command to generate built-in laravel error pages
// php artisan vendor:publish --tag=laravel-errors


//FOR GROUPED FUNCTIONS OF MIDDLEWARE
Route::middleware(['construction'])->group(function(){
  
    Route::get('report', [ReportController::class , 'show'])->middleware('construction');

    Route::get('stock', function () {
        return view('stock');
    });

});