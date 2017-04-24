<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['middleware' => ['web']], function () {
    /*Route::get('/', 'Home\IndexController@index');*/
    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
});


Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('index','IndexController@index');
    Route::any('adminlist','IndexController@adminList');
    Route::any('admincreate','IndexController@adminCreate');
    Route::any('adminstore','IndexController@store');

    Route::any('pass/{user_id}','IndexController@pass');
    Route::any('delete/{user_id}','IndexController@delete');
    Route::get('quit','LoginController@quit');
    
    Route::any('index/upload','CommonController@upload');       //图片上传
    
    Route::get('index/picture','HomePageController@index');
    Route::get('index/addimg','HomePageController@add');
    Route::post('index/create','HomePageController@create');
    Route::get('index/show','HomePageController@show');
    Route::post('index/delete/{id}','HomePageController@destroy');
    Route::get('index/showimg','HomePageController@showImage');
    Route::post('index/edittype/{id}','HomePageController@editType');

    Route::resource('link','LinkController');
    Route::resource('news','NewsController');
    Route::resource('laws','LawsController');
    Route::resource('bc','BCController');
    Route::resource('bus','BusinessController');
    Route::resource('sc','SuccessfulCaseController');
    Route::resource('tp','TeamProfileController');
    Route::get('tp/member/{id}','TeamProfileController@member');
    Route::post('tp/edit/{id}','TeamProfileController@edit');

    Route::post('laws/edit/{id}','LawsController@edit');
    Route::post('bus/edit/{id}','BusinessController@edit');
    Route::post('bc/edit/{id}','BCController@edit');
    Route::post('sc/edit/{id}','SuccessfulCaseController@edit');

    Route::get('cp/index','CompanyProfileController@index');
    Route::post('cp/edit','CompanyProfileController@edit');

    Route::get('contact/index','ContactController@index');
    Route::post('contact/edit','ContactController@edit');
});

Route::group(['middleware' => ['web','enterprise'],'prefix'=>'enterprise','namespace'=>'Enterprise'], function () {
    Route::any('index','EnterpriseController@index');
    Route::any('news','EnterpriseController@news');
    Route::get('news/{id}/count/{i}','EnterpriseController@newsDetails');
    Route::any('laws','EnterpriseController@laws');
    Route::get('laws/{id}/count/{i}','EnterpriseController@lawsDetails');
    Route::any('successful','EnterpriseController@successful');
    Route::get('successful/{id}','EnterpriseController@successfulDetails');
    Route::any('company','EnterpriseController@company');
    Route::any('contact','EnterpriseController@contact');
    Route::any('about','EnterpriseController@about');
    Route::any('about/{id}','EnterpriseController@aboutDetails');
    Route::any('about','EnterpriseController@about');
    Route::any('business','EnterpriseController@business');
    Route::any('business/{id}','EnterpriseController@businessDetails');
});


