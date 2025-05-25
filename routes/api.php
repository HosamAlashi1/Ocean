<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\HowWeWorkController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SeoController;
use App\Http\Controllers\Api\SubscribeController;
use App\Http\Controllers\Api\ContactMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// home
Route::get('/home',[HomeController::class,'index']);
Route::get('/download-company-profile',[HomeController::class,'downloadCompanyProfile']);

// subscribe
Route::post('/join-our-weekly',[SubscribeController::class,'add']);

// works
Route::get('/projects',[ProjectController::class,'list']);

// blogs
Route::get('/blogs',[BlogController::class,'list']);
Route::get('/blog-details/{id}',[BlogController::class,'details']);

// about
Route::get('/about',[AboutController::class,'list']);

// how we work
Route::get('/how-it-work',[HowWeWorkController::class,'list']);

// contact us
Route::get('/contact-us',[ContactMessageController::class,'list']);
Route::post('/contact-us',[ContactMessageController::class,'add']);

// SEO
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);
Route::get('/preview/blog/{id}', [SeoController::class, 'blogPreview']);

