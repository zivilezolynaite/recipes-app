<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Public\BookController as PublicBookController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\Public\RecipeController as PublicRecipeController;
// prideti ingredient controller, aplankale: views (resources/views), controller (app/http/controllers), model failas (app/models), web.php (routes) - viska surisa ir aisku DBEAVERi reikia sukurti nauja lentele, koki ingredientai;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [PublicRecipeController::class, 'index']);
Route::get('recipes', [PublicRecipeController::class, 'list']);
Route::get('recipes/{id}', [PublicRecipeController::class, 'show']);

Route::prefix('admin')->group(function () {
    Route::get('recipes', [RecipeController::class, 'index'])->middleware(['auth']);
    Route::get('recipes/create', [RecipeController::class, 'create'])->middleware(['auth']);
    Route::post('recipes/save', [RecipeController::class, 'save'])->middleware(['auth']);
    Route::any('recipes/edit/{id}', [RecipeController::class, 'edit'])->name('recipes.edit')->middleware(['auth']);
    Route::delete('recipes/delete/{id}', [RecipeController::class, 'delete'])->name('recipes.delete')->middleware(['auth']);
    Route::get('recipes/{id}', [RecipeController::class, 'show'])->whereNumber('id')->middleware(['auth']);

    Route::get('categories', [CategoryController::class, 'index'])->middleware(['auth']);
    Route::any('categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth']);
    Route::get('categories/create', [CategoryController::class, 'create'])->middleware(['auth']);
    Route::post('categories/create', [CategoryController::class, 'store'])->middleware(['auth']);
    Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware(['auth']);
    Route::get('categories/{id}', [CategoryController::class, 'show'])->middleware(['auth']);

    Route::get('ingredients', [IngredientController::class, 'index'])->middleware(['auth']);
    Route::get('ingredients/create', [IngredientController::class, 'create'])->middleware(['auth']);
    Route::post('ingredients/save', [IngredientController::class, 'save'])->middleware(['auth']);
    Route::any('ingredients/edit/{id}', [IngredientController::class, 'edit'])->name('ingredients.edit')->middleware(['auth']);
    Route::delete('ingredients/delete/{id}', [IngredientController::class, 'delete'])->name('ingredients.delete')->middleware(['auth']);
    Route::get('ingredients/{id}', [IngredientController::class, 'show'])->whereNumber('id')->middleware(['auth']);

    Route::get('profile', [UserController::class, 'show'])->middleware(['auth', 'role'])->name('profile');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'show'])->name('login'); //renderina login formą
    Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate'); //submitina formą
});

Route::get('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
