
@foreach ($products as $product)
<div class="col-lg-4 col-md-4 my-3">
  <div class="card h-100">
    <a href="{{route('single',$product->id)}}"><img class="card-img-top" style="height:300px;max-width:500px;width: expression(this.width > 500 ? 500: true);" src="{{asset($product->image)}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="{{route('single',$product->id)}}">{{$product->title}}</a>
      </h4>
      <h5>{{$product->price}}&#x20BA;</h5>
      <p class="card-text">{!!Str::limit($product->content,90)!!}</p>
    </div>
  </div>
</div>
@endforeach
    {{$products->links('pagination::bootstrap-4')}}
