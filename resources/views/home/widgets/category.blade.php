<!-- Page Content -->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://cdn.pp.slimpay.com/blog/2018/03/16120229/DZN-Blog-Hero-900x350-4-idees-recus.jpg'); background-repeat: no-repeat; background-size: cover;height:500px;width: expression(this.width > 500 ? 500: true);">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex container">

            <!-- Content -->
            <div class="float-bottom text-left text-white mx-5 wow fadeIn" style="position:absolute;bottom:0;">
              <h1 class="mb-4">
                <strong>Learn Bootstrap 4 with MDB</strong>
              </h1>

              <p>
                <strong>Best & free guide of responsive web design</strong>
              </p>
              <br>
              <p class="mb-4 d-none d-md-block">
              </p>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://d2xhqqdaxyaju6.cloudfront.net/file/teaser-s/374849/5f/s-1200-630.jpg'); background-repeat: no-repeat; background-size: cover;height:500px;width: expression(this.width > 500 ? 500: true);">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex container justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center text-white mx-5 wow fadeIn" style="position:absolute;bottom:0;">
              <h1 class="mb-4">
                <strong>Learn Bootstrap 4 with MDB</strong>
              </h1>

              <p>
                <strong>Best & free guide of responsive web design</strong>
              </p>
              <br>
              <br>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://2ropuv2ohhjf1cyaboansig1-wpengine.netdna-ssl.com/wp-content/uploads/2018/10/banner-3-1540x500.jpg');background-size: cover; background-repeat: no-repeat; height:500px;width: expression(this.width > 500 ? 500: true);">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex container align-items-right">

            <!-- Content -->
            <div class="text-right text-white mx-5 wow fadeIn" style="position:absolute;bottom:0;">
              <h1 class="mb-4">
                <strong>Learn Bootstrap 4 with MDB</strong>
              </h1>

              <p>
                <strong>Best & free guide of responsive web design</strong>
              </p>
              <br>
              <br>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>

<div class="container">
  <div class="row">


<div class="col-lg-4">

  <h1 class="my-4">Kategoriler</h1>
  <div class="list-group">
    @foreach ($categories as $category)
        <a href="{{route('category',$category->slug)}}" class="list-group-item @if(Request::segment(2)==$category->slug) active @endif)">
          <strong>{{$category->name}}</strong>
          <span class="badge badge-pill badge-dark float-right">{{$category->productCount()}}</span>
        </a>
    @endforeach
  </div>

</div>
