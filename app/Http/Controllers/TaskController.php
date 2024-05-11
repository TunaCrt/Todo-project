<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createPage()
    {
        return view('panel.tasks.create');
    }
    public function addTask(Request $request)
    {
        //validasyon
        $request->validate([
            'title' => 'required | max:15 | min:3'
        ]);

        $task =new Task();
        $task -> category_id=1;
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->save();

        return redirect()->route('panel.IndexTaskPage')->with(['success'=> 'Task başarıyla oluşturuldu']);
    }
    public function index()
    {
        $tasks = Task::get();
        return view('panel.tasks.index',compact('tasks'));
    }
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('panel.IndexTaskPage')->with(['success'=> 'Task başarıyla Silindi']);
    }
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        return view("panel.tasks.update",compact("task"));
    }


public function updateTask(Request $request)
{
    $task = Task::find($request->task_id);
    if ($task != null){
        $task->title = $request->task_title;
        $task->content = $request->task_content;
        $task->status = $request->task_status;
        $task->save();
        return redirect()->route('panel.IndexTaskPage')->with(['success'=> 'Task Başarıyla Güncellendi']);
    }else{
        return redirect()->route('panel.IndexTaskPage')->with(['error'=> 'Bir Hata Oluştu Lütfen Tekrar Deneyiniz']);
    }
}
}
