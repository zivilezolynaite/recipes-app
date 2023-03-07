@extends('components.layout')

@section('content')
    <h3>Recipe preview</h3>

    <form action="{{ url('recipes/edit', ['id' => $recipe->id]) }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Recipe name:</label>
            {{ $recipe->name }}
        </div>

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

        <div class="col-12">
            <label class="form-label">Is active?</label>
            @if($recipe->is_active)
                Yes
            @else
                No
            @endif
        </div>

    </form>
@endsection
