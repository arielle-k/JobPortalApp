<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;



use App\Models\Profile;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/Dashbord',[HomeController::class,'dashbord'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/complete', [ProfileController::class, 'complete'])->name('profile.complete');
    Route::resource('/profile', ProfileController::class);
});



require __DIR__.'/auth.php';

//job view
Route::get('/',[JobController::class, 'index'])->name('jobs.index');
Route::resource('/jobs', JobController::class)->except('index');
Route::get('/alljobs',[JobController::class, 'alljobs'])->name('alljobs');
Route::get('/applicants',[JobController::class, 'applicants'])->name('jobs.applicant');
Route::get('/job/{jobId}/postuler',[JobController::class, 'application'])->name('job.applications');
Route::get('/job/search', [JobController::class, 'search'])->name('jobs.search');




//category view
Route::get('/category/{id}',[CategoryController::class,'index'])->name('category.index');

//company
Route::get('/companies',[CompanyController::class,'index'])->name('companies.index');
Route::resource('/companies', CompanyController::class);


//admin
Route::get('Dashboard',[AdminController::class,'index'])->name('admin')->middleware('admin');
Route::get('/Dashboard/Admin/home',[AdminController::class,'home'])->name('admin.home')->middleware('admin');
Route::get('/dashboard/jobs',[AdminController::class,'getAllJobs'])->name('admin.jobs')->middleware('admin');
Route::get('/Candidatures',[AdminController::class, 'applicants'])->name('admin.applicants')->middleware('admin');
Route::get('/Dashboard/Companies',[AdminController::class, 'getAllCompany'])->name('admin.companies')->middleware('admin');
Route::get('/Dashboard/New/Company',[CompanyController::class, 'create'])->name('admin.company.create')->middleware('admin');
Route::get('/Dashboard/Users',[AdminController::class, 'getAllUsers'])->name('admin.users')->middleware('admin');
Route::get('/Dashboard/User',[AdminController::class, 'createUser'])->name('admin.user.create')->middleware('admin');

