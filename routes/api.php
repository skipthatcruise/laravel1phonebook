<?php
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contacts', [ContactController::class, 'index']);  // To get all contacts
Route::post('/contacts', [ContactController::class, 'store']); // To create a new contact
Route::get('/contacts/{id}', [ContactController::class, 'show']); // To get a single contact
Route::put('/contacts/{id}', [ContactController::class, 'update']); // To update a contact
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']); // To delete a contact
