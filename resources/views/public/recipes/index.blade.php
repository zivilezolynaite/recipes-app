@extends('components.min_layout')

@section('title', 'Recipes')

@section('content')
    <h1>Newest recipes</h1>

    @include('components.alert.success_message')
    @include('components.alert.error_message')

    <table class="table">
        <tr>
            <th scope="col" width="100">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
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
                    <img src="{{ asset('recipe_images/' . $recipe->image) }}" width="30%">
                </td>
            </tr>
        @endforeach
    </table>
@endsection
