<?php

use App\Http\Controllers\Admin\AdmniSupportController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SupportChatController;
use App\Http\Controllers\UserRouteController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\AffiliateProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\Admin\AdminRecipeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\NewPageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialMediaLinksController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Web\WebProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CustomReviewController;
use App\Http\Controllers\HomepageSettingController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WebVideoController;
use Sabre\DAV\Client;



Route::get('/videos', [WebVideoController::class,'index'])->name('home.video');
Route::get('/video/category/{slug}', [WebVideoController::class,'category'])->name('home.video-category');
Route::get('/video/{slug}', [WebVideoController::class,'details'])->name('home.video-details');
Route::get('/search-videos', [WebVideoController::class, 'search'])->name('search.videos');


Route::get('/video/stream/{filename}', function ($filename) {
    $client = new Client([
        'baseUri'  => "https://nx60960.your-storageshare.de/remote.php/dav/files/jsbtechweb/video/",
        'userName' => 'jsbtechweb',
        'password' => '23!!+$$rt$12',
    ]);

    try {
        // Get the full WebDAV file path
        $filePath = "/remote.php/dav/files/jsbtechweb/video/{$filename}";

        // Fetch file content
        $fileContent = $client->request('GET', $filePath);

        if ($fileContent['statusCode'] !== 200) {
            return response()->json(['error' => 'Error fetching video'], 500);
        }

        return response($fileContent['body'], 200)
            ->header('Content-Type', 'video/mp4')
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    } catch (\Exception $e) {
        return response()->json(['error' => 'WebDAV error: ' . $e->getMessage()], 500);
    }
});








// =============== Home Routes ===============
Route::get('/', [WebController::class,'index'])->name('home');


Route::get('/blog/{slug}', [WebController::class,'blogDetails'])->name('home.blog');
Route::get('/blogs', [WebController::class,'blog'])->name('home.blogs');
Route::get('/services', [WebController::class,'services'])->name('home.services');
Route::get('/service/{slug}', [WebController::class,'serviceDetails'])->name('service.details');
Route::get('/category/{slug}', [WebController::class,'category'])->name('home.category');
Route::get('/page/{slug}', [WebController::class,'pageDetails'])->name('home.page');
Route::get('products',[WebProductController::class,'index'])->name('home.products');
Route::get('product/{slug}',[WebProductController::class,'details'])->name('home.product');
Route::get('/about-us', [PageController::class,'about'])->name('home.about');
Route::get('/contact-us', [PageController::class,'contact'])->name('home.contact');
Route::get('/faq', [PageController::class,'faq'])->name('home.faq');
Route::get('/products/search', [WebProductController::class, 'search'])->name('products.search');
Route::controller(PageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});


// Cart Functionality
Route::get('cart/',[CartController::class,'index'])->name('home.cart');
Route::get('cart/remove/{id}',[CartController::class,'removeCart'])->name('cart.remove');
Route::get('cart/add/{id}',[CartController::class,'cartAdd'])->name('cart.cartAdd');
Route::get('cart/cartOneRemove/{id}',[CartController::class,'cartOneRemove'])->name('cart.cartOneRemove');
Route::post('coupon-apply',[CuponController::class,'applyCoupon'])->name('coupon-apply');
Route::get('remove-coupon',[CuponController::class,'removeCoupon'])->name('remove-coupon');

// Checkout
//Checkout Controller
Route::get('checkout',[OrderController::class,'index'])->name('home.checkout');
Route::get('checkout-store',[OrderController::class,'store'])->name('checkout.store');





Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');

Route::get('/search',[WebController::class,'searchBlog'])->name('search.blog');
Route::get('sitemap.xml', [WebController::class, 'siteMap']);

Route::post('/contact/save', [HomeController::class,'contactMessage'])->name('contact.save');

Route::post('comment/save',[CommentController::class,'store'])->name('comment.save');
Route::post('newsletter/save',[NewsletterController::class,'store'])->name('newsletter.save');
Route::get('/comments/delete/{id}', [CommentController::class,'destroy'])->name('comments.destroy');
Route::post('/summernote/upload', [WebController::class, 'upload'])->name('summernote.upload');

Route::get('/create-transaction', [PaypalController::class, 'createTransaction'])->name('createTransaction');
Route::post('/process-transaction/', [OrderController::class, 'processTransaction'])->name('processTransaction');
Route::get('/success-transaction', [OrderController::class, 'successTransaction'])->name('successTransaction');
Route::get('/cancel-transaction', [OrderController::class, 'cancelTransaction'])->name('cancelTransaction');

Route::controller(StripePaymentController::class)->group(function(){
//    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::get('/payment/return', [OrderController::class, 'handleReturn'])->name('payment.return');

Route::get('/dashboard', function () {
    return view('user.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/user-profile', [ProfileController::class, 'editUser'])->name('user-profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Routes

    Route::get('my-orders',[UserRouteController::class,'index'])->name('my-orders');
    Route::get('my-order/{id}',[UserRouteController::class,'userOrder'])->name('user-order.invoice');

    Route::resource('user-support',SupportController::class);

    Route::get('/chat/{supportId}', [SupportChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [SupportChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{supportId}', [SupportChatController::class, 'fetchMessages']);

    //Close Support
    Route::post('support-close/{id}',[AdmniSupportController::class,'closeTicket'])->name('admin-support-close');

});

Route::middleware(['auth', 'isadmin'])->group(function(){
    Route::get('/admin',[DashboardController::class,'index'])->name('admin.index');


    Route::get('/optimize-clear', function () {
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully!');
    })->name('optimize.clear');



    //======== Category Routes ==========
    Route::get('/admin/category',[AdminCategoryController::class,'index'])->name('category.index');
    Route::get('/admin/category/create',[AdminCategoryController::class,'create'])->name('category.create');
    Route::post('/admin/category/save',[AdminCategoryController::class,'save'])->name('category.save');
    Route::get('/admin/category/delete/{id}',[AdminCategoryController::class,'delete'])->name('category.delete');
    Route::get('admin/category/edit/{id}',[AdminCategoryController::class,'edit'])->name('category.edit');
    Route::post('admin/category/update', [AdminCategoryController::class, 'update'])->name('category.update');

    //========== Book Routes =================
    Route::get('/admin/book/create',[AdminBookController::class,'create'])->name('book.create');
    Route::get('/admin/book',[AdminBookController::class,'index'])->name('book.list');
    Route::post('/admin/book/save',[AdminBookController::class,'save'])->name('book.save');
    Route::get('admin/book/delete/{id}', [AdminBookController::class,'delete'])->name('book.delete');
    Route::get('admin/book/edit/{id}',[AdminBookController::class,'edit'])->name('book.edit');
    Route::post('admin/book/update', [AdminBookController::class, 'update'])->name('book.update');

    Route::get('/admin/comment-list',function (){
        return view('backEnd.admin.comments');
    })->name('comment.message');

    //========== Blog Routes =================
    Route::get('admin/blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::get('admin/blog',[BlogController::class,'index'])->name('blog.list');
    Route::post('admin/blog/save',[BlogController::class,'save'])->name('blog.save');
    Route::get('admin/blog/delete/{id}', [BlogController::class,'delete'])->name('blog.delete');
    Route::get('admin/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('admin/blog/update', [BlogController::class, 'update'])->name('blog.update');

    //========== Recipe Routes =================
    Route::get('/admin/recipe/create',[AdminRecipeController::class,'create'])->name('recipe.create');
    Route::get('/admin/recipe',[AdminRecipeController::class,'index'])->name('recipe.list');
    Route::post('/admin/recipe/save',[AdminRecipeController::class,'save'])->name('recipe.save');
    Route::get('admin/recipe/delete/{id}', [AdminRecipeController::class,'delete'])->name('recipe.delete');
    Route::get('admin/recipe/edit/{id}',[AdminRecipeController::class,'edit'])->name('recipe.edit');
    Route::post('admin/recipe/update', [AdminRecipeController::class, 'update'])->name('recipe.update');

    //========== Order List ================
    Route::get('/admin/order',[AdminOrderController::class,'index'])->name('order.list');
    Route::get('/admin/order/pending',[AdminOrderController::class,'pendingOrder'])->name('pendingOrder.list');
    Route::get('/admin/order/delete/{id}',[AdminOrderController::class,'cartDelete'])->name('order.delete');
    Route::get('/admin/order/approve/{id}',[AdminOrderController::class,'orderStatus'])->name('order.approve');


    // ============ Personal Update ==========
    Route::get('admin/personal-details',[AdminController::class,'index'])->name('personal.details');

    //================ Website Setting =====================
    Route::get('admin/website/settings/', [SettingController::class, 'index'])->name('admin.setting');
    Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

    // ================= Contact Message =================
    Route::get('/admin/contact/message',[AdminController::class,'message'])->name('contact.message');
    Route::post('/admin/contact/message',[AdminController::class,'updateSpamKeywords'])->name('settings.updateSpamKeywords');
    Route::get('/admin/delete/message/{id}',[AdminController::class,'messageDelete'])->name('contact.message.delete');

    Route::get('/admin/delete/comment/{id}',[CommentController::class,'delete'])->name('comment.delete');

    //================ Page Routes =====================
    Route::get('admin/page/about/', [AdminController::class, 'homeAbout'])->name('page.homeAbout');
    Route::post('admin/page/about/', [AdminController::class, 'homeAboutSave'])->name('page.homeAboutSave');

    Route::get('admin/page/privacy/', [AdminController::class, 'homePrivacy'])->name('page.homePrivacy');
    Route::post('admin/page/privacy/save', [AdminController::class, 'homePrivacySave'])->name('page.homePrivacySave');

  //Route::post('admin/website/settings/update', [SettingController::class, 'update'])->name('update.setting');

    Route::resource('game',GameController::class);

    Route::resource('new-page', NewPageController::class);

    Route::resource('socials',SocialController::class);

    Route::get('update-socials-links',[SocialMediaLinksController::class,'index'])->name('update-socials-links');
    Route::post('update-socials-save',[SocialMediaLinksController::class,'store'])->name('update-socials-save');

    Route::resource('newsletters',NewsletterController::class);

    Route::get('newsletter/delete/{id}',[NewsletterController::class,'del'])->name('newsletter.del');

    Route::post('ckeditor-upload', [AdminController::class, 'ckeditorUpload'])->name('ckeditor.upload');
    // Route::post('/summernote/upload', [AdminController::class, 'summernoteUpload'])->name('summernote.upload');

    Route::resource('roles-permission', RolePermissionController::class);


    Route::get('/admin/user-list',[DashboardController::class,'userList'])->name('admin.user-list');
    Route::get('/create-admin',[DashboardController::class,'createAdmin'])->name('create-admin');
    Route::get('/delete-user/{id}',[DashboardController::class,'userDelete'])->name('user-delete');
    Route::post('/save-admin',[DashboardController::class,'saveAdmin'])->name('save-admin');

    Route::resource('project',ProjectController::class);
    Route::resource('affiliate', AffiliateProductController::class);
    Route::resource('admin-products',ProductController::class);

    Route::resource('admin-product-category',ProductCategoryController::class);
    Route::resource('admin-coupons',CuponController::class);

    Route::resource('admin-service',AdminServiceController::class);
    Route::resource('admin-faq',AdminFaqController::class);
    Route::resource('admin-slider',AdminSliderController::class);
    Route::resource('custom-review',CustomReviewController::class);
    // Video Crud
    Route::resource('admin-video-category',VideoCategoryController::class);
    Route::post('/upload/view', [VideoCategoryController::class, 'uploadFile'])->name('upload.view');

    Route::resource('admin-video',VideoController::class);

    // Order Details
    Route::get('/admin/order/',[AdminOrderController::class,'index'])->name('admin-order.index');
    Route::get('/admin/order/invoice/{id}',[AdminOrderController::class,'invoice'])->name('admin-order.invoice');
    Route::get('/admin/order/orderDelete/{id}',[AdminOrderController::class,'orderDelete'])->name('admin-order.orderDelete');
    Route::post('/admin/order/orderStatus/{id}',[AdminOrderController::class,'orderStatusUpdate'])->name('admin-order.orderStatus');

    Route::get('admin-support-list',[AdmniSupportController::class,'index'])->name('admin-support-list');
    Route::get('admin-support/{id}',[AdmniSupportController::class,'chat'])->name('admin-chat');

    Route::delete('admin-support-delete/{id}',[AdmniSupportController::class,'destroy'])->name('admin-chat-delete');

    Route::get('home-page-setting',[HomepageSettingController::class,'index'])->name('home-page-setting');
    Route::post('home-page-setting-update',[HomepageSettingController::class,'update'])->name('home-page-setting-update');

});
require __DIR__.'/auth.php';
