@extends('components.layout')

@section('content')
    <h3>Create new ingredient</h3>

    <form action="{{ url('admin/ingredients/save') }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Ingredient name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ingredient name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Ar aktyvuoti ingredientą?</label><br>
            <input type="checkbox" name="is_active" value="1">
        </div>

        <div class="col-12 mt-2">
            <input type="submit" class="btn btn-info" value="Save">
        </div>

    </form>
@endsection
