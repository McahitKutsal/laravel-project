@extends('home.adminlayouts.master')
@section('title','Kategoriler')
@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
        </div>
        <div class="card-body mx-auto">
            <form class="" action="{{route('admin.category.create')}}" method="post">
              @csrf
              <div class="form-group text-center">
                <label class="text-center">Kategori Adı</label>
                <input type="text" class="form-control" name="category" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
              </div>
            </form>
        </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mevcut Kategoriler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>İsim</th>
                            <th>Ürün Sayısı</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>İsim</th>
                          <th>Ürün Sayısı</th>
                          <th>İşlemler</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                              {!!$category->name!!}
                            </td>
                            <td>{{$category->productCount()}}</td>
                            <td>
                              <a class="btn btn-sum btn-primary edit-click" category-id="{{$category->id}}" title="Düzenle"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-sum btn-danger remove-click" category-id="{{$category->id}}" category-count="{{$category->productCount()}}" title="Sil"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategoriyi Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.category.update')}}" method="post">
          @csrf
          <div class="form-group">
            <label>Kategorinin Yeni Adı</label>
            <input type="text" name="category" id="category" class="form-control">
            <input type="hidden" name="id" id="category_id" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silmek istediğinize emin misiniz?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert alert-danger"  id="alertBody">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Kapat</button>
        <form action="{{route('admin.category.delete')}}" method="post">
          @csrf
          <input type="hidden" name="id" id="deleteid">
          <button type="submit" class="btn btn-primary">Sil</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script type="text/javascript">
    $(function() {
      $('.edit-click').click(function(){
        id = $(this).attr('category-id');
        $.ajax({
          type:'GET',
          url:'{{route('admin.category.getdata')}}',
          data:{id:id},
          success:function(data){
            $('#category').val(data.name);
            $('#category_id').val(data.id);
            $('#editModal').modal();
          }
        })
      })
      $('.remove-click').click(function(){
        id = $(this).attr('category-id');
        count = $(this).attr('category-count');
        $('#deleteid').val(id);
        $('#alertBody').hide();
        if (count>0) {
          $('#alertBody').show();
          $('#alertBody').html("Bu kategoriye ait "+count+" adet ürün kategori ile birlikte silinecek !!!");
          $('#deleteModal').modal();
        }else {
          $('#deleteModal').modal();
        }
      })
    })
  </script>
@endsection
