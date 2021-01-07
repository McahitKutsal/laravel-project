@extends('home.adminlayouts.master')
@section('title','Sayfa Güncelle')
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
        <form method="post" action="{{route('admin.page.insert')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group" required>
            <label>Sayfa Başlığı</label>
            <input type="text" name="title" class="form-control" value="{{$page->title}}"  required>
            <input type="hidden" name="id" value="{{$page->id}}">
          </div>
          <div class="form-group">
            <label>Sayfa İçeriği</label>
            <textarea type="text" name="content" class="form-control summernote" required>{{$page->content}}</textarea>
          </div>
          <div class="form-group" required>
            <label>Sayfa Fotoğrafı</label><br>
            <img src="{{asset($page->image)}}" width="300" class="rounded img-thumbnail">
            <input type="file" name="image" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary btn-block">Sayfayı Güncelle</button>
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
