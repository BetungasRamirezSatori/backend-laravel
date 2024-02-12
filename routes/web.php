<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\ReportUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('test', TestController::class);

Route::get('report-user/{userId}', ReportUserController::class);

Route::prefix('users/')
->name('users.')
->group(function(){
    Route::get('get-user/{user}',[UserController::class,'getUser'])
    ->name('get_name');

    Route::post('create/{user}',[UserController::class,'create'])
    ->name('create');

    Route::post('update/{user}',[UserController::class,'update'])
    ->name('update');

    Route::post('update-2/{todoId}/{user}',[UserController::class,'update2'])
    ->name('update_2');

    Route::get('get-user-by-email/{user:email}',[UserController::class,'getUserByEmail'])
    ->name('get_user_by_email');

    Route::get('get-user-todo/{user}/{todo}',[UserController::class,'getUserTodo'])
    ->name('get_user_todo');

    Route::get('get-user-todo-2/{user}/{todo:state_id}',[UserController::class,'getUserTodo'])
    ->name('get_user_todo_2')
    ->missing(function (){
        return response()->json([
            'text' => 'Uno de los elementos solicitados no se encuentra disponible'
        ]);
    });
});


Route::get('csrf', function(){
    return csrf_token();
})->name('csrf');