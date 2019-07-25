@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('products.update', ['product' => $product])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old("title") ?: $product->title }}" required autocomplete="title" autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required autocomplete="description">{{old("description") ?: $product->description}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image_url" class="col-form-label">Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{old("image_url") ?: $product->image_url }}" class="form-control @error('image_url') is-invalid @enderror" required autocomplete="image_url">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
