<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\voter\VoterController;
use App\Http\Controllers\voter\ProfileController;
use App\Http\Controllers\Redirector;
use App\Http\Controllers\candidate\CandidateController;
use App\Http\Controllers\PollAnswerController;
use App\Http\Controllers\PollController;
use App\Models\PollAnswer;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [PollController::class, 'index']);
    Route::get('/create', [PollController::class, 'create']);
    Route::post('/add', [PollController::class, 'store']);
    Route::get('/show/{id}', [PollController::class, 'show']);
    Route::resource('vote', PollAnswerController::class);
    Route::get('/result/{id}', [PollAnswerController::class, 'show']);
});



/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

Route::get('/dashboard', [Redirector::class, 'index'])->name('dashboard');


Route::get('/admin_dashboard', [AdminController::class, 'index'])->middleware('role:admin');
Route::get('/admin_departments', [AdminController::class, 'departments'])->middleware('role:admin')->name('departments');
Route::post('/admin_departments', [AdminController::class, 'store'])->middleware('role:admin')->name('storedepartments');
Route::delete('/admin_departments/{id}', [AdminController::class, 'destroy'])->middleware('role:admin')->name('destroydepartments');
Route::get('/edit_department/{id}/edit', [AdminController::class, 'edit'])->middleware('role:admin')->name('editdepartments');
Route::patch('/update_department/{id}', [AdminController::class, 'update'])->middleware('role:admin')->name('updatedepartments');

// resource route for positions table
Route::resource('admin_positions', PositionController::class, [
    'names' => [
        'index' => 'admin_positions',
    ]
])->middleware('role:admin');

// resource route for profile
Route::resource('profile', ProfileController::class)->middleware('role:voter');


Route::get('/admin_nominees', [AdminController::class, 'nominees'])->middleware('role:admin,candidate')->name('nominees');
Route::patch('/admin_nominees/{id}', [AdminController::class, 'approve'])->middleware('role:admin,candidate')->name('nominees.approve');
Route::delete('/admin_nominees/{id}', [AdminController::class, 'decline'])->middleware('role:admin,candidate')->name('nominees.decline');

Route::get('/voter_dashboard', [VoterController::class, 'index'])->middleware('role:voter,candidate')->name('voter.dashboard');
Route::post('/voter_dashboard', [VoterController::class, 'store'])->middleware('role:voter,candidate')->name('voter.apply');
Route::get('/apply', [VoterController::class, 'apply'])->middleware('role:voter')->name('apply');

Route::get('/candidate_dashboard', [CandidateController::class, 'index'])->middleware('role:candidate')->name('candidate.dashboard');
Route::get('/candidate_dashboard_compaign', [CandidateController::class, 'compaign'])->middleware('role:candidate')->name('candidate.compaign');
require __DIR__ . '/auth.php';
