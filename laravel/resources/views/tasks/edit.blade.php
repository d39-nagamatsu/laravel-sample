<x-app-layout>
<x-slot name="styles">
    @include('share.flatpickr.styles')
</x-slot>
<div class="container">
    <div class="flex justify-center">
        <div class="relative rounded-xl overflow-auto">
            <div class="shadow-sm overflow-hidden my-8">
                <table class="border-collapse table-auto text-sm ">
                    <thead>
                        <tr>
                            <th class="border-b dark:baorder-slte-600 font-medium p-4 pl-3 pt-3 pb-3 text-slate-700 dark:text-slate-200 text-left bg-gray-300" >
                                タスクを編集する
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        <tr>
                            <td>
                                @if($errors->any())
                                    <div class="text-red-700 p-2">
                                    @foreach($errors->all() as $message)
                                        <p>{{ $message }}</p>
                                    @endforeach
                                    </div>
                                @endif
                                <form action="{{ route('tasks.edit', ['folder' => $task->folder_id, 'task' => $task->id]) }}" method="POST" >
                                    @csrf
                                    <p class="pt-3 pl-3 text-slate-700 dark:text-slate-400">
                                        <label for="title">タイトル</label>
                                    </p>
                                    <input type="text" class="form-control mx-10 my-3" name="title" id="title" value="{{ old('title') ?? $task->title }}" />
                                    <p class="pt-3 pl-3 text-slate-700 dark:text-slate-400">
                                        <label for="status">状態</label>
                                    </p>
                                    <select name="status" id="status" class="form-control mx-10 my-3">
                                        @foreach(\App\Models\Task::STATUS as $key => $val)
                                        <option value="{{ $key }}" {{ $key == old('status', $task->status) ? 'selected' : '' }}>
                                            {{ $val['label'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p class="pt-3 pl-3 text-slate-700 dark:text-slate-400">
                                        <label for="title">期限</label>
                                    </p>
                                    <input type="text" class="form-control mx-10 my-3" name="due_date" id="due_date" value="{{ old('due_date') ?? $task->formatted_due_date }}" />
                                    <div class="text-right">
                                        <button type="submit" class="rounded-lg py-3 px-10 mb-5 mr-5 bg-sky-400 text-white">送信</button>
                                    </div>
                                </form> 
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<x-slot name="scripts">
    @include('share.flatpickr.scripts')
</x-slot>
</x-app-layout>