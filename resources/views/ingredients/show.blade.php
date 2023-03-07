@extends('components.layout')

@section('content')
    <h3>Ingredient preview</h3>

    <form action="{{ url('ingredients/edit', ['id' => $recipe->id]) }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Ingredient name:</label>
            {{ $ingredient->name }}
        </div>

        <div clas="col-12">
            <label class="form-label">Description:</label>
            {{ $ingredient->description }}
        </div>

        <div class="col-12">
            <label class="form-label">Category:</label>
            {{ $ingredient->category()->get()->first()->name }}
        </div>

    </form>
@endsection
