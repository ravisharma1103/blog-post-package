<?php

use Illuminate\Support\Facades\Route;
use MyVendor\BlogPost\Http\Controllers\BlogPostController;


Route::middleware('web')->group(function () {
    Route::resource('blog-posts', BlogPostController::class);
});
