@extends('panel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            <h5 class="card-header">Kategoriler</h5>
            <div class="table-responsive text-nowrap">
                <a href="{{route('panel.categoryCreatePage')}}" class="btn btn-success m-3">Kategori Oluştur</a>
                @if($kategoriler->first())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($kategoriler as $kategori)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$kategori->name}}</strong></td>
                                <td>
                                    @if($kategori->isActive == 1)
                                        aktif
                                    @else
                                        pasif
                                    @endif
                                </td>
                                <td>{{$kategori->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route("panel.categoryUpdatePage",$kategori->id) }}" class="btn btn-info">Güncelle</a>
                                    <a href="{{route('panel.categoryDelete',$kategori->id)}}" class="btn btn-danger">Sil</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>henüz hiç kategori oluşturulmadı</p>
                @endif
            </div>
                <h5 class="card-header">Silinen Kategoriler</h5>
                <div class="table-responsive text-nowrap">
                @if($silinenKategoriler->first())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($silinenKategoriler as $Skategori)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$Skategori->name}}</strong></td>
                                <td>
                                    @if($Skategori->isActive == 1)
                                        aktif
                                    @else
                                        pasif
                                    @endif
                                </td>
                                <td>{{$Skategori->created_at->diffForHumans()}}</td>
                                <td>
                                    <button disabled href="{{ route("panel.categoryUpdatePage",$Skategori->id) }}" class="btn btn-info">Güncelle</button>
                                    <button disabled href="{{route('panel.categoryDelete',$Skategori->id)}}" class="btn btn-danger">Sil</button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>henüz hiç kategori silmediniz</p>
                @endif
                </div>
        </div>
    </div>
@endsection()
