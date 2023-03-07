@extends('components.layout')

@section('content')
    <h3>Edit new recipe</h3>

    <form action="{{ url('admin/recipes/edit', ['id' => $recipe->id]) }}" method="post" class="row g-3">
        @csrf
        <div class="col-12">
            <label class="form-label">Recipe name:</label>
            <input type="text" name="name" value="{{ old('name', $recipe->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Recipe name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div clas="col-12">
            <label class="form-label">Description:</label>
            <textarea id="Description" name="description" rows="4" cols="50" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>
        </div>

        <div class="col-12">
            <label class="form-label">Category:</label>
            <select name="category" class="form-control @error('category_id') is-invalid @enderror">
                @foreach($categories as $category)
                    <option @if(old('category', $recipe->category()->get()->first() ? $recipe->category()->get()->first()->id : null) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="col-12">
            <label class="form-label">Ingredients:</label>
            <select name="ingredient[]" class="form-control" multiple>
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}"
                            @if(in_array($ingredient->id, $recipe->ingredients()->pluck('ingredient_id')->toArray()))
                                selected
                            @endif
                    >{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label class="form-label">File</label>
            <input type="file" name="image" class="form-control @error('description') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Do you want to activate recipe?</label><br>
            <input type="checkbox" name="is_active" value="1" @if($recipe->is_active) checked @endif>
        </div>

        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-info">Save</button>
        </div>
    </form>
@endsection
