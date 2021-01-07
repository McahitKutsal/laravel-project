@extends('home.adminlayouts.master')
@section('title','Mevcut Tüm Ürünler')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$messages->count()}} Ürün Bulundu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>E-posta</th>
                        <th>Mesaj</th>
                        <th>Açıklama</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>İsim</th>
                        <th>E-posta</th>
                        <th>Mesaj</th>
                        <th>Açıklama</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>
                            {!!$message->name!!}
                        </td>
                        <td>{!!$message->email!!}</td>
                        <td>{!!$message->topic!!}</td>
                        <td>{!!Str::limit($message->message,60)!!}</td>
                        <td>{!!$message->created_at->diffForHumans();!!}</td>
                        <td>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{$message->id}}"><i class="btn btn-success fa fa-envelope-open"></i></a>
                            <div class="modal fade" id="deleteModal{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Görüntülenen mesaj</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Hayır">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>{{$message->message}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Kapat</button>
                                            <form action="{{route('messages.destroy',$message->id)}}" method="post">
                                              <input type="hidden" name="id" value="{{$message->id}}">
                                                @csrf
                                                <button type="submit" title="Sil" class="btn btn-sm btn-danger ml-4 mt-1"><i class=""></i>Mesajı Sil</button>
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
