@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('products.store')}}" method="post">
                @csrf
                <h3>Product details</h3>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old("title")}}" required autocomplete="title" autofocus>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" id="description" value="{{old("description")}}" class="form-control @error('description') is-invalid @enderror" required autocomplete="description"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image_url" class="col-form-label">Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{old("image_url")}}" class="form-control @error('image_url') is-invalid @enderror" required autocomplete="image_url">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="dropdown-divider"></div>
                <h3>Options</h3>
                <div id="options"></div>
                <button id="add-option-button" type="button" class="btn btn-outline-secondary btn-block">Add option</button>
                <div class="dropdown-divider"></div>
                <h3>Prices</h3>
                <div id="prices"></div>
                <div class="form-row">
                    <div class="col">
                        <button id="add-price-button" type="button" class="btn btn-outline-secondary btn-block">Add price</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{asset('js/createProduct.js')}}"></script>
@endsection
