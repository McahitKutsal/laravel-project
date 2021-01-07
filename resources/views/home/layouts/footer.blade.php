</div>
<!--/// /.row -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
  <div class="row float-right">
    <div class="col col-sm-4">
        <h3 class="m-0 text-center text-white">
          <i class="fas fa-fw fa-paper-plane mr-2"></i> İletişim Bilgilerimiz</h3>
    </div>
    <div class="col col-sm-4">
      <span class="m-0 text-center text-white">
        <i class="fas fa-fw fa-home mr-2"></i>{{$contacts->adres}}</span>
    </div>
    <div class="col col-sm-4">
        <span class="m-0 text-center text-white">
          <i class="fas fa-fw fa-phone mr-2"></i> Tel: {{$contacts->telefon}}</span>
    </div>
  </div>
</div>
<br><br>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('home/')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('home/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
