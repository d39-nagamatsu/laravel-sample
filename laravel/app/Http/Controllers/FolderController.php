<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;

        //ユーザーへの紐付け
        $folder->user_id = $user->id;

        // インスタンスの状態をデータベースに書き込む

        $folder->save();

        return redirect()->route('tasks.index', [
           'folder' => $folder->id,
        ]);
    }
}
