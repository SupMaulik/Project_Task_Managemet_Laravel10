<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

//Route to display home page or task's listing page
Route::get('/',[TaskController::class,'index']);


//Post Route to Add new Task
Route::POST('/Add_Task',[TaskController::class,'AddTask']);


//Route to open edit form model of Task
Route::get('/edit_task/{id}',[TaskController::class,'edit_task']);

//post Route for update edit form model of Task
Route::post('/update_task/{id}',[TaskController::class,'update_task']);

//Route to delete task
Route::get('/delete_task/{id}',[TaskController::class,'delete_task']);

//Post Route for add Project
Route::post('/addproject',[TaskController::class,'add_project']);

//Route for select project from dropdown
Route::post('/selectproject',[TaskController::class,'select_project']);