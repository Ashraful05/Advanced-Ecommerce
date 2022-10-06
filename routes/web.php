<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[\App\Http\Controllers\AdminController::class,'loginForm']);
    Route::post('/login',[\App\Http\Controllers\AdminController::class,'store'])->name('admin.login');

});

Route::middleware(['auth:admin'])->group(function(){

    Route::middleware([
        'auth:sanctum,admin',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard')->middleware('auth:admin');
    });

    Route::get('/admin/logout',[\App\Http\Controllers\AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[\App\Http\Controllers\Backend\AdminProfileController::class,'profileInfo'])->name('admin.profile');
    Route::get('/admin/profile/edit',[\App\Http\Controllers\Backend\AdminProfileController::class,'editProfileInfo'])->name('admin.profile.edit');
    Route::post('/admin/profile/update',[\App\Http\Controllers\Backend\AdminProfileController::class,'updateProfileInfo'])->name('admin.profile.update');
    Route::get('/admin/change/password',[\App\Http\Controllers\Backend\AdminProfileController::class,'changeAdminPassword'])->name('admin.password.change');
    Route::post('/admin/update/password',[\App\Http\Controllers\Backend\AdminProfileController::class,'updateAdminPassword'])->name('admin.password.update');

//Brands route....
    Route::prefix('brand')->group(function(){
        Route::get('/all',[\App\Http\Controllers\Backend\BrandController::class,'allBrand'])->name('all-brand');
        Route::post('/save',[\App\Http\Controllers\Backend\BrandController::class,'saveBrand'])->name('save-brand');
        Route::get('/edit/{id}',[\App\Http\Controllers\Backend\BrandController::class,'editBrand'])->name('edit-brand');
        Route::post('/update/{id?}',[\App\Http\Controllers\Backend\BrandController::class,'updateBrand'])->name('update-brand');
        Route::get('/delete/{id}',[\App\Http\Controllers\Backend\BrandController::class,'deleteBrand'])->name('delete-brand');
    });
//Category Route...
    Route::prefix('category')->group(function(){
        Route::get('/all-category',[\App\Http\Controllers\backend\CategoryController::class,'allCateogry'])->name('all-category');
        Route::post('/save',[\App\Http\Controllers\backend\CategoryController::class,'saveCateogry'])->name('save-category');
        Route::get('/edit/{id}',[\App\Http\Controllers\backend\CategoryController::class,'editCateogry'])->name('edit-category');
        Route::post('/update/{id}',[\App\Http\Controllers\backend\CategoryController::class,'updateCategory'])->name('update-category');
        Route::get('/delete/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'deleteCategory'])->name('delete-category');

        //SubCategory route...
        Route::get('/all-subcategory',[\App\Http\Controllers\Backend\SubCategoryController::class,'allSubCategory'])->name('all-subcategory');
        Route::post('/save-subcategory',[\App\Http\Controllers\Backend\SubCategoryController::class,'saveSubCategory'])->name('save-subcategory');
        Route::get('/edit-subcategory/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'editSubCategory'])->name('edit-subcategory');
        Route::post('/update-subcategory',[\App\Http\Controllers\Backend\SubCategoryController::class,'updateSubCategory'])->name('update-subcategory');
        Route::get('/delete-subcategory/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'deleteSubCategory'])->name('delete-subcategory');

        //SubSubCategory route...
        Route::get('/all-sub-subcategory',[\App\Http\Controllers\Backend\SubCategoryController::class,'allSubSubCategory'])->name('all-subsubcategory');
        Route::get('/subcategory/ajax/{category_id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'getSubCategory']);
        Route::get('/sub-subcategory/ajax/{subcategory_id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'getSubSubCategory']);
        Route::post('/save-sub-subcategory',[\App\Http\Controllers\Backend\SubCategoryController::class,'saveSubSubCategory'])->name('save-sub-subcategory');
        Route::get('/edit-sub-subcategory/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'editSubSubCategory'])->name('edit-sub-subcategory');
        Route::post('/update-sub-subcategory/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'updateSubSubCategory'])->name('update-sub-subcategory');
        Route::get('/delete-sub-subcategory/{id}',[\App\Http\Controllers\Backend\SubCategoryController::class,'deleteSubSubCategory'])->name('delete-sub-subcategory');
    });
//Product route is here......
    Route::prefix('product')->group(function(){
        Route::get('/add',[\App\Http\Controllers\Backend\ProductController::class,'addProduct'])->name('add-product');
        Route::get('/manage',[\App\Http\Controllers\Backend\ProductController::class,'manageProduct'])->name('manage-product');
        Route::post('/save',[\App\Http\Controllers\Backend\ProductController::class,'saveProduct'])->name('save-product');
        Route::get('/edit/{id}',[\App\Http\Controllers\Backend\ProductController::class,'editProduct'])->name('edit-product');
        Route::post('/update/{id}',[\App\Http\Controllers\Backend\ProductController::class,'updateProduct'])->name('update-product');
        Route::post('/update-product-image',[\App\Http\Controllers\Backend\ProductController::class,'updateProductMultiImage'])->name('update-product-image');
        Route::post('/update-product-thumbnail-image/{id}',[\App\Http\Controllers\Backend\ProductController::class,'updateProductThumbnailImage'])->name('update-product-thumbnail-image');
        Route::get('/product-multiimage-delete/{id}',[\App\Http\Controllers\Backend\ProductController::class,'multiImageDelete'])->name('product-multiimage-delete');
        Route::get('/details-product/{id}',[\App\Http\Controllers\Backend\ProductController::class,'detailsProduct'])->name('details-product');
        Route::get('/inactive-product/{id}',[\App\Http\Controllers\Backend\ProductController::class,'inActiveProduct'])->name('inactive-product');
        Route::get('/active-product/{id}',[\App\Http\Controllers\Backend\ProductController::class,'activeProduct'])->name('active-product');
        Route::get('/delete/{id}',[\App\Http\Controllers\Backend\ProductController::class,'deleteProduct'])->name('delete-product');
    });
//Slider route...
    Route::prefix('slider')->group(function(){
        Route::get('manage-slider',[\App\Http\Controllers\Backend\SliderController::class,'manageSlider'])->name('manage-slider');
        Route::post('save-slider',[\App\Http\Controllers\Backend\SliderController::class,'saveSlider'])->name('save-slider');
        Route::get('edit-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'editSlider'])->name('edit-slider');
        Route::post('update-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'updateSlider'])->name('update-slider');
        Route::get('active-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'activeSlider'])->name('active-slider');
        Route::get('inactive-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'inActiveSlider'])->name('inactive-slider');
        Route::get('edit-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'editSlider'])->name('edit-slider');
        Route::get('delete-slider/{id}',[\App\Http\Controllers\Backend\SliderController::class,'deleteSlider'])->name('delete-slider');
    });
    //coupon route...
    Route::prefix('coupons')->group(function(){
        Route::get('manage-coupon',[\App\Http\Controllers\Backend\CouponController::class,'viewCoupon'])->name('manage-coupon');
        Route::post('save-coupon',[\App\Http\Controllers\Backend\CouponController::class,'saveCoupon'])->name('save-coupon');
        Route::get('edit-coupon/{id}',[\App\Http\Controllers\Backend\CouponController::class,'editCoupon'])->name('edit-coupon');
        Route::post('update-coupon/{id}',[\App\Http\Controllers\Backend\CouponController::class,'updateCoupon'])->name('update-coupon');
        Route::get('delete-coupon/{id}',[\App\Http\Controllers\Backend\CouponController::class,'deleteCoupon'])->name('delete-coupon');
    });
    //shipping route...
    Route::prefix('shipping')->group(function(){
        //shipping division route....
        Route::get('manage/division',[\App\Http\Controllers\Backend\ShippingAreaController::class,'manageDivision'])->name('manage-division');
        Route::post('save/division',[\App\Http\Controllers\Backend\ShippingAreaController::class,'saveDivision'])->name('save-division');
        Route::get('edit/division/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'editDivision'])->name('edit-division');
        Route::post('update/division/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'updateDivision'])->name('update-division');
        Route::get('delete/division/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'deleteDivision'])->name('delete-division');

        //shipping district route...
        Route::get('manage/district',[\App\Http\Controllers\Backend\ShippingAreaController::class,'manageDistrict'])->name('manage-district');
        Route::post('save/district',[\App\Http\Controllers\Backend\ShippingAreaController::class,'saveDistrict'])->name('save-district');
        Route::get('edit/district/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'editDistrict'])->name('edit-district');
        Route::post('update/district/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'updateDistrict'])->name('update-district');
        Route::get('delete/district/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'deleteDistrict'])->name('delete-district');

        //shipping area route...
        Route::get('manage-area',[\App\Http\Controllers\Backend\ShippingAreaController::class,'manageArea'])->name('manage-area');
        Route::post('save-area',[\App\Http\Controllers\Backend\ShippingAreaController::class,'saveArea'])->name('save-area');
        Route::get('edit-area/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'editArea'])->name('edit-area');
        Route::post('update-area/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'updateArea'])->name('update-area');
        Route::get('delete-area/{id}',[\App\Http\Controllers\Backend\ShippingAreaController::class,'deleteArea'])->name('delete-area');
    });

    //orders route....
    Route::prefix('orders')->group(function(){
        Route::get('pending/orders',[\App\Http\Controllers\Backend\OrderController::class,'pendingOrders'])->name('pending-orders');
        Route::get('pending/order/details/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'pendingOrderDetails'])->name('pending-order-details');
        Route::get('confirm/orders',[\App\Http\Controllers\Backend\OrderController::class,'confirmedOrders'])->name('confirmed-orders');
        Route::get('processing/orders',[\App\Http\Controllers\Backend\OrderController::class,'processingOrders'])->name('processing-orders');
        Route::get('picked/orders',[\App\Http\Controllers\Backend\OrderController::class,'pickedOrders'])->name('picked-orders');
        Route::get('shipped/orders',[\App\Http\Controllers\Backend\OrderController::class,'shippedOrders'])->name('shipped-orders');
        Route::get('delivered/orders',[\App\Http\Controllers\Backend\OrderController::class,'deliveredOrders'])->name('delivered-orders');
        Route::get('cancel/orders',[\App\Http\Controllers\Backend\OrderController::class,'cancelOrders'])->name('cancel-orders');
        Route::get('delete/order/{id}',[\App\Http\Controllers\Backend\OrderController::class,'deleteOrder'])->name('delete-order');

        //update status....
        Route::get('pending/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'pendingToConfirm'])->name('pending-confirm');
        Route::get('process/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'confirmToProcess'])->name('process-confirm');
        Route::get('picked/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'processToPicked'])->name('process-picked');
        Route::get('shipped/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'pickedToShipped'])->name('shipped-order');
        Route::get('deliver/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'shipToDeliver'])->name('deliver-order');
        Route::get('cancel/confirm/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'deliverToCancel'])->name('cancel-order');
        Route::get('invoice/download/{order_id}',[\App\Http\Controllers\Backend\OrderController::class,'adminInvoiceDownload'])->name('invoice-download');

    });
    Route::prefix('reports')->group(function(){
        Route::get('all',[\App\Http\Controllers\Backend\ReportsController::class,'allReports'])->name('all-reports');
        Route::post('search/by/date',[\App\Http\Controllers\Backend\ReportsController::class,'reportByDate'])->name('search-by-date');
        Route::post('search/by/month',[\App\Http\Controllers\Backend\ReportsController::class,'reportByMonth'])->name('search-by-month');
        Route::post('search/by/year',[\App\Http\Controllers\Backend\ReportsController::class,'reportByYear'])->name('search-by-year');
    });
    Route::prefix('all-user')->group(function(){
        Route::get('view',[\App\Http\Controllers\Backend\AdminProfileController::class,'allUsers'])->name('all-users');
    });
    Route::prefix('blog')->group(function(){
        Route::get('category',[\App\Http\Controllers\Backend\BlogController::class,'blogCategory'])->name('blog.category');
        Route::post('save/post/category',[\App\Http\Controllers\Backend\BlogController::class,'saveBlogPostCategory'])->name('save.blogpost.category');
        Route::get('edit/post/category/{id}',[\App\Http\Controllers\Backend\BlogController::class,'editBlogPostCategory'])->name('edit.blogpost.category');
        Route::post('udpate/post/category/{id}',[\App\Http\Controllers\Backend\BlogController::class,'updateBlogPostCategory'])->name('update.blogpost.category');
        Route::get('delete/post/category/{id}',[\App\Http\Controllers\Backend\BlogController::class,'deleteBlogPostCategory'])->name('delete.blogpost.category');

        Route::get('add/post',[\App\Http\Controllers\Backend\BlogController::class,'addBlogPost'])->name('add.blog.post');
        Route::post('save/post',[\App\Http\Controllers\Backend\BlogController::class,'saveBlogPost'])->name('save.blog.post');
        Route::get('view/post',[\App\Http\Controllers\Backend\BlogController::class,'viewBlogPost'])->name('view.blog.post');
        Route::get('edit/post/{id}',[\App\Http\Controllers\Backend\BlogController::class,'editBlogPost'])->name('edit.blog.post');
        Route::post('update/post/{id}',[\App\Http\Controllers\Backend\BlogController::class,'updateBlogPost'])->name('update.blog.post');
        Route::get('delete/post/{id}',[\App\Http\Controllers\Backend\BlogController::class,'deleteBlogPost'])->name('delete.blog.post');
    });

});

//user all route...
Route::middleware([
    'auth:sanctum,web', 'verified'
])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/',[\App\Http\Controllers\frontend\IndexController::class,'index'])->name('index');
Route::get('/user-logout',[\App\Http\Controllers\frontend\IndexController::class,'userLogout'])->name('user.logout');
Route::get('/user-profile',[\App\Http\Controllers\frontend\IndexController::class,'userProfile'])->name('user.profile');
Route::post('/user-profile-update',[\App\Http\Controllers\frontend\IndexController::class,'userProfileUpdate'])->name('user.profile.store');
Route::get('/user-password-change',[\App\Http\Controllers\frontend\IndexController::class,'changePassword'])->name('change.password');
Route::post('/user-password-update',[\App\Http\Controllers\frontend\IndexController::class,'updatePassword'])->name('user-password-update');


//Frontend all routes.........
//multi-language all routes......
Route::get('language/english',[\App\Http\Controllers\Frontend\LanguageController::class,'englishLanguage'])->name('english.language');
Route::get('language/bangla',[\App\Http\Controllers\Frontend\LanguageController::class,'banglaLanguage'])->name('bangla.language');

//Frontend product details url........
Route::get('product-details/{id}/{slug}',[\App\Http\Controllers\frontend\IndexController::class,'productDetails']);

//Frontend product tags page......
Route::get('product/tag/{tag}',[\App\Http\Controllers\frontend\IndexController::class,'tagWiseProduct']);
Route::get('subcategory-product/{subcategory_id}/{slug}',[\App\Http\Controllers\frontend\IndexController::class,'subCategoryWiseProduct']);
Route::get('subsubcategory-product/{sub_subcategory_id}/{slug}',[\App\Http\Controllers\frontend\IndexController::class,'subSubCategoryWiseProduct']);

//product view modal with ajax...
Route::get('/product-view-modal/{id}',[\App\Http\Controllers\frontend\IndexController::class,'productViewAjax']);

//Cart Controller routes.........
Route::post('cart/data/store/{id}',[\App\Http\Controllers\frontend\CartController::class,'addToCart']);

//Get data from mini cart......
Route::get('/product-mini-cart',[\App\Http\Controllers\frontend\CartController::class,'addMiniCart']);

//Remove minicart...
Route::get('/minicart-product-remove/{rowId}',[\App\Http\Controllers\frontend\CartController::class,'removeMiniCart']);

//add to wishlist route...
Route::post('/add-to-wishlist/{product_id}',[\App\Http\Controllers\frontend\CartController::class,'addToWishlist']);


Route::group(['prefix'=>'user', 'middleware'=>['user','auth'], 'namespace'=>'User'],function(){
    //load wishlist page route...
    Route::get('view/wishlist',[\App\Http\Controllers\User\WishlistController::class,'viewWishList'])->name('view-wishlist');
    Route::get('get-wishlist-product',[\App\Http\Controllers\User\WishlistController::class,'getWishlistProduct']);
    Route::get('wishlist-remove/{id}',[\App\Http\Controllers\User\WishlistController::class,'removeWishlistProduct'])->name('wishlist-remove');
    Route::post('stripe/order',[\App\Http\Controllers\User\StripeController::class,'stripeOrder'])->name('stripe-order');
    Route::post('cash/order',[\App\Http\Controllers\User\CashController::class,'cashOrder'])->name('cash-order');
    Route::get('my/orders',[\App\Http\Controllers\User\AllUserController::class,'myOrders'])->name('my.orders');
    Route::get('order_details/{order_id}',[\App\Http\Controllers\User\AllUserController::class,'orderDetails']);
    Route::get('invoice_download/{order_id}',[\App\Http\Controllers\User\AllUserController::class,'orderInvoiceDownload']);
    Route::post('return/order/{order_id}',[\App\Http\Controllers\User\AllUserController::class,'returnOrder'])->name('return-order');
    Route::get('return/order/list',[\App\Http\Controllers\User\AllUserController::class,'returnOrderList'])->name('return-order-list');
    Route::get('cancel/order',[\App\Http\Controllers\User\AllUserController::class,'cancelOrder'])->name('cancel-order');

});

//my cart page all route......
Route::get('mycart',[\App\Http\Controllers\User\CartPageController::class,'myCart'])->name('mycart');
Route::get('/user/get-cart-product',[\App\Http\Controllers\User\CartPageController::class,'getCartProduct']);
Route::get('/user/cart-remove/{rowId}',[\App\Http\Controllers\User\CartPageController::class,'removeCartProduct']);
Route::get('cart-increment/{rowId}',[\App\Http\Controllers\User\CartPageController::class,'cartIncrement']);
Route::get('cart-decrement/{rowId}',[\App\Http\Controllers\User\CartPageController::class,'cartDecrement']);

//frontend coupon option......
Route::post('/apply-coupon',[\App\Http\Controllers\frontend\CartController::class,'applyCoupon'])->name('apply-coupon');
Route::get('/coupon-calculation',[\App\Http\Controllers\frontend\CartController::class,'couponCalculation'])->name('coupon-calculation');
Route::get('/coupon-remove',[\App\Http\Controllers\frontend\CartController::class,'couponRemove'])->name('coupon-remove');

//frontend Checkout Routes...
Route::get('checkout',[\App\Http\Controllers\frontend\CartController::class,'checkoutCreate'])->name('checkout');
Route::get('district-get/ajax/{division_id}',[\App\Http\Controllers\User\CheckoutController::class,'districtGetAjax']);
Route::get('area-get/ajax/{district_id}',[\App\Http\Controllers\User\CheckoutController::class,'areaGetAjax']);
Route::post('checkout-save',[\App\Http\Controllers\User\CheckoutController::class,'saveCheckout'])->name('checkout-save');

//frontend blog routes....
Route::get('blog',[\App\Http\Controllers\frontend\HomeBlogController::class,'homeBlog'])->name('home.blog');
Route::get('blog/details/{id}',[\App\Http\Controllers\frontend\HomeBlogController::class,'blogDetails'])->name('post.details');
Route::get('blog/category/post/{id}',[\App\Http\Controllers\frontend\HomeBlogController::class,'blogCategoryPost']);

//frontend product review routes....
Route::post('review/save',[\App\Http\Controllers\User\ProductReviewController::class,'saveReview'])->name('review.store');


//admin site setting routes....
Route::prefix('setting')->group(function(){
    Route::get('site',[\App\Http\Controllers\Backend\SiteSettingController::class,'siteSetting'])->name('site.setting');
    Route::post('site/update/{id}',[\App\Http\Controllers\Backend\SiteSettingController::class,'updateSiteSetting'])->name('update.site.setting');
    Route::get('seo',[\App\Http\Controllers\Backend\SiteSettingController::class,'seoSetting'])->name('seo.setting');
    Route::post('seo/update/{id}',[\App\Http\Controllers\Backend\SiteSettingController::class,'updateSeo'])->name('update.seo.setting');
});
//admin manage return request routes....
Route::prefix('returns')->group(function(){
    Route::get('request',[\App\Http\Controllers\Backend\ReturnRequestController::class,'returnRequest'])->name('return-request');
    Route::get('all',[\App\Http\Controllers\Backend\ReturnRequestController::class,'allRequest'])->name('all-request');
    Route::get('request/approve/{id}',[\App\Http\Controllers\Backend\ReturnRequestController::class,'requestApprove'])->name('approve');
});
//admin product review management routes...
Route::prefix('review')->group(function(){
    Route::get('pending',[\App\Http\Controllers\Backend\ReturnRequestController::class,'pendingReview'])->name('pending.review');
    Route::get('approve/{id}',[\App\Http\Controllers\Backend\ReturnRequestController::class,'approveReview'])->name('review.approve');
    Route::get('publish',[\App\Http\Controllers\Backend\ReturnRequestController::class,'publishReview'])->name('publish.review');
    Route::get('delete/{id}',[\App\Http\Controllers\Backend\ReturnRequestController::class,'reviewDelete'])->name('review.delete');
});

//admin manage product stock.......
Route::prefix('stock')->group(function (){
    Route::get('product',[\App\Http\Controllers\Backend\ProductController::class,'productStock'])->name('product-stock');
});

//admin user role routes....
Route::prefix('adminuserrole')->group(function(){
    Route::get('all',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'allAdminUserRole'])->name('all.admin.user');
    Route::get('add',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'adminUserRoleAdd'])->name('add.admin');
    Route::post('save',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'adminUserRoleSave'])->name('save.admin.user');
    Route::get('edit/{id}',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'adminUserRoleEdit'])->name('edit.admin.user');
    Route::post('update/{id}',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'adminUserRoleUpdate'])->name('update.admin.user');
    Route::get('delete/{id}',[\App\Http\Controllers\Backend\AdminUserRoleController::class,'adminUserRoleDelete'])->name('delete.admin.user');
});
