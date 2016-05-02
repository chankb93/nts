<?php
use Illuminate\Support\Facades\Input;
use App\NapfaDate;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::to('napfadates');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  //Route::auth();

  Route::resource('napfadates', 'NapfaDateController');
  Route::resource('schools', 'SchoolController');
  Route::resource('sysusers', 'SysUserController');
  Route::resource('moeages', 'MoeAgeController');
  Route::resource('mindefages', 'MindefAgeController');
  Route::resource('moecriterias', 'MoeCriteriaController');
  Route::resource('mindefcriterias', 'MindefCriteriaController');
  Route::resource('booktests', 'BookTestController');
  Route::resource('supports', 'SupportController');

  //Route::get('/home', 'HomeController@index');
});
