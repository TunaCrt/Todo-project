@extends('panel.layout.app')
@section('content')
        <div class="card p-4">
            <div class="card-header">
                <h3>Kategori oluştur</h3>
            </div>
            <div class="card-body">
                <form action="{{route('panel.categoryAdd')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori Adı</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Lütfen Kategori Adı Yazınız">

                        <label for="exampleFormControlInput1" class="form-label mt-3">Kategori Durumu</label>
                        <select class="form-control" name="category_status">
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-info">kaydet</button>
                </form>
            </div>
        </div>
@endsection
