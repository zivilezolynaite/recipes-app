@extends('components.layout')

@section('title', 'Create category')

@section('content')
<h3>Create new category</h3>

<form action="{{ url('admin/categories/create') }}" method="post" class="row g-3">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
    <div class="col-12">
        <label class="form-label">Category name:</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Category name">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Do you want to activate category?</label><br>
        <input type="checkbox" name="is_active" value="1" checked>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-info">Save</button>
    </div>
</form>
@endsection
