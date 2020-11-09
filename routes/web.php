<?php

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

//トップページ表示
Route::get('/', 'MainController@top');
//ログイン機能
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//ログイン機能（企業）
Route::prefix('company')->namespace('Company')->name('company.')->group(function(){
    Auth::routes();
    Route::get('/home', 'CompanyHomeController@index')->name('company_home');
});
//メインページ表示
Route::get('/main', 'MainController@main')->name('main');
//プロジェクト詳細画面表示
Route::get('/project/{id}', 'MainController@project')->name('project');
//新規プロジェクト投稿機能
Route::get('/newproject', 'MainController@newproject')->name('newproject');
//新規プロジェクト保存
Route::post('/post', 'MainController@storeNewproject')->name('storeNewproject');
//マイページ表示
Route::get('/mypage', 'MainController@showMypage')->name('showMypage');