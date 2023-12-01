<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;

route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
