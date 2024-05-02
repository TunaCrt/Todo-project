@extends('panel.layout.app')
@section('content')
    <div class="card p-3">
        <div class="card-header">Görev Oluştur</div>
        <div class="card-body">
            <form action="{{route('panel.addTask')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Başlık:</label>
                        <input type="text" class="form-control" name="title" placeholder="Lütfen Başlık Giriniz">

                        <label for="defaultFormControlInput" class="form-label">İçerik:</label>
                        <input type="text" class="form-control" name="content" placeholder="Lütfen Başlık Giriniz">

                        <label for="defaultFormControlInput" class="form-label">Durum:</label>
                        <select name="status" id="" class="form-control">
                            <option selected disabled value="">Lütfen Seçim Yapınız</option>
                            <option value="0">Yapılmadı</option>
                            <option value="1">Yapılıyor</option>
                            <option value="2">Ertelendi</option>
                            <option value="3">İptal Oldu</option>
                        </select>

                        <label for="defaultFormControlInput" class="form-label">Son Tarih:</label>
                        <input type="datetime-local" class="form-control" name="deadline">

                        <button type="submit" class="btn btn-success mt-3">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection()
