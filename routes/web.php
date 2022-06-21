<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\SkripsiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/mahasiswa', [RegisterController::class, 'mahasiswa'])->name('mahasiswa');
Route::post('/register/insert_mahasiswa', [RegisterController::class, 'insert_mahasiswa']);
Route::get('/register/dosen', [RegisterController::class, 'dosen'])->name('dosen');
Route::post('/register/insert_dosen', [RegisterController::class, 'insert_dosen']);


//hak akses untuk mahasiswa
Route::middleware(['mahasiswa'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('/dosen/calender/{id}', [DosenController::class, 'calender'])->name('confirm_booking');
    Route::get('/dosen/skripsi/{id}', [DosenController::class, 'skripsi']);
    Route::get('/dosen/load_data/{kode_user}', [DosenController::class, 'load_data']);
    Route::get('/dosen/load_data_skripsi/{kode_user}', [DosenController::class, 'load_data_skripsi']);
    Route::get('/dosen/detail_skripsi_mahasiswa/{kode_user}', [DosenController::class, 'detail_skripsi_mahasiswa']);
    Route::get('/dosen/getStatusP0/{kode_dosen}/{kode_mahasiswa}', [DosenController::class, 'getStatusP0']);
    Route::get('/dosen/getCheckStatusP0/{kode_dosen}/{kode_mahasiswa}', [DosenController::class, 'getCheckStatusP0']);
    Route::get('/dosen/load_form/{id}', [DosenController::class, 'load_form']);
    Route::get('/dosen/load_event/{id}', [DosenController::class, 'load_event']);

    Route::post('/dosen/insert_booking_confirm', [DosenController::class, 'insert_booking_confirm']);
    Route::post('/dosen/insert_log', [DosenController::class, 'insert_log']);
    Route::post('/dosen/insert_doc_p0', [DosenController::class, 'insert_doc_p0']);
    Route::post('/dosen/insert_doc_p1', [DosenController::class, 'insert_doc_p1']);
    Route::post('/dosen/insert_doc_p2', [DosenController::class, 'insert_doc_p2']);
    Route::get('/dosen/load_jadwal/{start}/{dt}/{kode_dosen}', [DosenController::class, 'load_jadwal']);

    Route::post('/dosen/insert_booking_detail', [DosenController::class, 'insert_booking_detail']);
    Route::get('/dosen/ajax_get_booking/{kode_booking}', [DosenController::class, 'ajax_get_booking']);
    Route::post('/dosen/insert_booking_detail_confirm', [DosenController::class, 'insert_booking_detail_confirm']);

    Route::get('/dosen/booking/{id}', [DosenController::class, 'booking']);
    Route::get('/dosen/load_booking_all/{tgl}/{kode_booking}', [DosenController::class, 'load_booking_all']);
    Route::get('/dosen/bookingsDetail/{kode_booking}', [DosenController::class, 'bookingsDetail']);
    Route::get('/dosen/load_log/{kode_mahasiswa}', [DosenController::class, 'load_log']);
});

//hak akses untuk dosen
Route::middleware(['dosen'])->group(function () {
    Route::post('/dashboard/insert_booking', [DashboardController::class, 'insert_booking']);
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/dashboardProfile', [DashboardController::class, 'dashboardProfile']);

    Route::get('/dashboard/load_booking/{tgl}', [DashboardController::class, 'load_booking']);
    Route::get('/dashboard/editProfile/{kode_booking}', [DashboardController::class, 'editProfile'])->name('dashboard');
    Route::post('/dashboard/delete_booking', [DashboardController::class, 'delete_booking']);
    Route::get('/dashboard/getID/{kode_booking}', [DashboardController::class, 'getID']);
    Route::post('/dashboard/update/{kode_booking}', [DashboardController::class, 'update']);
    Route::post('/dashboard/update_aktif/{id}', [DashboardController::class, 'update_aktif']);
    Route::post('/dashboard/update_non_aktif/{id}', [DashboardController::class, 'update_non_aktif']);

    Route::get('/calender/index/', [CalenderController::class, 'index'])->name('calender');
    Route::get('/calender/load_data/{kode_booking}', [CalenderController::class, 'load_data']);
    Route::get('/calender/load_booking/{kode_booking}', [CalenderController::class, 'load_booking']);
    // Route::get('/calender/load_jadwal/{start}/{dt}', [CalenderController::class, 'load_jadwal']);
    Route::post('/calender/insert_booking_detail', [CalenderController::class, 'insert_booking_detail']);

    Route::get('/calender/detail_booking/{kode_booking}/{kode_det_booking}', [CalenderController::class, 'detail_booking'])->name('calender_det');
    Route::post('/calender/insert_konfirm_booking', [CalenderController::class, 'insert_konfirm_booking']);
    Route::get('/calender/detail_confirm_booking/{kode_booking}/{kode_det_booking}', [CalenderController::class, 'detail_confirm_booking'])->name('calender_confirm');

    Route::get('/bookings/detail/{kode_booking}', [BookingsController::class, 'detail'])->name('bookings');
    Route::get('/bookings/question/{kode_booking}', [BookingsController::class, 'question']);
    Route::get('/bookings/load_question/{kode_booking}', [BookingsController::class, 'load_question']);
    Route::post('/bookings/insert_question', [BookingsController::class, 'insert_question']);
    Route::get('/bookings/update_question/{fn_id}', [BookingsController::class, 'update_question']);
    Route::post('/bookings/question_update', [BookingsController::class, 'question_update']);
    Route::get('/bookings/getID/{fn_id}', [BookingsController::class, 'getID']);
    Route::post('/bookings/delete_question', [BookingsController::class, 'delete_question']);


    Route::get('/bookings/load_booking_all/{tgl}/{kode_user}', [BookingsController::class, 'load_booking_all']);
    Route::get('/bookings/bookingsDetail/{kode_booking}', [BookingsController::class, 'bookingsDetail']);
    Route::get('/bookings/getID2/{id}', [BookingsController::class, 'getID2']);
    Route::post('/bookings/delete_detail_booking', [BookingsController::class, 'delete_detail_booking']);

    Route::get('/bookings/availability/', [BookingsController::class, 'availability'])->name('availability');
    Route::get('/bookings/after_booking/{kode_booking}', [BookingsController::class, 'after_booking'])->name('after_booking');
    Route::post('/bookings/after_booking_update', [BookingsController::class, 'after_booking_update']);
    Route::post('/bookings/update_sts_days', [BookingsController::class, 'update_sts_days']);
    Route::post('/bookings/update_break', [BookingsController::class, 'update_break']);

    Route::get('/bookings/duration', [BookingsController::class, 'duration'])->name('duration');
    Route::post('/bookings/update_duration', [BookingsController::class, 'update_duration']);

    Route::post('/calender/update_booking_tolak', [CalenderController::class, 'update_booking_tolak']);
    Route::post('/calender/update_booking_terima', [CalenderController::class, 'update_booking_terima']);

    Route::get('/bookings/notifikasi', [BookingsController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/bookings/link/{link}', [BookingsController::class, 'link'])->name('link');

    Route::post('/bookings/update_booking_tolak', [BookingsController::class, 'update_booking_tolak']);
    Route::post('/bookings/update_booking_terima', [BookingsController::class, 'update_booking_terima']);

    Route::get('/skripsi', 'SkripsiController@index')->name('skripsi');
    Route::get('/skripsi/skripsi_detail/{kode_mahasiswa}', [SkripsiController::class, 'skripsi_detail'])->name('skripsi_detail');
    Route::get('/skripsi/load_data_document/{kode_mahasiswa}', [SkripsiController::class, 'load_data_document']);
    Route::post('/skripsi/approve_bab1/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab1']);
    Route::post('/skripsi/tolak_bab1/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab1']);

    Route::post('/skripsi/approve_bab2/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab2']);
    Route::post('/skripsi/tolak_bab2/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab2']);

    Route::post('/skripsi/approve_bab3/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab3']);
    Route::post('/skripsi/tolak_bab3/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab3']);

    Route::post('/skripsi/finish_p0', [SkripsiController::class, 'finish_p0']);

    Route::post('/skripsi/approve_bab4/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab4']);
    Route::post('/skripsi/tolak_bab4/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab4']);

    Route::post('/skripsi/finish_p1', [SkripsiController::class, 'finish_p1']);

    Route::post('/skripsi/approve_bab5/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab5']);
    Route::post('/skripsi/tolak_bab5/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab5']);

    Route::post('/skripsi/approve_bab6/{id}/{kode_mahasiswa}', [SkripsiController::class, 'approve_bab6']);
    Route::post('/skripsi/tolak_bab6/{id}/{kode_mahasiswa}', [SkripsiController::class, 'tolak_bab6']);

    Route::post('/skripsi/finish_p2', [SkripsiController::class, 'finish_p2']);

});
