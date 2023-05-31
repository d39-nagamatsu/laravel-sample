<x-app-layout>
  <div class="container">
    <div class="flex justify-center">
      <div class="relative rounded-xl overflow-auto m-3">
        <div class="shadow-sm overflow-hidden my-8">
          <table class="border-collapse table-auto text-sm ">
            <thead>
              <tr>
                <th class="border-b dark:baorder-slte-600 font-medium p-4 pl-4 pt-3 pb-3 text-slate-700 dark:text-slate-200 text-left bg-gray-300" >
                  フォルダ
                </th>
              </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
              <tr>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400 text-center">
                  <a href="{{ route('folders.create') }}" class="rounded-lg py-3 px-10 border-2 ">
                    フォルダを追加する
                  </a>
                </td>
              </tr>
              @foreach($folders as $folder)
                <tr>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 {{ $current_folder_id === $folder->id ? 'bg-sky-400 text-white' : 'text-slate-500' }}">
                    <a href="{{ route('tasks.index', ['folder_id' => $folder->id]) }}" >
                      {{ $folder->title }}
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="relative rounded-xl overflow-auto m-3">
          <div class="shadow-sm overflow-hidden my-8">
            <table class="border-collapse table-auto text-sm " >
              <thead>
                <tr>
                  <th class="border-b dark:border-slate-600 font-medium p-4 pl-4 pt-3 pb-3 text-slate-700 dark:text-slate-200 text-left bg-gray-300" colspan="8">
                    タスク
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white dark:bg-slate-800">
                <tr>
                  <td class="border-b border-slate-200 dark:border-slate-700 p-4 pl-4 text-slate-500 dark:text-slate-400 text-center" colspan="8">
                    <a href="{{ route('tasks.create', ['folder_id' => $current_folder_id]) }}" class="rounded-lg py-3 px-10 border-2 ">
                      タスクを追加する
                    </a>
                  </td>
                </tr>
                <tr>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-700">タイトル</td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-700">状態</td>
                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-700">期限</td>
                  <td></td>
                </tr>
                @foreach($tasks as $task)
                  <tr>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-500">
                      {{ $task->title }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-500 {{ $task->status_class }}">
                      {{ $task->status_label }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-slate-500">
                      {{ $task->formatted_due_date }}
                    </td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-4 dark:text-slate-400 text-sky-400">
                      <a href="{{ route('tasks.edit', ['folder_id' => $task->folder_id, 'task_id' => $task->id]) }}">編集</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>