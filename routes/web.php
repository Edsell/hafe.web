<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\StudentApplicationController;

Route::get('/', [HomeController::class, 'Home'])->name('Home');
Route::get('/about-us', [HomeController::class, 'AboutPage'])->name('AboutPage');
Route::get('/blogs/{slug}', [HomeController::class, 'BlogDetails'])->name('BlogDetails');
Route::get('/blogs', [HomeController::class, 'BlogPage'])->name('BlogPage');
Route::get('/contact-us', [HomeController::class, 'ContactPage'])->name('ContactPage');
Route::get('/gallery', [HomeController::class, 'GalleryPage'])->name('GalleryPage');
Route::get('/faq', [HomeController::class, 'FAQ'])->name('FAQ');
Route::get('/policies/privacy', [HomeController::class, 'PrivacyPolicy'])->name('PrivacyPolicy');

Route::post('/blogs/{slug}/comments', [BlogCommentController::class, 'CreateComment'])->name('CreateComment');

Route::get('/apply',  [StudentApplicationController::class, 'create'])->name('apply.create');
Route::post('/apply', [StudentApplicationController::class, 'store'])->name('apply.thankyou.post');
Route::get('/apply/thank-you', [StudentApplicationController::class, 'thankyou'])->name('apply.thankyou');

// Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin/students/')->group(function () {
    Route::get('/admin/applications', [StudentApplicationController::class, 'index'])->name('admin.applications.index');
    Route::get('/admin/applications/{application}', [StudentApplicationController::class, 'show'])->name('admin.applications.show');
    Route::patch('/admin/applications/{application}', [StudentApplicationController::class, 'update'])->name('admin.applications.update');
    Route::delete('/admin/applications/{application}', [StudentApplicationController::class, 'destroy'])->name('admin.applications.destroy');
    Route::post('/admin/applications/{application}/resend', [StudentApplicationController::class, 'resend'])->name('admin.applications.resend');
});


Route::middleware('auth')->prefix('admin/blogs/')->group(function () {
    Route::get('/', [BlogController::class, 'MgtBlogs'])->name('MgtBlogs');
    Route::get('/category', [BlogController::class, 'MgtBlogCategory'])->name('MgtBlogCategory');
    Route::get('/create', [BlogController::class, 'CreateBlog'])->name('CreateBlog');
    Route::get('/update/{id}', [BlogController::class, 'UpdateBlog'])->name('UpdateBlog');
    Route::get('/paragraph/{id}', [BlogController::class, 'BlogParagraph'])->name('BlogParagraph');

    Route::post('/create-form', [BlogController::class, 'CreateBlogForm'])->name('CreateBlogForm');
    Route::post('/update-form', [BlogController::class, 'UpdateBlogForm'])->name('UpdateBlogForm');
    Route::post('/create-category', [BlogController::class, 'CreateBlogCategory'])->name('CreateBlogCategory');
    Route::post('/update-category', [BlogController::class, 'UpdateBlogCategory'])->name('UpdateBlogCategory');
    Route::post('/create-paragraph', [BlogController::class, 'CreateBlogParagraph'])->name('CreateBlogParagraph');
    Route::post('/update-paragraph', [BlogController::class, 'UpdateBlogParagraph'])->name('UpdateBlogParagraph');
    Route::post('/create-quote', [BlogController::class, 'CreateBlogQuote'])->name('CreateBlogQuote');
    Route::post('/update-quote', [BlogController::class, 'UpdateBlogQuote'])->name('UpdateBlogQuote');
    Route::post('/create-tags', [BlogController::class, 'CreateBlogTags'])->name('CreateBlogTags');
    Route::post('/update-tag', [BlogController::class, 'UpdateBlogTag'])->name('UpdateBlogTag');

    //Blog comments
    Route::get('comments', [BlogCommentController::class, 'MgtComments'])->name('MgtComments');
    Route::get('comments/{id}/edit', [BlogCommentController::class, 'UpdateComment'])->name('UpdateComment');
    Route::post('comments/{id}', [BlogCommentController::class, 'SaveComment'])->name('SaveComment');
    Route::post('comments/{id}/approve', [BlogCommentController::class, 'ApproveComment'])->name('ApproveComment');
    Route::delete('comments/{id}', [BlogCommentController::class, 'DeleteComment'])->name('DeleteComment');

    // Admin – Video Blogs (inside the same auth/admin group you already use)
    Route::get('/create-video', [BlogController::class, 'CreateVideoBlog'])->name('CreateVideoBlog');
    Route::post('/create-video', [BlogController::class, 'CreateVideoBlogForm'])->name('CreateVideoBlogForm');

    Route::get('/update-video/{id}', [BlogController::class, 'UpdateVideoBlog'])->name('UpdateVideoBlog');
    Route::post('/update-video', [BlogController::class, 'UpdateVideoBlogForm'])->name('UpdateVideoBlogForm');


});

Route::middleware('auth')->prefix('admin/slider/')->group(function () {
    Route::get('/', [SliderController::class, 'MgtSlider'])->name('MgtSlider');
    Route::get('/create', [SliderController::class, 'CreateSlider'])->name('CreateSlider');
    Route::post('/create-form', [SliderController::class, 'CreateSliderForm'])->name('CreateSliderForm');
    Route::get('/update/{id}', [SliderController::class, 'UpdateSlider'])->name('UpdateSlider');
    Route::post('/update-form/{id}', [SliderController::class, 'UpdateSliderForm'])->name('UpdateSliderForm');
    Route::post('/sliders/{id}/toggle-status', [SliderController::class, 'toggleStatus'])->name('sliders.toggleStatus');
});

Route::middleware('auth')->prefix('admin/cms/')->group(function () {
    Route::get('/about', [CmsController::class, 'MgtAbout'])->name('MgtAbout');
    Route::get('/gallery', [GalleryController::class, 'MgtGallery'])->name('MgtGallery');
    Route::post('/create-gallery', [GalleryController::class, 'CreateGallery'])->name('CreateGallery');
    Route::get('/why', [CmsController::class, 'MgtWhy'])->name('MgtWhy');
    Route::post('/create-why-us', [CmsController::class, 'CreateWhy'])->name('CreateWhy');
    Route::get('/update-why-us/{id}', [CmsController::class, 'UpdateWhy'])->name('UpdateWhy');
    Route::post('/update-about', [CmsController::class, 'UpdateAbout'])->name('UpdateAbout');
    Route::post('/create-point', [CmsController::class, 'CreateAboutPoints'])->name('CreateAboutPoints');
    Route::post('/create-paragraph', [CmsController::class, 'CreateAboutParagraph'])->name('CreateAboutParagraph');
    Route::post('/update-paragraph', [CmsController::class, 'UpdateAboutParagraph'])->name('UpdateAboutParagraph');
    Route::post('/update-why', [CmsController::class, 'UpdateWhyForm'])->name('UpdateWhyForm');

});

Route::middleware('auth')->prefix('admin/users/')->group(function () {
    Route::get('/', [UserController::class, 'MgtUsers'])->name('MgtUsers');
    Route::get('/create', [UserController::class, 'CreateUser'])->name('CreateUser');
    Route::get('/update/{id}', [UserController::class, 'UpdateUser'])->name('UpdateUser');
    Route::get('/profile', [UserController::class, 'UserProfile'])->name('UserProfile');
    Route::post('/create-form', [UserController::class, 'CreateUserForm'])->name('CreateUserForm');
    Route::post('/update-form/{id}', [UserController::class, 'UpdateUserForm'])->name('UpdateUserForm');
    Route::post('/avatar-form/{id}', [UserController::class, 'UpdateUserAvatar'])->name('UpdateUserAvatar');
    Route::post('/profile-update', [UserController::class, 'UpdateUserProfile'])->name('UpdateUserProfile');
    Route::post('/profile-avatar-update', [UserController::class, 'UpdateUserProfileAvatar'])->name('UpdateUserProfileAvatar');
    Route::post('/profile-avatar-delete', [UserController::class, 'DeleteUserProfileAvatar'])->name('DeleteUserProfileAvatar');
    Route::post('/user-avatar-delete', [UserController::class, 'DeleteUserAvatar'])->name('DeleteUserAvatar');
});

Route::get('/MassDelete/{id}/{TableName}', [DeleteController::class, 'MassDelete'])->name('MassDelete');
Route::post('/MassDeleteSelected/{TableName}', [DeleteController::class, 'MassDeleteAll'])->name('MassDeleteAll');
Route::post('/mass-status', [DeleteController::class, 'MassStatus'])->name('MassStatus');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'AdminCP'])->name('AdminCP');

    Route::get('/general-settings', [GeneralSettingsController::class, 'GeneralSettings'])->name('GeneralSettings');
    Route::get('/general-features', [GeneralSettingsController::class, 'MgtFeatures'])->name('MgtFeatures');
    Route::post('/general-settings/create', [GeneralSettingsController::class, 'CreateGeneralSettings'])->name('CreateGeneralSettings');
    Route::post('/general-settings/update', [GeneralSettingsController::class, 'UpdateGeneralSettings'])->name('UpdateGeneralSettings');
    Route::post('/logo-update', [GeneralSettingsController::class, 'UpdateLogo'])->name('UpdateLogo');
    Route::post('/crumb-update', [GeneralSettingsController::class, 'UpdateCrumb'])->name('UpdateCrumb');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
