@extends('components.layout')

@section('content')
    <h3>Create new recipe</h3>

    <form action="{{ url('admin/recipes/save') }}" method="post" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label class="form-label">Recipe name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Recipe name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div clas="col-12">
            <label class="form-label">Description:</label>
            <textarea id="Description" name="description" rows="4" cols="50" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Category:</label>
            <select name="category" class="form-control @error('description') is-invalid @enderror">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Ingredients:</label>
            <select name="ingredient[]" class="form-control @error('description') is-invalid @enderror" multiple>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
            @error('ingredient')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">File</label>
            <input type="file" name="image" class="form-control @error('description') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Ar aktyvuoti receptą?</label><br>
            <input type="checkbox" name="is_active" value="1">
            @error('is_active')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mt-2">
            <input type="submit" class="btn btn-info" value="Save">
        </div>

    </form>
@endsection
