@extends('home.singlelayouts.master')
@section('content')
@include('home.widgets.menu')
@include('home.widgets.category')
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="{{asset($products->image)}}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$products->title}}</h3>
            <h4>{{$products->price}}</h4>
            <p class="card-text">{!!$products->content!!}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Ürün bilgileri
          </div>
          <div class="card-body">
            <p>{!!$products->content2!!}</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>{!!$products->content3!!}</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>{!!$products->content4!!}</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <form>
              <input type="button" value="Geri !" onclick="history.back()" class="btn btn-success">
            </form>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

@endsection
