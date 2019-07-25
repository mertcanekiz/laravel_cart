<div class="card my-3">
    <img class="card-img card-img-top" src="{{$product->image_url}}?random={{$index}}" alt="">
    <div class="card-body">
        <a href="{{route('products.show', ['product' => $product])}}" class="card-link"><h5 class="card-title">{{$product->title}}</h5></a>
        <div class="card-text">{{$product->description}}</div>
        <div class="row mt-3">
            <div class="col">
                <a href="{{route('products.edit', compact('product'))}}" class="btn btn-block btn-outline-primary">Edit</a>
            </div>
            <div class="col">
                <button type="button" class="btn btn-block btn-outline-danger"  data-toggle="modal" id="delete-button-{{$product->id}}">Delete</button>
                <div class="d-none" id="delete-form">
                    <form action="{{route('products.destroy', compact('product'))}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>