<?php
//front-end start/search_by_cate_amount

Route::get('/', 'Front_end\PublicHomeController@index');
Route::get('categories', 'Front_end\PublicHomeController@categories');
Route::get('products/{id}', 'Front_end\PublicHomeController@products');
Route::get('product_details/{id}', 'Front_end\PublicHomeController@product_details');
Route::get('search_by_cate_amount', 'Front_end\PublicHomeController@search_by_cate_amount');
Route::post('search_by_name', 'Front_end\PublicHomeController@search_by_name');
Route::get('privacy_policy', 'Front_end\PublicHomeController@privacy_policy');
Route::get('terms_of_use', 'Front_end\PublicHomeController@terms_of_use');
Route::get('marchants', 'Front_end\PublicHomeController@marchants');

//front-end finished

Route::get('/login', function () {
    //return view('welcome');
    if(Auth::check())
    {
    	//return redirect('/home');
    	return redirect('/admin/home');
	}
	else{
		return redirect('/login');
	}
});

Route::get('bican_create_role','bicanController@create_role');

Route::auth();

Route::group(['middleware' => 'web'], function () {
	Route::get('/home', 'HomeController@index');
});

Route::group(['namespace' => 'Admin'], function () {

	Route::get('/admin/home', 'AdminController@index');
	
	Route::get('admin/add_user', 'UserController@add_user');
	Route::post('admin/save_user', 'UserController@save_user');
	Route::get('admin/all_user', 'UserController@all_user');
	Route::get('admin/remove_user/{id}', 'UserController@remove_user');
	Route::post('admin/fetch_edit_info', 'UserController@fetch_edit_info');
	Route::post('admin/edit_user', 'UserController@edit_user');
	Route::post('admin/change_password', 'UserController@change_password');
	Route::get('admin/merchants', 'UserController@merchants');

	Route::resource('admin/product_category', 'ProductCategoryController');

	Route::resource('admin/product', 'ProductController');
	Route::post('admin/search_product', 'ProductController@search_product');

	Route::resource('admin/discount', 'DiscountController');
	Route::get('admin/discount_product', 'DiscountController@discount_product');
	Route::post('admin/edit_product_discount', 'DiscountController@edit_product_discount');
	Route::post('admin/assign_discount', 'DiscountController@assign_discount');
});
