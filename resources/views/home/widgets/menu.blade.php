<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity: 0.9">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}">Anasayfa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @foreach ($pages as $page)
            <li class="nav-item">
              <a class="nav-link" @if ($page->slug=='urunlerimiz') href="{{route('index')}}"@else href="{{route('page',$page->slug)}} @endif ">{{$page->title}}</a>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>
