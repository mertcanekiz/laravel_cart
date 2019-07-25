@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           @foreach($products as $index=>$product)
               @component('products.components.product', ['index' => $index, 'product' => $product])
               @endcomponent
           @endforeach
        </div>
    </div>
</div>
@endsection
