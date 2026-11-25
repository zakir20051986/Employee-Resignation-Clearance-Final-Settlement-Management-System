<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('dashboard'));
Route::get('/up', fn () => response()->json(['status' => 'ok']));
