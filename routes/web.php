<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;



Route::get('/', [MemberController::class,'index'] );
Route::post('/create-user', [MemberController::class,'create_user'] );