<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IngredientController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::paginate(10);

        return view('ingredients/index', [
            'ingredients' => $ingredients
        ]);
    }

    public function show($id): View
    {
        $ingredient = Ingredient::find($id);

        return view('ingredients/show', [
            'ingredient' => $ingredient
        ]);
    }

    public function create(): View
    {
        $categories = Category::where('is_active', '=', true)
            ->get();

        return view('ingredients/create', [
            'categories' => $categories
        ]);
    }

    public function delete(Request $request, int $id): RedirectResponse|View
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();

        return redirect('admin/ingredients')
        ->with('success', 'Ingredient deleted successfully!');
    }

    public function save(Request $request): RedirectResponse|View
    {
        //1.Reikia papildyti faila mygtuku <input type=file;
        //
        // dd('abc');

        // $request->validate(
        //     [
        //         'name' => 'required|min:3|max:50',
        //         'category' => 'required',
        //         'description' => 'required',
        //     ]
        // );

        $ingredient = Ingredient::create($request->all());

        return redirect('admin/ingredients')
            ->with('success', 'Ingredient created successfully!');
    }

    public function edit(Request $request, int $id): View|RedirectResponse
    {
        $ingredient = Ingredient::find($id);

        $categories = Category::where('is_active', '=', true)
            ->get();

        if ($ingredient === null) {
            abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate(
                [
                    'name' => 'required|min:3|max:50',
                ]
            );

            $data = $request->all();
            if (!isset($data['is_active'])) {
                $data['is_active'] = 0;
            }

            $ingredient->update($data);

            return redirect('admin/ingredients')->with('success', 'Ingredient updated!');
        }

        return view('ingredients/edit', [
            'ingredient' => $ingredient,
            'categories' => $categories
        ]);
    }
}
