<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/about', [AuthController::class, 'about'])->name('about');
Route::get('/organisasi', [AuthController::class, 'organisasi'])->name('organisasi');
Route::get('/berita', [AuthController::class, 'berita'])->name('berita');
Route::get('/event', [AuthController::class, 'event'])->name('event');
Route::get('/pojok-pembina', [AuthController::class, 'pojokPembina'])->name('pojokPembina');
Route::get('/pojok-anggota', [AuthController::class, 'pojokAnggota'])->name('pojokAnggota');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');


// Diskusi
Route::get('/diskusi', [AuthController::class, 'diskusi'])->name('diskusi');

// Organisasi
Route::get('/organisasi', [AuthController::class, 'organisasi'])->name('organisasi');

// Ranking
Route::get('/ranking', [AuthController::class, 'ranking'])->name('ranking');





Route::get('/news/{slug}', [AuthController::class, 'newsShow'])->name('news.show');
Route::get('/event/{slug}', [AuthController::class, 'eventShow'])->name('event.show');
Route::get('/mentor-work/{slug}', [AuthController::class, 'mentorWorkShow'])->name('mentor-work.show');
Route::get('/member-work/{slug}', [AuthController::class, 'memberWorkShow'])->name('member-work.show');

Route::post('/comment', [AuthController::class, 'commentStore'])->name('comment.store');




Route::group(['middleware' => ['auth.middleware:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/news', [AdminController::class, 'news'])->name('admin.news');
    Route::get('/admin/news/create', [AdminController::class, 'newsCreate'])->name('admin.news.create');
    Route::post('/admin/news/store', [AdminController::class, 'newsStore'])->name('admin.news.store');
    Route::get('/admin/news/edit/{id}', [AdminController::class, 'newsEdit'])->name('admin.news.edit');
    Route::post('/admin/news/update', [AdminController::class, 'newsUpdate'])->name('admin.news.update');
    Route::get('/admin/news/destroy/{id}', [AdminController::class, 'newsDestroy'])->name('admin.news.destroy');

    // Mentor Work
    Route::get('/admin/mentor-work', [AdminController::class, 'mentorWork'])->name('admin.mentor-work');
    Route::get('/admin/mentor-work/create', [AdminController::class, 'mentorWorkCreate'])->name('admin.mentor-work.create');
    Route::post('/admin/mentor-work/store', [AdminController::class, 'mentorWorkStore'])->name('admin.mentor-work.store');
    Route::get('/admin/mentor-work/edit/{id}', [AdminController::class, 'mentorWorkEdit'])->name('admin.mentor-work.edit');
    Route::post('/admin/mentor-work/update', [AdminController::class, 'mentorWorkUpdate'])->name('admin.mentor-work.update');
    Route::get('/admin/mentor-work/destroy/{id}', [AdminController::class, 'mentorWorkDestroy'])->name('admin.mentor-work.destroy');

    Route::get('/admin/mentor-work/approve/{slug}', [AdminController::class, 'mentorWorkApprove'])->name('admin.mentor-work.approve');
    Route::get('/admin/mentor-work/reject/{slug}', [AdminController::class, 'mentorWorkReject'])->name('admin.mentor-work.reject');

    // Member Work
    Route::get('/admin/member-work', [AdminController::class, 'memberWork'])->name('admin.member-work');
    Route::get('/admin/member-work/approve/{id}', [AdminController::class, 'memberWorkApprove'])->name('admin.member-work.approve');
    Route::get('/admin/member-work/rejected/{id}', [AdminController::class, 'memberWorkRejected'])->name('admin.member-work.rejected');

    // Event
    Route::get('/admin/event', [AdminController::class, 'event'])->name('admin.event');
    Route::get('/admin/event/create', [AdminController::class, 'eventCreate'])->name('admin.event.create');
    Route::post('/admin/event/store', [AdminController::class, 'eventStore'])->name('admin.event.store');
    Route::get('/admin/event/edit/{id}', [AdminController::class, 'eventEdit'])->name('admin.event.edit');
    Route::post('/admin/event/update', [AdminController::class, 'eventUpdate'])->name('admin.event.update');
    Route::get('/admin/event/destroy/{id}', [AdminController::class, 'eventDestroy'])->name('admin.event.destroy');

    // Registration
    Route::get('/admin/registration', [AdminController::class, 'registration'])->name('admin.registration');
    Route::get('/admin/registration/detail/{id}', [AdminController::class, 'registrationDetail'])->name('admin.registration.detail');

    // Lesson
    Route::get('/admin/lesson', [AdminController::class, 'lesson'])->name('admin.lesson');
    Route::get('/admin/lesson/create', [AdminController::class, 'lessonCreate'])->name('admin.lesson.create');
    Route::post('/admin/lesson/store', [AdminController::class, 'lessonStore'])->name('admin.lesson.store');
    Route::get('/admin/lesson/edit/{id}', [AdminController::class, 'lessonEdit'])->name('admin.lesson.edit');
    Route::post('/admin/lesson/update', [AdminController::class, 'lessonUpdate'])->name('admin.lesson.update');
    Route::get('/admin/lesson/destroy/{id}', [AdminController::class, 'lessonDestroy'])->name('admin.lesson.destroy');

    // Quiz
    Route::get('/admin/quiz', [AdminController::class, 'quiz'])->name('admin.quiz');
    Route::get('/admin/quiz/create', [AdminController::class, 'quizCreate'])->name('admin.quiz.create');
    Route::post('/admin/quiz/store', [AdminController::class, 'quizStore'])->name('admin.quiz.store');
    Route::get('/admin/quiz/edit/{slug}', [AdminController::class, 'quizEdit'])->name('admin.quiz.edit');
    Route::post('/admin/quiz/update', [AdminController::class, 'quizUpdate'])->name('admin.quiz.update');
    Route::get('/admin/quiz/destroy/{id}', [AdminController::class, 'quizDestroy'])->name('admin.quiz.destroy');

    // add Question
    Route::get('/admin/quiz/add-question/{slug}', [AdminController::class, 'quizAddQuestion'])->name('admin.quiz-add-question');
    Route::post('/admin/quiz/question/store', [AdminController::class, 'quizQuestionStore'])->name('admin.quiz-question.store');
    Route::get('/admin/quiz/question/edit/{id}', [AdminController::class, 'quizQuestionEdit'])->name('admin.quiz-question.edit');
    Route::post('/admin/quiz/question/update', [AdminController::class, 'quizQuestionUpdate'])->name('admin.quiz-question.update');
    Route::get('/admin/quiz/question/destroy/{id}', [AdminController::class, 'quizQuestionDestroy'])->name('admin.quiz-question.destroy');

    // Participant
    Route::get('/admin/quiz/participant/{slug}', [AdminController::class, 'quizParticipant'])->name('admin.quiz.participant');
    Route::get('/admin/quiz/participant/show/{slug}/{id}', [AdminController::class, 'quizParticipantShow'])->name('admin.quiz-participant-show');

    // Ranking
    Route::get('/admin/ranking', [AdminController::class, 'ranking'])->name('admin.ranking');

    // User Data
    Route::get('/admin/user-data', [AdminController::class, 'userData'])->name('admin.user-data');
    Route::post('/admin/user-data/store', [AdminController::class, 'userDataStore'])->name('admin.user-data.store');
    Route::post('/admin/user-data/update', [AdminController::class, 'userDataUpdate'])->name('admin.user-data.update');

    // SKU
    Route::get('/admin/sku', [AdminController::class, 'sku'])->name('admin.sku');
    Route::get('/admin/sku/detail/{id}', [AdminController::class, 'skuDetail'])->name('admin.sku.detail');
});

Route::group(['middleware' => ['auth.middleware:user']], function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Event
    Route::get('/user/event', [UserController::class, 'event'])->name('user.event');
    Route::get('/user/event/{slug}', [UserController::class, 'eventShow'])->name('user.event.show');
    Route::post('/user/event/register', [UserController::class, 'eventRegister'])->name('user.event.register');

    // Registration
    Route::get('/user/registration', [UserController::class, 'registration'])->name('user.registration');

    // Member Work
    Route::get('/user/member-work', [UserController::class, 'memberWork'])->name('user.member-work');
    Route::get('/user/member-work/create', [UserController::class, 'memberWorkCreate'])->name('user.member-work.create');
    Route::post('/user/member-work/store', [UserController::class, 'memberWorkStore'])->name('user.member-work.store');
    Route::get('/user/member-work/edit/{id}', [UserController::class, 'memberWorkEdit'])->name('user.member-work.edit');
    Route::post('/user/member-work/update', [UserController::class, 'memberWorkUpdate'])->name('user.member-work.update');
    Route::get('/user/member-work/destroy/{id}', [UserController::class, 'memberWorkDestroy'])->name('user.member-work.destroy');

    Route::post('/diskusi', [UserController::class, 'diskusiStore'])->name('diskusi.store');
    Route::get('/diskusi/{id}', [UserController::class, 'diskusiShow'])->name('diskusi.show');

    // lesson
    Route::get('/user/lesson', [UserController::class, 'lesson'])->name('user.lesson');
    Route::get('/user/lesson/{id}', [UserController::class, 'lessonShow'])->name('user.lesson.show');

    Route::post('/comment-discussion', [UserController::class, 'commentDiscussionStore'])->name('comment-discussion.store');
    Route::post('/comment-mentor-work', [UserController::class, 'commentMentorWorkStore'])->name('comment-mentor-work.store');
    Route::post('/comment-member-work', [UserController::class, 'commentMemberWorkStore'])->name('comment-member-work.store');

    // Quiz
    Route::get('/user/quiz', [UserController::class, 'quiz'])->name('user.quiz');
    Route::get('/user/quiz/page/{slug}', [UserController::class, 'quizWelcome'])->name('user.quiz.welcome');
    Route::get('/user/quiz/page/show/{slug}', [UserController::class, 'quizShow'])->name('user.quiz.show');
    Route::post('/user/quiz/submit', [UserController::class, 'quizSubmit'])->name('user.quiz.submit');

    // Sku
    Route::get('/user/sku', [UserController::class, 'sku'])->name('user.sku');
    Route::post('/user/sku/store', [UserController::class, 'skuStore'])->name('user.sku.store');
    Route::post('/user/sku/update', [UserController::class, 'skuUpdate'])->name('user.sku.update');
});

Route::group(['middleware' => ['auth.middleware:pembina']], function () {   
    Route::get('/pembina/dashboard', [PembinaController::class, 'index'])->name('pembina.dashboard');

    // Mentor Work
    Route::get('/pembina/mentor-work', [PembinaController::class, 'mentorWork'])->name('pembina.mentor-work');
    Route::get('/pembina/mentor-work/create', [PembinaController::class, 'mentorWorkCreate'])->name('pembina.mentor-work.create');
    Route::post('/pembina/mentor-work/store', [PembinaController::class, 'mentorWorkStore'])->name('pembina.mentor-work.store');
    Route::get('/pembina/mentor-work/edit/{id}', [PembinaController::class, 'mentorWorkEdit'])->name('pembina.mentor-work.edit');
    Route::post('/pembina/mentor-work/update', [PembinaController::class, 'mentorWorkUpdate'])->name('pembina.mentor-work.update');
    Route::get('/pembina/mentor-work/destroy/{id}', [PembinaController::class, 'mentorWorkDestroy'])->name('pembina.mentor-work.destroy');

    // SKU
    Route::get('/pembina/sku', [PembinaController::class, 'sku'])->name('pembina.sku');
    Route::get('/pembina/sku/detail/{id}', [PembinaController::class, 'skuDetail'])->name('pembina.sku.detail');
    Route::get('/pembina/sku/approve/{id}', [PembinaController::class, 'skuApprove'])->name('pembina.sku.approve');
    Route::get('/pembina/sku/reject/{id}', [PembinaController::class, 'skuReject'])->name('pembina.sku.reject');
});
