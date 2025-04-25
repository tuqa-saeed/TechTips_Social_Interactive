<?php
use App\Http\Controllers\API\AdviceController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\BookmarkController;
use App\Http\Controllers\API\RatingController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NotificationController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello from Laravel']);
});



//Tips controller
Route::get('/advices', [AdviceController::class, 'index']);
Route::get('/advices/{id}', [AdviceController::class, 'show']);
Route::post('/advices', [AdviceController::class, 'store'])->middleware('auth');

Route::put('/advices/{id}', [AdviceController::class, 'update']);
Route::delete('/advices/{id}', [AdviceController::class, 'destroy']);

Route::middleware('auth:sanctum')->post('/advices/{id}/report', [AdviceController::class, 'reportAdvice']);
Route::get('/advices/{id}', [AdviceController::class, 'getSingleAdvice']);

//categories controller
Route::get('/categories', [CategoryController::class, 'getAllCategories']);
Route::post('/categories', [CategoryController::class, 'createCategory']);
Route::get('/categories/{id}', [CategoryController::class, 'getCategoryById']);
Route::put('/categories/{id}', [CategoryController::class, 'updateCategory']);
Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory']);


//comments controller
Route::post('/comments', [CommentController::class, 'addComment']);
Route::get('/comments/advice/{advice_id}', [CommentController::class, 'getCommentsForAdvice']);
Route::delete('/comments/{id}', [CommentController::class, 'deleteComment']);


//likes controller
Route::post('/likes', [LikeController::class, 'likeAdvice']);
Route::delete('/likes', [LikeController::class, 'unlikeAdvice']);
Route::get('/likes/advice/{advice_id}', [LikeController::class, 'getLikesForAdvice']);

//bookmarks controller
Route::post('/bookmarks', [BookmarkController::class, 'addBookmark']);
Route::delete('/bookmarks', [BookmarkController::class, 'removeBookmark']);
Route::get('/bookmarks/user/{user_id}', [BookmarkController::class, 'getBookmarkedAdvices']);

//ratings controller
Route::post('/ratings', [RatingController::class, 'submitRating']);
Route::get('/ratings/advice/{advice_id}', [RatingController::class, 'getAdviceRating']);
Route::get('/ratings/advice/{advice_id}/user/{user_id}', [RatingController::class, 'getUserRating']);

//user controller
Route::middleware('auth:sanctum')->get('/profile/{user_id}', [UserController::class, 'getProfile']);
Route::middleware('auth:sanctum')->put('/profile/{user_id}', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->put('/profile/{user_id}/picture', [UserController::class, 'updateProfilePicture']);
Route::middleware('auth:sanctum')->put('/profile/{user_id}/password', [UserController::class, 'changePassword']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//admin
/* Route::middleware(['auth:sanctum', 'admin'])->delete('/admin/advice/{id}', [AdminController::class, 'deleteAdvice']);
 */

 //notifications controller

Route::middleware('auth:sanctum')->get('/notifications', [NotificationController::class, 'getNotifications']);
Route::middleware('auth:sanctum')->put('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);


