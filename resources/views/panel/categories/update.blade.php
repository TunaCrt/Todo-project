@extends('panel.layout.app')
@section('content')
    <div class="card p-4">
        <div class="card-header">
            <h3>Kategori Güncelle</h3>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">

                    @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{route('panel.updateCategory')}}" method="POST">
                @csrf

                <input type="hidden" value="{{$category->id}}" name="category_id">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori Adı</label>
                    <input value="{{$category->name}}" type="text" class="form-control" name="category_name" placeholder="Lütfen Kategori Adı Yazınız">

                    <label for="exampleFormControlInput1" class="form-label mt-3">Kategori Durumu</label>
                    <select class="form-control" name="category_status">
                        <option value="1" @if($category->isActive == 1) selected @endif >Aktif</option>
                        <option value="0" @if($category->isActive == 0) selected @endif >Pasif</option>
                    </select>

                </div>
                <button type="submit" class="btn btn-info">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
