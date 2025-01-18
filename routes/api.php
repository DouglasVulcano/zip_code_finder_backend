<?php

use App\Infra\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/search-address/{cep}', [AddressController::class, 'search']);
