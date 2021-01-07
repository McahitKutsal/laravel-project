@extends('home.adminlayouts.master')
@section('title','Mevcut Tüm Sayfalar')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hakkımızda Sayfası</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Son Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Son Güncelleme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>
                            <img src="{{asset($page->image)}}" alt="" width="120">
                        </td>
                        <td>{!!$page->title!!}</td>
                        <td>{!!$page->updated_at!!}</td>
                        <td>
                            <a href="{{route('page',$page->slug)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.page.update',$page->slug)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Logout Modal-->

@endsection
