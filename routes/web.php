<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PeopleGalleryController;
use App\Http\Controllers\PeopleSearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StamboomController;
use App\Models\People;
use Illuminate\Database\Eloquent\Relations\Relation;
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

Route::get('/', function () {
    return view('welcome' , [
        'people' => People::all()
    ]);
});
Route::get('/map', [PeopleSearchController::class, 'index'])->name('map');
Route::get('/search', [PeopleSearchController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
    // Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create')->middleware('check.beheerder');
    // Route::post('/people', [PeopleController::class, 'store'])->name('people.store')->middleware('check.beheerder');

    Route::get('/people/create', [PeopleController::class, 'create'])->name('people.create');
    Route::post('/people', [PeopleController::class, 'store'])->name('people.store');
    Route::get('/people/{people}', [PeopleController::class, 'show'])->name('people.show');
    Route::get('/people/{people}/edit', [PeopleController::class, 'edit'])->name('people.edit');
    Route::put('/people/{people}', [PeopleController::class, 'update'])->name('people.update');
    Route::delete('/people/{people}', [PeopleController::class, 'destroy'])->name('people.destroy');

    Route::get('/people/{people}/parents', [PeopleController::class, 'parents'])->name('people.parents');
    Route::get('/people/{people}/children', [PeopleController::class, 'children'])->name('people.children');

    Route::get('/people/add-parent', [Relation::class, 'addParent'])->name('people.add-parent');
    Route::get('/people/{id}/add-relation', [PeopleController::class, 'createRelation'])->name('people_relation.create');
    Route::post('/people/{id}/add-relation', [PeopleController::class, 'storeRelation'])->name('people_relation.store');




    /*
    Route::resource('people_history', PeopleController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::get('/people/{people}/history', [PeopleController::class, 'history'])->name('people.history');
    Route::get('/people/{people}/history/create', [PeopleController::class, 'create'])->name('people.history.create');
    Route::post('/people/{people}/addhistory', [PeopleController::class, 'store'])->name('people.history.store');
    Route::delete('/people/{people}/history/{history}', [PeopleController::class, 'destroyHistory'])->name('people.history.destroy');



    Route::resource('people_gallery', PeopleGalleryController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::get('/people/{people}/gallery', [PeopleGalleryController::class, 'gallery'])->name('people.gallery');
    Route::get('/people/{people}/gallery/create', [PeopleGalleryController::class, 'create'])->name('people.gallery.create');
    Route::post('/people/{people}/addgallery', [PeopleGalleryController::class, 'store'])->name('people.gallery.store');
    Route::delete('/people/{people}/gallery/{gallery}', [PeopleGalleryController::class, 'destroyGallery'])->name('people.gallery.destroy');
 */   
});

require __DIR__.'/auth.php';
