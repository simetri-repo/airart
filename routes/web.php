<?php

use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerSatwa;
use App\Http\Controllers\ControllerShowing;
use App\Http\Controllers\ControllerSupport;
use App\Http\Controllers\ControllerUser;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('about_us', function () {
    return view('about_us');
});
Route::get('trah', [ControllerSupport::class, 'data_satwa']);
Route::get('/data_satwa_ras_jantan', [ControllerSupport::class, 'data_satwa_ras_jantan']);
Route::get('/data_satwa_ras_betina', [ControllerSupport::class, 'data_satwa_ras_betina']);
Route::get('/data_satwa_by_id', [ControllerSupport::class, 'data_satwa_by_id']);
Route::get('/data_awards_by_id', [ControllerSupport::class, 'data_awards_by_id']);

// datauser
Route::get('/adm_ext_data_user', [ControllerUser::class, 'data_user']);
Route::post('/adm_ext_add_user', [ControllerUser::class, 'add_user']);
Route::post('/adm_ext_edit_user/{id}', [ControllerUser::class, 'edit_user']);
Route::get('/adm_ext_delete_user/{id}', [ControllerUser::class, 'delete_user']);


// satwa

Route::get('/data_ras', [ControllerSatwa::class, 'data_ras']);
Route::post('/add_ras', [ControllerSatwa::class, 'add_ras']);
Route::post('/edit_ras/{id}', [ControllerSatwa::class, 'edit_ras']);
Route::get('/hapus_ras/{id}', [ControllerSatwa::class, 'hapus_ras']);
Route::get('data_award/{id}/{nama_satwa}', [ControllerSatwa::class, 'data_award']);
Route::post('add_award/{id}/{nama_satwa}', [ControllerSatwa::class, 'add_award']);
Route::get('delete_awards/{id}/{nama_satwa}/{id_awards}', [ControllerSatwa::class, 'delete_awards']);



// admin_ext
Route::get('adm_ext', function () {
    return view('adm_ext.index');
});

Route::get('adm_ext_home', [ControllerHome::class, 'adm_ext_home']);

// Route::get('adm_ext_data_satwa', function () {
//     return view('adm_ext.data_satwa');
// });
Route::get('/adm_ext_data_satwa', [ControllerSatwa::class, 'show_satwa']);
Route::post('/add_satwa', [ControllerSatwa::class, 'add_satwa']);
Route::post('/edit_satwa/{id}', [ControllerSatwa::class, 'edit_satwa']);
Route::get('/delete_satwa/{id}', [ControllerSatwa::class, 'delete_satwa']);



Route::get('showing', [ControllerSupport::class, 'data_showing']);

Route::get('show_contact', function () {
    return view('contact_us');
});

Route::post('Login', [ControllerLogin::class, 'Login']);
Route::get('Logout', [ControllerLogin::class, 'Logout']);


// showing

Route::get('/adm_ext_showing', [ControllerShowing::class, 'adm_ext_showing']);
Route::post('save_showing', [ControllerShowing::class, 'save_showing']);
Route::post('edit_showing/{id}', [ControllerShowing::class, 'edit_showing']);
Route::get('/hapus_showing/{id}', [ControllerShowing::class, 'hapus_showing']);
