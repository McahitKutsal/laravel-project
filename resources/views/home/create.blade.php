@extends('home.adminlayouts.master')
@section('title','Ürün Girişi')
@section('content')
  <div class="card shadow mb-4">
      <div class="card-header py-3">

      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
            </div>
        @endif
        <form method="post" action="{{route('urunler.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group" required>
            <label>Ürün Başlığı</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}"  required>
          </div>
          <div class="form-group">
            <label>Ürün Fiyatı</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{old('price')}}" required>
          </div>
          <div class="form-group">
            <label>Ürün Altbaşlığı</label>
              <input type="text" name="content" class="form-control"  value="{{old('content')}}" required>
          </div>
          <div class="form-group">
            <label>Ürün İçeriği 1</label>
            <textarea type="text" name="content2" class="form-control summernote" required>{{old('content2')}}</textarea>
          </div>
          <div class="form-group">
            <label>Ürün İçeriği 2</label>
            <textarea type="text" name="content3" class="form-control summernote" required>{{old('content3')}}</textarea>
          </div>
          <div class="form-group">
            <label>Ürün İçeriği 3</label>
            <textarea type="text" name="content4" class="form-control summernote" required>{{old('content4')}}</textarea>
          </div>
          <div class="form-group">
            <label>Kategori Seçiniz</label>
            <select class="form-control" name="category" value="{{old('category')}}" required>
              <option value="">Seçiniz</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group" required>
            <label>Ürün Fotoğrafı</label>
            <input type="file" name="image" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary btn-block">Ürünü Ekle</button>
          </div>
        </form>
      </div>
  </div>
@endsection
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.summernote').summernote({
      'height':100
    });
  });
  </script>
@endsection
