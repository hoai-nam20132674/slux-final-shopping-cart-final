<?php

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

Route::get('/',['as'=>'home','uses'=>'viewController@index']);
Route::get('/cau-chuyen-slux.html', function () {
    return view('frontEndUser.slux-talk');
});
Route::get('/tin-tuc.html', function(){
	return view('frontEndUser.blog');
});
Route::get('/lien-he.html', function(){
	return view('frontEndUser.contact');
});
Route::get('/linh-phu-kien.html', function(){
	return view('frontEndUser.list-product');
});
Route::get('/view-product-item.html', function(){
	return view('frontEndUser.view-product-item');
});

Route::get('gio-hang',function(){
	return view ('frontEndUser.cart');
});
Route::get('/{url}',['as'=>'{url}','uses'=>'viewController@viewContentPageCategorie']);

Route::get('/getParentCategorie/{id}','viewController@getIdCategorieParent');
Route::get('/getIdCategorieChildren/{id}','viewController@getIdCategorieChildren');
Route::get('/getProductCategorie/{id}','viewController@getProductCategorie');

Route::get('add-to-cart/{url}',['as'=>'add-to-cart','uses'=>'viewController@addToCart']);
Route::get('shopping-cart/gio-hang',['as'=>'getCart','uses'=>'viewController@getCart']);
Route::get('update-cart-add-item/{id}',['as'=>'updateCartAddItem','uses'=>'viewController@updateCartAddItem']);
Route::get('update-cart-remove-item/{id}/{quantity}',['as'=>'updateCartRemoveItem','uses'=>'viewController@updateCartRemoveItem']);
Route::get('remove-item/{id}',['as'=>'removeItem','uses'=>'viewController@removeItem']);
Route::get('support-view-product/{id}',['as'=>'support-view-product','uses'=>'viewController@supportViewProduct']);
Route::get('support-view-blog/{id}',['as'=>'support-view-blog','uses'=>'viewController@supportViewBlog']);
Route::post('postAddOrder',['as'=>'postAddOrder','uses'=>'viewController@postAddOrder']);
Route::get('check/info',['as'=>'check','uses'=>'viewController@check']);
Route::post('postCheckInfo',['as'=>'postCheckInfo','uses'=>'viewController@postCheckInfo']);
Route::get('check/info/{phone_number}',['as'=>'checkInfoItem','uses'=>'viewController@checkInfoItem']);
Route::post('postAddCustumerRegisterN',['as'=>'postAddCustumerRegisterN','uses'=>'viewController@postAddCustumerRegisterN']);
Route::post('postAddCustumerRegisterV',['as'=>'postAddCustumerRegisterV','uses'=>'viewController@postAddCustumerRegisterV']);

Route::get('/login/admin-master', ['as'=>'getLogin','uses'=>'Auth\AuthController@getLogin']);
Route::post('/postLogin', 'Auth\AuthController@postLogin');
Route::get('/logout/admin-master', ['as'=>'getLogout','uses'=>'Auth\AuthController@logout']);
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
	Route::get('index',['as'=>'index','uses'=>'adminController@index']);
	Route::get('getListCategories',['as'=>'getListCategories','uses'=>'adminController@getListCategories']);
	Route::get('addCategorie',['as'=>'addCategorie','uses'=>'adminController@addCategorie']);
	Route::post('postAddCategorie',['as'=>'postAddCategorie','uses'=>'adminController@postAddCategorie']);
	Route::get('editCategorie/{id}/{parent_id}',['as'=>'editCategorie','uses'=>'adminController@editCategorie']);
	Route::post('postEditCategorie/{id}',['as'=>'postEditCategorie','uses'=>'adminController@postEditCategorie']);
	Route::get('deleteCategorie/{id}/{parent_id}',['as'=>'deleteCategorie','uses'=>'adminController@deleteCategorie']);

	Route::get('getListBlogs',['as'=>'getListBlogs','uses'=>'adminController@getListBlogs']);
	Route::get('addBlog',['as'=>'addBlog','uses'=>'adminController@addBlog']);
	Route::post('postAddBlog',['as'=>'postAddBlog','uses'=>'adminController@postAddBlog']);
	Route::get('editBlog/{id}/{categorie_id}',['as'=>'editBlog','uses'=>'adminController@editBlog']);
	Route::post('postEditBlog/{id}',['as'=>'postEditBlog','uses'=>'adminController@postEditBlog']);
	Route::get('deleteBlog/{id}',['as'=>'deleteBlog','uses'=>'adminController@deleteBlog']);

	Route::get('getListProducts',['as'=>'getListProducts','uses'=>'adminController@getListProducts']);
	Route::get('addProduct',['as'=>'addProduct','uses'=>'adminController@addProduct']);
	Route::post('postAddProduct',['as'=>'postAddProduct','uses'=>'adminController@postAddProduct']);
	Route::get('editProduct/{id}/{categorie_id}',['as'=>'editProduct','uses'=>'adminController@editProduct']);
	Route::post('postEditProduct/{id}',['as'=>'postEditProduct','uses'=>'adminController@postEditProduct']);
	Route::get('deleteProduct/{id}',['as'=>'deleteProduct','uses'=>'adminController@deleteProduct']);

	Route::get('getListProductsRepair',['as'=>'getListProductsRepair','uses'=>'adminController@getListProductsRepair']);
	Route::get('addProductRepair',['as'=>'addProductRepair','uses'=>'adminController@addProductRepair']);
	Route::post('postAddProductRepair',['as'=>'postAddProductRepair','uses'=>'adminController@postAddProductRepair']);
	Route::get('editProductRepair/{id}',['as'=>'editProductRepair','uses'=>'adminController@editProductRepair']);
	Route::post('postEditProductRepair/{id}',['as'=>'postEditProductRepair','uses'=>'adminController@postEditProductRepair']);
	Route::get('deleteProductRepair/{id}',['as'=>'deleteProductRepair','uses'=>'adminController@deleteProductRepair']);

	Route::get('getListCustumerRegister',['as'=>'getListCustumerRegister','uses'=>'adminController@getListCustumerRegister']);

	Route::get('getListOrders',['as'=>'getListOrders','uses'=>'adminController@getListOrders']);
	Route::get('deleteOrder/{id}',['as'=>'deleteOrder','uses'=>'adminController@deleteOrder']);

	Route::get('systems-information',['as'=>'editSystems','uses'=>'adminController@editSystems']);
	Route::post('postEditSystems',['as'=>'postEditSystems','uses'=>'adminController@postEditSystems']);

	Route::get('review/{id}',['as'=>'review','uses'=>'adminController@review']);
	Route::get('unreview/{id}',['as'=>'unreview','uses'=>'adminController@unreview']);


	Route::get('editMenu',['as'=>'editMenu','uses'=>'adminController@editMenu']);
	Route::post('postEditMenuHeader',['as'=>'postEditMenuHeader','uses'=>'adminController@postEditMenuHeader']);
	Route::post('postEditMenuFooter',['as'=>'postEditMenuFooter','uses'=>'adminController@postEditMenuFooter']);
	Route::post('postEditMenuSidebar',['as'=>'postEditMenuSidebar','uses'=>'adminController@postEditMenuSidebar']);

	Route::get('getListNokiaError',['as'=>'getListNokiaError','uses'=>'adminController@getListNokiaError']);
	Route::get('deleteNokiaError/{id}',['as'=>'deleteNokiaError','uses'=>'adminController@deleteNokiaError']);
	Route::get('editNokiaError/{id}',['as'=>'editNokiaError','uses'=>'adminController@editNokiaError']);
	Route::post('postEditNokiaError/{id}',['as'=>'postEditNokiaError','uses'=>'adminController@postEditNokiaError']);
	Route::get('addNokiaError',['as'=>'addNokiaError','uses'=>'adminController@addNokiaError']);
	Route::post('postAddNokiaError',['as'=>'postAddNokiaError','uses'=>'adminController@postAddNokiaError']);

	Route::get('getListVertuError',['as'=>'getListVertuError','uses'=>'adminController@getListVertuError']);
	Route::get('deleteVertuError/{id}',['as'=>'deleteVertuError','uses'=>'adminController@deleteVertuError']);
	Route::get('editVertuError/{id}',['as'=>'editVertuError','uses'=>'adminController@editVertuError']);
	Route::post('postEditVertuError/{id}',['as'=>'postEditVertuError','uses'=>'adminController@postEditVertuError']);
	Route::get('addVertuError',['as'=>'addVertuError','uses'=>'adminController@addVertuError']);
	Route::post('postAddVertuError',['as'=>'postAddVertuError','uses'=>'adminController@postAddVertuError']);


	Route::get('getListUser',['as'=>'getListUser','uses'=>'adminController@getListUser']);
	Route::get('addUser',['as'=>'addUser','uses'=>'adminController@addUser']);
	Route::post('postAddUser',['as'=>'postAddUser','uses'=>'adminController@postAddUser']);
	Route::get('editUser/{id}',['as'=>'editUser','uses'=>'adminController@editUser']);
	Route::post('postEditUser/{id}',['as'=>'postEditUser','uses'=>'adminController@postEditUser']);

	Route::get('addSlide',['as'=>'addSlide','uses'=>'adminController@addSlide']);
	Route::post('postAddSlide',['as'=>'postAddSlide','uses'=>'adminController@postAddSlide']);
	Route::get('getListSlideHeader',['as'=>'getListSlideHeader','uses'=>'adminController@getListSlideHeader']);
	Route::get('editSlide/{id}',['as'=>'editSlide','uses'=>'adminController@editSlide']);
	Route::post('postEditSlide/{id}',['as'=>'postEditSlide','uses'=>'adminController@postEditSlide']);
	Route::get('enable-product/{id}',['as'=>'enable-product','uses'=>'adminController@enableProduct']);
	Route::get('disable-product/{id}',['as'=>'disable-product','uses'=>'adminController@disableProduct']);
	Route::get('enable-blog/{id}',['as'=>'enable-blog','uses'=>'adminController@enableBlog']);
	Route::get('disable-blog/{id}',['as'=>'disable-blog','uses'=>'adminController@disableBlog']);
});