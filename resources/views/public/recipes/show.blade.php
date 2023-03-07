@extends('components.min_layout')

@section('content')
    <h3>{{ $recipe->name }}</h3>

        <div clas="col-12">
            <label class="form-label">Description:</label>
            {{ $recipe->description }}
        </div>

        <div clas="col-12">
            <label class="form-label">Ingredients:</label><br/>
            @foreach ($recipe->ingredients()->get()->all() as $ingredient)
                {{ $loop->iteration }}. {{  $ingredient->name }}<br/>
            @endforeach
        </div>

        <div class="col-12">
            <label class="form-label">Category:</label>
            {{ $recipe->category()->get()->first()->name }}
        </div>

        <td>
            <img src="{{ asset('recipe_images/' . $recipe->image) }}">
        </td>
@endsection
