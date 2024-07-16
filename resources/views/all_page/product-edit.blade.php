@extends('layout.app')
@extends('layout.navbar-sidebar')

@section('title', 'Create Projects')
@section('content')
    <h1>Edit Products</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">ProductName</label>
                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror
                        id="name" placeholder="Name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" @error('description') is-invalid @enderror id="description"
                        placeholder="description"> {{ old('description', $product->description) }} </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" @error('image') is-invalid @enderror
                        id="image" placeholder="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control" @error('barcode') is-invalid @enderror
                        id="barcode" placeholder="barcode" value="{{ old('barcode', $product->barcode) }}">
                    @error('barcode')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" @error('price') is-invalid @enderror
                        id="price" placeholder="price" value="{{ old('price', $product->price) }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" @error('status') is-invalid @enderror id="status">
                        <option value="1" {{ old('status', $product->status) === 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) === 0 ? 'selected' : '' }}>InActive
                        </option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
