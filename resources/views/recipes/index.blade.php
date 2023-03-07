@extends('components.layout')

@section('title', 'Recipes')

@section('content')
    <h1>Recipes</h1>

    @include('components.alert.success_message')

    <div class="row">
        <div class="col">
            <a href="{{ url('admin/recipes/create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope='col'>Image</th>
            <th scope="col">Is active?</th>
            <th scope="col">Category</th>
            <th scope="col" width="100">Edit</th>
            <th scope="col" width="100">Delete</th>
        </tr>
        @foreach($recipes as $recipe)
            <tr>
                <th scope="row">{{ $recipe->id }}</th>
                <td>
                    <a href="{{ url('admin/recipes', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                </td>
                <td>
                    <img src="{{ asset('recipe_images/' . $recipe->image) }}" width="30%">
                </td>
                <td>
                    @if($recipe->is_active)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    @if($recipe->category()->get()->first())
                        {{ $recipe->category()->get()->first()->name }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('recipes.edit', ['id' => $recipe->id]) }}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{ route('recipes.delete', ['id' => $recipe->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
