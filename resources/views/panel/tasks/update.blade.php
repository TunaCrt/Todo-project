@extends('panel.layout.app')
@section('content')
    <div class="card p-4">
        <div class="card-header">
            <h3>Task Güncelle</h3>
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

            <form action="{{route('panel.updateTask')}}" method="POST">
                @csrf

                <input type="hidden" value="{{$task->id}}" name="task_id">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Task Adı</label>
                    <input value="{{$task->title}}" type="text" class="form-control" name="task_title" placeholder="Lütfen Task Başlık Yazınız">

                    <label for="exampleFormControlInput1" class="form-label">Task Adı</label>
                    <input value="{{$task->content}}" type="text" class="form-control" name="task_content" placeholder="Lütfen Task İçerik Yazınız">

                    <label for="exampleFormControlInput1" class="form-label mt-3">Task Durumu</label>
                    <select class="form-control" name="task_status">
                        <option value="3" @if($task->status == 3) selected @endif >Yapıldı</option>
                        <option value="2" @if($task->status == 2) selected @endif >Ertelendi</option>
                        <option value="1" @if($task->status == 1) selected @endif >Yapılıyor</option>
                        <option value="0" @if($task->status == 0) selected @endif >Yapılmadı</option>
                    </select>

                    <label for="defaultFormControlInput" class="form-label">Son Tarih:</label>
                    <input value="{{$task->deadline}}" type="datetime-local" class="form-control" name="deadline">

                </div>
                <button type="submit" class="btn btn-info">Güncelle</button>
            </form>
        </div>
    </div>
@endsection
