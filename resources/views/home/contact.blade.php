@extends('home.layouts.master')
@include('home.widgets.menu')
@section('content')


  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="page-heading">
        @if (session('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
        @endif
          <img src="{{asset('uploads/contact-bg.jpg')}}" style="background-repeat: no-repeat; background-size: cover;height:500px;width: expression(this.width > 500 ? 500: true);">

      <h1>Mesaj gönderin.</h1>
      <br>
      <hr>
    </div>
  </div>


  <div class="col-lg-8 col-md-10 mx-auto">
    <p>Aşağıdaki alanları doldurunuz.</p>
    <form method="post" action="{{route('contact.post')}}">
      @csrf
      <div class="control-group">
        <div class="form-group">
          <label>Ad Soyad</label>
          <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label>E-posta Adresi</label>
          <input type="email" class="form-control" value="{{old('email')}}" name="email" required>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12">
          <label>Konu</label>
          <select class="form-control" value="{{old('topic')}}" name="topic">
            <option @if(old('topic') == 'Bilgi') selected @endif  >Bilgi</option>
            <option @if(old('topic') == 'Destek') selected @endif >Destek</option>
            <option @if(old('topic') == 'Genel') selected @endif >Genel</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group">
          <label>Mesajınız</label>
          <textarea rows="5" class="form-control" name="message" required>{{old('message')}}</textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <br>
      <div id="success"></div>
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
    </form>
  </div>

<hr>

@endsection
