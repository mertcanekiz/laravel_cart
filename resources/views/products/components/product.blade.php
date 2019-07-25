<div class="card my-3">
    <img class="card-img card-img-top" src="{{$product->image_url}}?random={{$index}}" alt="">
    <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <div class="card-text">{{$product->description}}</div>
    </div>
</div>