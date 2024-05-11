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

            <h5 class="card-header">Tasklar</h5>
            <div class="table-responsive text-nowrap">
                <a href="{{route('panel.CreateTaskPage')}}" class="btn btn-success m-3">Task Oluştur</a>
                @if($tasks->first())
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Task Adı</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($tasks as $task)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$task->title}}</strong></td>
                                <td>
                                    @if($task->status == 0)
                                        Yapılmadı
                                    @elseif($task->status == 1)
                                        Yapılıyor
                                    @elseif($task->status == 2)
                                        Ertelendi
                                    @else
                                        Yapıldı
                                    @endif
                                </td>
                                <td>{{$task->deadline}}</td>
                                <td>
                                    <a href="{{ route("panel.taskUpdatePage",$task->id) }}" class="btn btn-info">Güncelle</a>
                                    <a href="{{route('panel.TaskDelete',$task->id)}}" class="btn btn-danger">Sil</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>henüz hiç Task oluşturmaıdnız</p>
                @endif


            </div>
        </div>
    </div>
@endsection()
