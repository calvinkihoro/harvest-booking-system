<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\MakeBooking;
use App\Http\Controllers\RegisterController;
use App\Http\Livewire\Accounting;
use App\Http\Livewire\Booking;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\ShowRoom;
use App\Http\Livewire\Staff;
use App\Http\Livewire\UserBill;
use App\Http\Livewire\Users;
use App\Models\Order;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth'])->get('admin/admin-dashboard', function () {
    return view('admin.dashboard');
})->name('dashAD_');

//auth custom routes

//registration
Route::get('/register', [RegisterController::class,'showRegister'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('register');
Route::post('/registerProcess', [RegisterController::class,'processRegister'])
    ->name('registerP');

//login
Route::get('/login', [RegisterController::class,'showLogin'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('login');

$limiter = config('fortify.limiters.login');
$twoFactorLimiter = config('fortify.limiters.two-factor');
$verificationLimiter = config('fortify.limiters.verification', '6,1');

Route::post('/hotelLogin', [RegisterController::class,'processLogin'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]))
    ->name('loginP_');






//admi oparations dashboard
Route::group(['middleware'=>['auth:sanctum', 'verified'],'prefix'=>'/admin'],function () {
    //customer register
    Route::get('/customers-operatins',ShowPosts::class)->name('clientDATA');
    //manage rooms
    Route::get('/manage-rooms',ShowRoom::class)->name('rooms');
    Route::get('/manage-bookings',Booking::class)->name('onlineBooking');
    Route::get('/manage-staff',Staff::class)->name('staff');
    Route::get('/accounting-management',Accounting::class)->name('accounting');
    Route::get('/downloadPdf/{userId}/{custId}',[PdfController::class,'index'])->name('pdf1');
    Route::get('/billReceipt/{orderId}',[PdfController::class,'bill'])->name('billReceipt');
    Route::get('/system-users',Users::class)->name('users');
    Route::get('/manage-stock',\App\Http\Livewire\AddStock::class)->name('stock');
    Route::get('/manage-bill',UserBill::class)->name('bill');
    Route::get('/generate-Reports',\App\Http\Livewire\GenerateReports::class)->name('generateReports');
    Route::get('/make-Post',\App\Http\Livewire\BlogPosts::class)->name('blogPosts');
    Route::get('/manage-orders',\App\Http\Livewire\Orders::class)->name('orders');
    Route::post('/manageProceedings/{id}',[\App\Http\Controllers\OrderController::class,'addData'])->name('orders1');

});

//make bookings
Route::post('/sendBooking',[MakeBooking::class,'store'])->name('makeBooking');
