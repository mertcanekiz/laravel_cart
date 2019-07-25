@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           @component('products.components.product', ['index' => 0, 'product' => $product])
           @endcomponent
        </div>
    </div>
</div>
@endsection
