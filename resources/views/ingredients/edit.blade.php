@extends('components.layout')

@section('content')
    <h3>Edit new ingredient</h3>

    <form action="{{ url('admin/ingredients/edit', ['id' => $ingredient->id]) }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Ingredient name:</label>
            <input type="text" name="name" value="{{ old('name', $ingredient->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ingredient name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Do you want to activate ingredient?</label><br>
            <input type="checkbox" name="is_active" value="1" @if($ingredient->is_active) checked @endif>
        </div>

        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
