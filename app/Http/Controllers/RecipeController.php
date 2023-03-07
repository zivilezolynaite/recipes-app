<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
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
        $recipes = Recipe::paginate(10);

        return view('recipes/index', [
            'recipes' => $recipes
        ]);
    }

    public function show($id): View
    {
        $recipe = Recipe::find($id);

        return view('recipes/show', [
            'recipe' => $recipe
        ]);
    }

    public function create(): View
    {
        $categories = Category::where('is_active', '=', true)
            ->get();

        $ingredients = Ingredient::where('is_active', '=', true)
            ->get();

        return view('recipes/create', [
            'categories' => $categories,
            'ingredients' => $ingredients,
        ]);
    }

    public function delete(Request $request, int $id): RedirectResponse|View
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        return redirect('admin/recipes')
        ->with('success', 'Recipe deleted successfully!');
    }

    public function save(Request $request): RedirectResponse|View
    {

        //1.Reikia papildyti faila mygtuku <input type=file;
        //
        // dd('abc');

        $request->validate(
            [
                'name' => 'required|min:3|max:50',
                'category' => 'required',
                'description' => 'required',
                'image' => 'required',
                'ingredient' => 'required',
            ]
        );


        $data = $request->all();

        $file = $request->file('image');
        $path = rand(1000000, 9999999) . '-' . $file->getClientOriginalName('recipe_images');
        $file->move(public_path() . '/recipe_images', $path);
        //$path = St;orage::disk('public')->put('recipes_public', $file);

        $recipe = new Recipe();
        $recipe->save();
        $recipe->ingredients()->sync($data['ingredient']);
        $recipe->fill($data);
        $recipe->image = $path;
        $recipe->save();

        return redirect('admin/recipes')
            ->with('success', 'Recipe created successfully!');
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $recipe = Recipe::find($id);

        $categories = Category::where('is_active', '=', true)
            ->get();

        $ingredients = Ingredient::where('is_active', '=', true)
            ->get();

        if ($recipe === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'name' => 'required|min:3|max:50',
                    'category' => 'required',
                    'description' => 'required',
                    'image' => 'required',
                    'ingredient' => 'required',
                ]
            );

            $data = $request->all();
            if (!isset($data['is_active'])) {
                $data['is_active'] = 0;
            }

            $recipe->ingredients()->sync($data['ingredient']);
            $recipe->update($data);

            return redirect('admin/recipes')->with('success', 'Recipe updated!');
        }

        return view('recipes/edit', [
            'recipe' => $recipe,
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);

    }
}
