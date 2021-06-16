<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/secret-migration-update', function () {

    $students = Student::all();

    $class = 1;
    $current = 1;

    foreach ($students as $row) {
        
        $leftbound = $current;
        $rightbound = $current + 3;

        $row->where('id', '>=', $leftbound)
            ->where('id', '<=', $rightbound)
            ->update(['class' => $class]);

        $current += 3;
        $class +=1;
    }
});
