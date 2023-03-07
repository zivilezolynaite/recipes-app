<?php

//1. Reikia papildyti forma mygtuku <input type=file;
//2. Pakeisti formos tipa, nes paprastos formos neleis talpinti;
//3. Pasiziureti requesta
//4. patalpinti faila
//5. prie recepto prisideti lauka skirta failo  path: migracija;
//6. galesim pasaugoti recipe image value prie duomenu bazes;
//7. pabandysim nuotrauka atvaizduoti template, tam reikes naudoti symlinkus ir assetus.

namespace App\Http\Controllers\Public;

use App\Models\Author;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::where('is_active', '=', true)->orderBy('created_at', 'DESC')->limit(10)->get()->all();

        return view('public/recipes/index', [
            'recipes' => $recipes
        ]);
    }

    public function list(Request $request): View
    {
        $recipes = Recipe::where('is_active', '=', true);

        if ($nameFilter = $request->get('name')) {
            $recipes = $recipes->where('name', 'LIKE', '%' . $nameFilter . '%');
        }

        if ($categoryFilter = $request->get('category', [])) {
            $recipes = $recipes->whereIn('recipes.category', $categoryFilter);
        }

        $recipes = $recipes->paginate(10);

        $categories = Category::where('is_active', '=', true)->get()->all();

        return view('public/recipes/list', [
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::where('is_active', '=', true)->where('id', '=', $id)->get()->first();
        if (!$recipe) {
            return redirect('/')
                ->with('error', 'Recipe does not exist');
        }

        return view('public/recipes/show', [
            'recipe' => $recipe
        ]);
    }

}
