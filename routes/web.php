<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;



//home 
Route::get('/', [MemberController::class,'index'] );

//create
Route::post('/create-user', [MemberController::class,'create_user'] );
//update
Route::get('/edit-form/{id}', [MemberController::class,'edit_form'] );
Route::put('/update-user', [MemberController::class,'update_user'] );

//delete
Route::delete('/delete-user', [MemberController::class,'delete_user'] );

