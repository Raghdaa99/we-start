<?php


use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PaymentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/full-projects', 'full_projects')->name('full_projects');
    Route::get('/single-project/{slug}', 'single_project')->name('single.project');
    Route::get('/u/{username}/{id}', 'single_freelancer')->name('single-freelancer-profile');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/send-contact', 'sendEmailContact')->name('send-contact');
});
Route::middleware('auth:web')->group(function () {
    Route::post('proposal-store', [FreelancerController::class,'proposal_store'])->name('proposal.store');
});

Route::group([
    'prefix' => '/dashboard',
    'as' => 'admin.',
    'middleware' => ['auth:admin'],
], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');

    Route::resource('categories', CategoryController::class);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/user')->name('user.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [ProfileUserController::class, 'index'])->name('dashboard');
    Route::get('/settings', [ProfileUserController::class, 'settings'])->name('settings');
    Route::put('/settings', [ProfileUserController::class, 'save_settings'])->name('settings.save');

    Route::resource('projects', ProjectController::class);
    Route::delete('/image/{id}', [ProjectController::class, 'deleteFile'])->name('delete_Image');
    Route::get('/manage-bidders/{slug}', [ProjectController::class, 'manage_bidders'])->name('project.manage.bidders');

    Route::get('proposal/{id}',[FreelancerController::class,'getProposal'])->name('getProposal');
    Route::delete('proposal/{id}',[FreelancerController::class,'deleteProposal'])->name('deleteProposal');
    Route::post('proposal',[FreelancerController::class,'contract'])->name('contract');
    Route::post('/contract/edit',[FreelancerController::class,'update_contract'])->name('contract.update');


    Route::get('/messages',[MessageController::class,'getMessages'])->name('messages');
    Route::get('/messages-content/{recipient_id}',[MessageController::class,'getMessagesContent']);
    Route::get('/users',[MessageController::class,'getUsers']);
    Route::post('/messages/store',[MessageController::class,'storeMessages'])->name('sendMessage');


    Route::get('/reviews',[ReviewController::class,'getReviews'])->name('reviews.index');
    Route::get('/reviews/{id}',[ReviewController::class,'getReview'])->name('reviews.show');
    Route::post('/reviews/store',[ReviewController::class,'storeReviews'])->name('reviews.store');
    Route::put('/reviews/update/{id}',[ReviewController::class,'updateReviews'])->name('reviews.update');
//    Route::delete('/reviews/delete',[ReviewController::class,'destroyReviews'])->name('reviews.delete');


    Route::get('/checkout',[PaymentController::class,'checkout'])->name('checkout');
    Route::post('/stripe',[PaymentController::class,'postPaymentStripe'])->name('payment');
    Route::get('/success-payment',[PaymentController::class,'getSuccessPayment'])->name('success.payment');

    Route::get('/paypal/{amount}',[PaymentController::class,'paypal'])->name('paypal');
    Route::get('/payment/{user}/return',[PaymentController::class,'store'])->name('payments.return');
    Route::get('/payment/{user}/cancel',[PaymentController::class,'cancel'])->name('payments.cancel');

});


//require __DIR__.'/auth.php';
