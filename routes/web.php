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


Auth::routes();


Route::prefix('admin')->group(function() {

Route::get('home', 'admin\AdminController@index')->name('admin');
Route::get('home', 'admin\HomeController@index')->name('home');
Route::get('admin', 'admin\AdminController@index')->name('admin');

	//Graph ajax
Route::any('order-year', 'admin\HomeController@orderYearAjax')->name('orderYearAjax');
Route::any('purchase-year', 'admin\HomeController@purchaseYearAjax')->name('purchaseYearAjax');
Route::any('revenue-year', 'admin\HomeController@revenueYearAjax')->name('revenueYearAjax');

	
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.submit');	
    Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('admin.logout');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	

  
	Route::get('admin/add','admin\AdminController@addAdmin')->name('add.admin');
	Route::post('admin/store','admin\AdminController@storeAdmin')->name('store.admin');
	Route::get('admin/edit/{id}','admin\AdminController@editAdmin')->name('edit.admin');
	Route::post('admin/{id}','admin\AdminController@updateAdmin')->name('update.admin');
	Route::get('admin-destroy/{id}', 'admin\AdminController@adminDestroy')->name('destroy.admin');
	Route::post('admin-status', 'admin\AdminController@adminStatus')->name('status.admin');

	Route::get('category', 'admin\CategoryController@index')->name('category');
	Route::get('category/add','admin\CategoryController@addCategory')->name('add.category');
	Route::post('category/store','admin\CategoryController@storeCategory')->name('store.category');
	Route::get('category/edit/{id}','admin\CategoryController@editCategory')->name('edit.category');
	Route::post('category/{id}','admin\CategoryController@updateCategory')->name('update.category');
	Route::get('category-destroy/{id}', 'admin\CategoryController@categoryDestroy')->name('destroy.category');
	Route::post('category-status', 'admin\CategoryController@categoryStatus')->name('status.category');

	Route::get('product/bulkupload', 'admin\ProductController@bulkUpload')->name('bulk.upload');
	Route::post('product/storeblukupload', 'admin\ProductController@storeBulkUpload')->name('store.bulkupload');

	//Coupons
   Route::get('coupon-lists', 'admin\TestCouponController@couponlist')->name('coupon-lists');
    Route::get('add-coupon', 'admin\TestCouponController@addCoupon')->name('add.coupon');
    Route::post('save-coupon', 'admin\TestCouponController@saveCoupon')->name('save-coupon');
    Route::get('edit-coupon/{id}', 'admin\TestCouponController@editCoupon')->name('edit-coupon');
    Route::get('view-coupon/{id}', 'admin\TestCouponController@viewCoupon')->name('view-coupon');
    Route::post('save-edit-coupon/{id}', 'admin\TestCouponController@saveEditedCoupon')->name('save-edit-coupon');
 

    Route::get('coupon-destroy/{id}', 'admin\TestCouponController@couponDestroy')->name('destroy.coupon');
	Route::post('coupon-status', 'admin\TestCouponController@couponStatus')->name('status.coupon');
    Route::get('coupon/view/{id}', 'admin\TestCouponController@viewCoupon')->name('view.coupon');



	Route::get('banner', 'admin\BannerController@index')->name('banner');
	Route::get('banner/add','admin\BannerController@addBanner')->name('add.banner');
	Route::post('banner/store','admin\BannerController@storeBanner')->name('store.banner');
	Route::get('banner/edit/{id}','admin\BannerController@editBanner')->name('edit.banner');
	Route::post('banner/{id}','admin\BannerController@updateBanner')->name('update.banner');
	Route::get('banner-destroy/{id}', 'admin\BannerController@bannerDestroy')->name('destroy.banner');

	Route::get('discount-banner','admin\BannerController@editDiscountBanner')->name('edit.discountbanner');
	Route::post('discount-banner/{id}','admin\BannerController@updateDiscountBanner')->name('update.discountbanner');

	Route::get('brand', 'admin\BrandController@index')->name('brand');
	Route::get('brand/add','admin\BrandController@addBrand')->name('add.brand');
	Route::post('brand/store','admin\BrandController@storeBrand')->name('store.brand');
	Route::get('brand/edit/{id}','admin\BrandController@editBrand')->name('edit.brand');
	Route::post('brand/{id}','admin\BrandController@updateBrand')->name('update.brand');
	Route::get('brand-destroy/{id}', 'admin\BrandController@brandDestroy')->name('destroy.brand');
	Route::post('brand-status', 'admin\BrandController@brandStatus')->name('status.brand');

	Route::get('supplier', 'admin\SupplierController@index')->name('supplier');
	Route::get('supplier/add','admin\SupplierController@addSupplier')->name('add.supplier');
	Route::post('supplier/store','admin\SupplierController@storeSupplier')->name('store.supplier');
	Route::get('supplier/edit/{id}','admin\SupplierController@editSupplier')->name('edit.supplier');
	Route::post('supplier/{id}','admin\SupplierController@updateSupplier')->name('update.supplier');
	Route::get('supplier-destroy/{id}', 'admin\SupplierController@supplierDestroy')->name('destroy.supplier');
	Route::post('supplier-status', 'admin\SupplierController@supplierStatus')->name('status.supplier');

	Route::get('stock', 'admin\StockController@index')->name('stock');
	Route::get('stock/history/{product_id}/{size_id}','admin\StockController@history')->name('stock.history');

	Route::get('purchase', 'admin\PurchaseController@index')->name('purchase');
	Route::get('purchase/add','admin\PurchaseController@addPurchase')->name('add.purchase');
	Route::post('purchase/store','admin\PurchaseController@storePurchase')->name('store.purchase');
	Route::get('purchase/edit/{id}','admin\PurchaseController@editPurchase')->name('edit.purchase');
	Route::post('purchase/{id}','admin\PurchaseController@updatePurchase')->name('update.purchase');
	Route::get('purchase-destroy/{id}', 'admin\PurchaseController@purchaseDestroy')->name('destroy.purchase');
	Route::post('purchase-status', 'admin\PurchaseController@purchaseStatus')->name('status.purchase');
	Route::get('purchase/detail/{id}','admin\PurchaseController@purchaseDetail')->name('detail.purchase');
	Route::get('remove-purchase-product/{id}', 'admin\PurchaseController@removePurchaseProduct')->name('removepurchaseproduct');

	

	Route::get('size', 'admin\SizeController@index')->name('size');
	Route::get('size/add','admin\SizeController@addSize')->name('add.size');
	Route::post('size/store','admin\SizeController@storeSize')->name('store.size');
	Route::get('size/edit/{id}','admin\SizeController@editSize')->name('edit.size');
	Route::post('size/{id}','admin\SizeController@updateSize')->name('update.size');
	Route::get('size-destroy/{id}', 'admin\SizeController@sizeDestroy')->name('destroy.size');
	Route::post('size-status', 'admin\SizeController@sizeStatus')->name('status.size');

	Route::get('size-information', 'admin\SizeInformationController@index')->name('sizeinformation');
	Route::get('size-information/add','admin\SizeInformationController@addSizeInformation')->name('add.sizeinformation');
	Route::post('size-information/store','admin\SizeInformationController@storeSizeInformation')->name('store.sizeinformation');
	Route::get('size-information/edit/{id}','admin\SizeInformationController@editSizeInformation')->name('edit.sizeinformation');
	Route::post('size-information/{id}','admin\SizeInformationController@updateSizeInformation')->name('update.sizeinformation');
	Route::get('size-information-destroy/{id}', 'admin\SizeInformationController@sizeInformationDestroy')->name('destroy.sizeinformation');
	

	Route::get('color', 'admin\ColorController@index')->name('color');
	Route::get('color/add','admin\ColorController@addColor')->name('add.color');
	Route::post('color/store','admin\ColorController@storeColor')->name('store.color');
	Route::get('color/edit/{id}','admin\ColorController@editColor')->name('edit.color');
	Route::post('color/{id}','admin\ColorController@updateColor')->name('update.color');
	Route::get('color-destroy/{id}', 'admin\ColorController@colorDestroy')->name('destroy.color');
	Route::post('color-status', 'admin\ColorController@colorStatus')->name('status.color');

	Route::get('product', 'admin\ProductController@index')->name('product');
	Route::get('product/add','admin\ProductController@addProduct')->name('add.product');
	Route::post('product/store','admin\ProductController@storeProduct')->name('store.product');
	Route::get('product/edit/{id}','admin\ProductController@editProduct')->name('edit.product');
	Route::post('product/{id}','admin\ProductController@updateProduct')->name('update.product');
	Route::get('product-destroy/{id}', 'admin\ProductController@productDestroy')->name('destroy.product');
	Route::post('product-status', 'admin\ProductController@productStatus')->name('status.product');
	Route::get('remove-product-image/{id}', 'admin\ProductController@productImageDestroy')->name('removeproductimage');
	Route::get('product/view/{id}', 'admin\ProductController@viewProduct')->name('view.product');
	Route::get('product/print/{id}', 'admin\ProductController@printProduct')->name('print.product');
	Route::any('product/export', 'admin\ProductController@export')->name('export.product');

	Route::get('allProduct', 'admin\ProductController@allProduct')->name('allproduct');
	Route::get('allSize', 'admin\ProductController@allSize')->name('allsize');

	Route::get('customer', 'admin\CustomerController@index')->name('customer');
	Route::post('customer-status', 'admin\CustomerController@customerStatus')->name('status.customer');
	Route::post('customer/export', 'admin\CustomerController@export')->name('export.customer');
	Route::get('customer-destroy/{id}', 'admin\CustomerController@customerDestroy')->name('destroy.customer');

	Route::get('subscribers', 'admin\SubscriberController@index')->name('subscriber');
	Route::get('subscribers-destroy/{id}', 'admin\SubscriberController@subscribersDestroy')->name('destroy.subscribers');
	Route::get('subscriber/export', 'admin\SubscriberController@export')->name('export.subscriber');

	Route::get('testimonial', 'admin\TestimonialController@index')->name('testimonial');
	Route::get('testimonial/add','admin\TestimonialController@addTestimonial')->name('add.testimonial');
	Route::post('testimonial/store','admin\TestimonialController@storeTestimonial')->name('store.testimonial');
	Route::get('testimonial/edit/{id}','admin\TestimonialController@editTestimonial')->name('edit.testimonial');
	Route::post('testimonial/{id}','admin\TestimonialController@updateTestimonial')->name('update.testimonial');
	Route::get('testimonial-destroy/{id}', 'admin\TestimonialController@testimonialDestroy')->name('destroy.testimonial');

	Route::get('blog', 'admin\BlogController@index')->name('admin.blog');
	Route::get('blog/add','admin\BlogController@addBlog')->name('add.blog');
	Route::post('blog/store','admin\BlogController@storeBlog')->name('store.blog');
	Route::get('blog/edit/{id}','admin\BlogController@editBlog')->name('edit.blog');
	Route::get('blog_comment/view/{id}','admin\BlogController@viewBlogComment')->name('view.blog_comment');
	Route::get('blog-comment-destroy/{id}', 'admin\BlogController@blogCommentDestroy')->name('destroy.blog_comment');
	Route::post('blog/{id}','admin\BlogController@updateBlog')->name('update.blog');
	Route::get('blog-destroy/{id}', 'admin\BlogController@blogDestroy')->name('destroy.blog');


    Route::get('blog_category/index', 'admin\BlogController@blogCategoryindex')->name('admin.blog_category.index');
	Route::get('blog_category/add','admin\BlogController@addBlogCategory')->name('add.blog_category');
	Route::post('blog_category/store','admin\BlogController@storeBlogCategory')->name('store.blogCategory');
	Route::get('blog_category/edit/{id}','admin\BlogController@editBlogCategory')->name('edit.blog_category');
	Route::post('blog_category/{id}','admin\BlogController@updateBlogCategory')->name('update.blog_category');
	Route::get('blog_category-destroy/{id}', 'admin\BlogController@blogCategoryDestroy')->name('destroy.blog_category');

	//Contact us detail
	Route::get('contact_us_detail/index', 'admin\ContactUsController@contactUsDetailindex')->name('admin.contact_us_detail.index');
	Route::get('contact_us_detail/add','admin\ContactUsController@addContactUsDetail')->name('add.contact_us_detail');
	Route::post('contact_us_detail/store','admin\ContactUsController@storeContactUsDetail')->name('store.blogCategory');
	Route::get('contact_us_detail/edit/{id}','admin\ContactUsController@editContactUsDetail')->name('edit.contact_us_detail');
	Route::any('contact_us_detail/{id}','admin\ContactUsController@updateContactUsDetail')->name('update.contact_us_detail');
	Route::get('contact_us_detail-destroy/{id}', 'admin\ContactUsController@contactUsDetailDestroy')->name('destroy.contact_us_detail');
    //Contact us
    Route::get('contact_us/index', 'admin\ContactUsController@adminContactUs')->name('admin.contact_us.index');
    Route::get('contact_us-destroy/{id}', 'admin\ContactUsController@contactUsDestroy')->name('destroy.contact_us');

     //About us
	Route::get('aboutus','admin\AboutusController@editAboutus')->name('edit.aboutus');
	Route::post('aboutus/{id}','admin\AboutusController@updateAboutus')->name('update.aboutus');
	
	Route::get('page-lists', 'admin\PageController@index')->name('static-pages');
	Route::get('page-list/edit/{id}','admin\PageController@editPage')->name('edit.static-pages');
	Route::get('page-list/view/{id}','admin\PageController@viewPage')->name('view.static-pages');
	Route::post('page-list/{id}','admin\PageController@updatePage')->name('update.static-pages');
	Route::get('page-list-destroy/{id}', 'admin\PageController@pageDestroy')->name('destroy.static-pages');

	Route::get('forgotpassword', 'admin\AdminController@forgotpassword')->name('admin.forgotpassword');
	Route::post('forgotpassword', 'admin\AdminController@forgetPasswordEmail')->name('check.forgotpassword');
	Route::get('adminchangepassword', 'admin\AdminController@changePassword')->name('admin.changepassword');
	Route::post('adminupdatepassword/{id}', 'admin\AdminController@updatePassword')->name('admin.updatepassword');

	Route::get('shipping', 'admin\ShippingController@index')->name('shipping');
	Route::get('shipping/add','admin\ShippingController@addShipping')->name('add.shipping');
	Route::post('shipping/store','admin\ShippingController@storeShipping')->name('store.shipping');
	Route::get('shipping/edit/{id}','admin\ShippingController@editShipping')->name('edit.shipping');
	Route::post('shipping/{id}','admin\ShippingController@updateShipping')->name('update.shipping');
	Route::get('shipping-destroy/{id}', 'admin\ShippingController@shippingDestroy')->name('destroy.shipping');
	Route::post('shipping-status', 'admin\ShippingController@shippingStatus')->name('status.shipping');

	// admin side order route
    Route::get('order', 'admin\OrderController@orderIndex')->name('admin.order');
    Route::get('view-invoice/{id}', 'admin\OrderController@viewInvoice')->name('admin.viewInvoice');
    Route::get('order/edit/{id}','admin\OrderController@editOrder')->name('edit.order');
     Route::get('order/view/{id}','admin\OrderController@viewOrder')->name('view.order');
	Route::post('order/{id}','admin\OrderController@updateOrder')->name('update.order');
    Route::get('order-destroy/{id}', 'admin\OrderController@orderDestroy')->name('destroy.order');
    Route::get('refund-order/{id}', 'admin\OrderController@refundOrder')->name('refund.order');
    Route::post('order-status', 'admin\OrderController@orderStatus')->name('status.order');
    Route::any('order/export', 'admin\OrderController@export')->name('export.order');

});
Route::middleware('auth')->prefix('admin')->namespace('Admin')->group( function () {

Route::get('/', 'Admin\AdminController@index')->name('admin.home1'); 


});


////////////////////////////////////////////Fronted Route Start//////////////////////////////////////////////
//Basic form
Route::get('/404','HomeController@errors')->name('404');

Route::get('/logout', 'LoginController@logout');
Route::get('/home','HomeController@index')->name('home_1');

Route::post('/register', 'RegisterController@registerStore')->name('register.store');
Route::post('/checkemail', 'RegisterController@checkemail')->name('checkemail');
Route::post('/login', 'LoginController@userLogin')->name('userLogin');
Route::any('/forgetPasswordEmail','RegisterController@forgetPasswordEmail')->name('forgetPasswordEmail');
Route::get('/forgotpassword/{id}','RegisterController@forgotpassword')->name('forgot.password');
Route::post('/forgotpassword','RegisterController@forgotpasswordapi')->name('forgot.password.api');
Route::post('/change','RegisterController@forgotpasswordapiuser')->name('change.password');
Route::get('/passsword','RegisterController@updatepasswordview')->name('update.password.user');
//my account
Route::get('/my-account','OrderController@order')->name('myAccountPage');
Route::get('/update-profile','RegisterController@updateProfile')->name('updateProfile');
Route::get('/address-book','RegisterController@addressBook')->name('addressBook');
Route::any('/getCountryStateAddress','RegisterController@getCountryStateAddress')->name('getCountryStateAddress');
Route::POST('/delete-address/{address_id}','RegisterController@DeleteAddress')->name('delete.address');
Route::POST('/update-address/{address_id}','RegisterController@UpdateAddress')->name('update.address');
Route::get('/set_as-default-address/{address_id}','RegisterController@SetDefaultAddress')->name('set_as.default.address');




Route::any('/update-user-profile','RegisterController@updateUserProfile')->name('update.user.profile');
Route::post('/store-address','RegisterController@StoreAddress')->name('store.address');

Route::post('/customerSubcribe', 'RegisterController@customerSubcribeStore')->name('customerSubcribe.store');
Route::get('/blank','TestNewArrivalController@blank')->name('blank');
Route::get('/new-arrival-old','NewArrivalController@newArrival')->name('newArrival');
Route::get('/new-arrival','NewArrivalOldController@newArrival')->name('newArrival');
Route::get('/price-filter', 'TestNewArrivalController@PriceFilter')->name('price.filter');
Route::get('/colorbox', 'TestNewArrivalController@Colorbox') ;
Route::get('/sizebox', 'TestNewArrivalController@Sizebox') ;

//Badal 
Route::get('/product-detail-by-id/{id}', 'NewArrivalController@productDetailNew')->name('productDetailnew');
Route::get('/product-detail/{id}', 'ProductController@productDetail')->name('productDetail');

//Badal

Route::get('/new-arrival-pop-filter', 'TestNewArrivalController@newArrivalPopFilter')->name('newArrivalPopFilter');

Route::get('/product-detail-old/{id}', 'TestNewArrivalController@productDetail')->name('productDetailold');
Route::get('/product-detail-filter', 'TestNewArrivalController@productDetailFilter')->name('productDetailFilter');

/*trending page*/
Route::get('/trending','TrendingController@TrendingList')->name('trending');
Route::get('/common-filter', 'FilterController@CommonFilter')->name('common.filter');
Route::get('/count_div', 'FilterController@CountDiv')->name('count.div'); 

Route::get('/common-popup-filter', 'FilterController@CommonPopupFilter')->name('common.popup.filter');
Route::get('/clearall', 'FilterController@ClearallDiv')->name('clearall.div');
Route::get('/sorting', 'FilterController@Sorting')->name('sorting.div');

/*Kurties*/
Route::get('/kurties','KurtiesController@KurtiesList')->name('kurties');
/*Kurta-sets*/
Route::get('/kurta-sets','kurtasetsController@kurtasetsList')->name('kurta.sets');
/*Dresses*/ 
Route::get('/dresses','DressesController@DressesList')->name('dresses');


//basic page
Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');
Route::get('/contact-us', 'HomeController@contactUs')->name('contactUs');
Route::post('/contact-us-store', 'HomeController@contactUsStore')->name('contactUsStore');
Route::get('/blog', 'HomeController@blog')->name('blog');


Route::get('/affiliate', 'HomeController@affiliate')->name('affiliate');
Route::get('/how-to-order', 'HomeController@howToOrder')->name('howToOrder');
Route::get('/how-to-track', 'HomeController@howToTrack')->name('howToTrack');
Route::get('/privacy-policy', 'HomeController@PrivacyPolicy')->name('PrivacyPolicy');
Route::get('/return-policy', 'HomeController@returnPolicy')->name('returnPolicy');
Route::get('/term-and-condition', 'HomeController@termAndCondition')->name('termAndCondition');
Route::get('/size-guide', 'HomeController@sizeInformation')->name('sizeInformation');
Route::get('/shipping-info', 'HomeController@shippingInfo')->name('shippingInfo');


//Cart pages
Route::get('/cart', 'NewCartController@cartPage')->name('cartPage');
Route::any('/checkUserEmail', 'NewCartController@checkUserEmail')->name('checkUserEmail');
Route::get('/checkout-detail', 'NewCartController@checkoutDetail')->name('checkoutDetail');
//state
Route::any('/getCountryState', 'NewCartController@getCountryState')->name('getCountryState');
Route::any('/getCountryStatebilling', 'NewCartController@getCountryStatebilling')->name('getCountryStatebilling');
Route::post('/cartpage-quantity-update', 'NewCartController@cartPageQtyUpdate')->name('cartPageQtyUpdate');
Route::post('/checkout-update', 'NewCartController@updatecart')->name('updatecart');
Route::post('/checkout-saveorder', 'NewCartController@checkoutPlaceOrder')->name('checkoutPlaceOrder');
Route::get('/checkout-shipping', 'NewCartController@checkoutShipping')->name('checkoutShipping');
Route::get('/remove-product-from-cart/{id}', 'NewCartController@removeProduct')->name('removeproductfromcart');
Route::get('/remove-cart', 'NewCartController@removeCart')->name('removecart');
Route::get('/remove-product-from-checkout/{id}', 'NewCartController@removeProductFromCheckout')->name('removeproductfromcheckout');

//coupon
Route::post('/check-coupon', 'NewCartController@checkCoupon')->name('check-coupon');
Route::post('/remove-coupon', 'NewCartController@removeCoupon')->name('remove-coupon');

//wishlist
Route::get('/wishlist', 'WishlistController@wishlist')->name('wishlist');
//Pooja
Route::post('/product-details/addWishList','WishlistController@addToWishList')->name('addWishhList');
Route::post('/product-details/addToCart','NewCartController@addToCart')->name('addToCart');
Route::post('/product-details/addCartForGuestUser','NewCartController@addCartForGuestUser')->name('addCartForGuestUser');
Route::post('updateCartForGuestUser','NewCartController@updateCartForGuestUser')->name('updateCartForGuestUser');
Route::get('/product-details/hoverCart','WishlistController@hoverCart')->name('hoverCart');
Route::post('/product-details/removeCartData','WishlistController@removeCartData')->name('removeCartData');
Route::post('/product-details/removeWatchlistData','WishlistController@removeWatchlistData')->name('removeWatchlistData');

//Blog 
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blog-detail/{slug}','BlogController@blogDetail')->name('blogDetail');
Route::any('/blog-leave-reply','BlogController@blogLeaveReply')->name('blogLeaveReply');


//Order
Route::get('/order','OrderController@order')->name('order');
Route::get('/order-detail/{id}','OrderController@orderDetail')->name('orderDetail');
Route::get('/order-status/{id}','OrderController@orderStatus')->name('orderStatus');
Route::get('/order-invoice/{id}','OrderController@viewInvoice')->name('orderinvoice');

Route::get('/order-summary/{id}','NewCartController@orderSummary')->name('orderSummary');
////////////////////////////////////////////Fronted Route End//////////////////////////////////////////////


