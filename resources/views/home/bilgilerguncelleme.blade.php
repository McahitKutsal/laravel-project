@extends('home.adminlayouts.master')
@section('title','İletişim bilgileri')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">İletişim Bilgileri</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Adres</th>
                        <th>Telefon</th>
                        <th>Son Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Adres</th>
                        <th>Telefon</th>
                        <th>Son Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>
                          {!!$contact->adres!!}
                        </td>
                        <td>{!!$contact->telefon!!}</td>
                        <td>{!!$contact->updated_at!!}</td>
                        <td>
                            <a class="btn btn-sum btn-primary edit-click" contact-id="{{$contact->id}}" title="Düzenle"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Logout Modal-->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bilgileri Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.contact.updateContact')}}" method="post">
          @csrf
          <div class="form-group">
            <label>Yeni Adres</label>
            <input type="text" name="adres" id="adres" class="form-control">
            <input type="hidden" name="id" id="adres_data" class="form-control">
          </div>
          <div class="form-group">
            <label>Yeni Telefon</label>
            <input type="text" name="telefon" id="telefon" class="form-control">
            <input type="hidden" name="id" id="telefon_data" class="form-control">
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

@endsection
@section('js')
  <script type="text/javascript">
    $(function() {
      $('.edit-click').click(function(){
        id = $(this).attr('contact-id');
        $.ajax({
          type:'GET',
          url:'{{route('admin.contact.getdata')}}',
          data:{id:id},
          success:function(data){
            $('#adres').val(data.adres);
            $('#telefon').val(data.telefon);
            $('#editModal').modal();
          }
        })
      })
    })
  </script>
@endsection
