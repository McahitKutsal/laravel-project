@extends('home.layouts.master')
@section('content')
  @include('home.widgets.menu')
  <!-- Page Content -->
  <div class="container">
    <div class="row">
  <div class="h-75">
    <img src="{{asset($page->image)}}" class="img-thumbnail img-fluid">
  </div>
          <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="section-heading">{{$page->title}}</h2>
            <p>{!!$page->content!!}</p>
           </div>

@endsection
