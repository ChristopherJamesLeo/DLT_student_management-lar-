<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryContrller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\EdulinksController;
use App\Http\Controllers\EnrollsController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AttendancesController;


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



// dashborad ကို middleware ပေးထားလဲ ရသည် 
// route ကို တစ်ခုတည်းပေးမည်ဆိုလျှင် ၍ သို့ရျွေးနိုင်သည် 
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// auth လုပ်ထားသော သူသာလျှင် middle အတွင်းရှိနေသောသူများအလုပ်လုပ်မည် 
// group လုပ်ပြီးလဲ middleware ၏ permission ပေးမှသာ ဝင်နိုင်မည် 
Route::middleware('auth')->group(function () {

    Route::get("dashboards",[DashboardsController::class,"index"])->name("dashboard.index");

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // log in ဝင်ပြီးမှ အသုံးပြုလို့ရစေချင်သောကြောင့် middleware  ထဲမှာ‌ရေးခြင်းဖြစ်သည် 
    Route::resource("statuses",StatusesController::class);
    Route::resource("days",DaysController::class);
    Route::resource("enrolls",EnrollsController::class);
    Route::resource("edulinks",EdulinksController::class);

    Route::resource("students",StudentsController::class);
    Route::resource("roles",RolesController::class);
    Route::resource("cities",CityController::class);
    Route::resource("countries",CountryContrller::class);
    Route::resource("comments",CommentsController::class);
    Route::resource("genders",GenderController::class);
    Route::resource("tags",TagsController::class);
    Route::resource("categories",CategoriesController::class);

    Route::resource("types",TypesController::class);
    
    Route::resource("posts",PostsController::class);

    Route::resource("attendances",AttendancesController::class);
    Route::resource("stages",StagesController::class);

    
});

require __DIR__.'/auth.php';
