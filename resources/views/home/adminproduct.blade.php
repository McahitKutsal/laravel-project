@extends('home.adminlayouts.master')
@section('title','Mevcut Tüm Ürünler')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$products->count()}} Ürün Bulundu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Fiyat</th>
                        <th>Açıklama</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>Fiyat</th>
                        <th>Açıklama</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{asset($product->image)}}" alt="" width="120">
                        </td>
                        <td>{!!$product->title!!}</td>
                        <td>{!!$product->price!!}</td>
                        <td>{!!Str::limit($product->content,60)!!}</td>
                        <td>{!!$product->created_at!!}</td>
                        <td>
                            <a href="{{route('single',$product->id)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('urunler.edit',$product->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{$product->id}}"><i class="fa fa-trash"></i></a>
                            <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Çıkmak istediğinize emin misiniz?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Hayır">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hayır</button>
                                            <form action="{{route('urunler.destroy',$product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Sil" class="btn btn-sm btn-danger ml-4 mt-1"><i class=""></i>Ürünü Sil</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Logout Modal-->

@endsection
