@extends('components.min_layout')

@section('title', 'Recipes')

@section('content')
    <h1>All recipes</h1>

    @include('components.alert.success_message')

    <form method="get">
        <label for="category">Filter by category</label>
        <select name="category[]" id="category" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if (in_array($category->id, request()->get('category', [])))
                        selected
                    @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>
        <br/>
        <label for="name">Filter by name</label>
        <input type="text" name="name" value="{{ request()->get('name') }}" /><br/>
        <input type="submit" value="Filter" />
    </form>

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
        </tr>
        @foreach($recipes as $recipe)
            <tr>
                <th scope="row">{{ $recipe->id }}</th>
                <td>
                    <a href="{{ url('recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                </td>
                <td>
                    @if($recipe->category()->get()->first())
                        {{ $recipe->category()->get()->first()->name }}
                    @endif
                </td>
                <td>
                    <img src="{{ asset('recipe_images/' . $recipe->image) }}">
                </td>
            </tr>
        @endforeach
    </table>
    <div class="row">
        <div class="col">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection
