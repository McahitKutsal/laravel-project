<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage\HomePageController;
use App\Http\Controllers\HomePage\LoginController;
use App\Http\Controllers\HomePage\DashboardController;
use App\Http\Controllers\HomePage\CategoryController;
use App\Http\Controllers\HomePage\PageController;
use App\Http\Controllers\HomePage\MessageController;

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

Route::prefix('admin')->middleware('isLogin')->group(function(){
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginPost'])->name('admin.login.post');
});

Route::prefix('admin')->middleware('isAdmin')->group(function(){
  Route::resource('urunler', ProductController::class);
  Route::get('panel', [DashboardController::class, 'index'])->name('admin.index');
  Route::get('sayfalar/bilgiler', [PageController::class, 'bilgiler'])->name('admin.bilgiler');
  Route::get('sayfalar/mesajlar', [MessageController::class, 'getMessages'])->name('admin.mesajlar');
  Route::post('sayfalar/mesajlar', [MessageController::class, 'destroy'])->name('messages.destroy');
  Route::get('sayfalar/getdata', [PageController::class, 'getData'])->name('admin.contact.getdata');
  Route::post('sayfalar/bilgiler', [PageController::class, 'updateContact'])->name('admin.contact.updateContact');
  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('kategoriler', [CategoryController::class, 'index'])->name('admin.category.index');
  Route::post('kategoriler/yeni', [CategoryController::class, 'create'])->name('admin.category.create');
  Route::post('kategoriler/update', [CategoryController::class, 'update'])->name('admin.category.update');
  Route::post('kategoriler/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
  Route::get('kategoriler/getdata', [CategoryController::class, 'getData'])->name('admin.category.getdata');
  Route::get('sayfalar', [PageController::class, 'index'])->name('admin.page.index');
  Route::get('sayfalar/{slug}', [PageController::class, 'update'])->name('admin.page.update');
  Route::post('sayfalar/insert', [PageController::class, 'insert'])->name('admin.page.insert');
});


Route::get('/', [HomePageController::class, 'index'])->name('index');
Route::get('/kategori/{category}', [HomePageController::class, 'category'])->name('category');
Route::get('/urun/{id}', [HomePageController::class, 'single'])->name('single');
Route::get('/iletisim', [HomePageController::class, 'contact'])->name('contact');
Route::post('/iletisim', [HomePageController::class, 'contactPost'])->name('contact.post');
Route::get('/{slug}', [HomePageController::class, 'page'])->name('page');
