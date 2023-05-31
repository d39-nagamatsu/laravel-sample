<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        //対象のフォルダIDを取得
        $folders = Folder::where('user_id', $user->id )->get();

        $current_folder = Folder::find($id);
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $folder_id)
    {
        return view('tasks/create', [
            'folder_id' => $folder_id
        ]);
    }

    public function create(int $folder_id, CreateTask $request)
    {
        $current_folder = Folder::find($folder_id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'folder_id' => $current_folder->id,
        ]);
    }

    /**
     * GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

    public function edit(int $task_id, EditTask $request)
    {
        // 1
        $task = Task::find($task_id);

        // 2
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        // 3
        return redirect()->route('tasks.index', [
            'folder_id' => $task->folder_id,
        ]);
    }
}
