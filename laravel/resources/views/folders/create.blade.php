<x-app-layout>
    <div class="container">
        <div class="flex justify-center">
            <div class="relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-hidden my-8">
                    <table class="border-collapse table-auto text-sm ">
                        <thead>
                            <tr>
                            <th class="border-b dark:baorder-slte-600 font-medium p-4 pl-3 pt-3 pb-3 text-slate-700 dark:text-slate-200 text-left bg-gray-300" >
                                フォルダを追加する
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
                                    <form action="{{ route('folders.create') }}" method="post">
                                        @csrf
                                        <p class="pt-3 pl-3 text-slate-700 dark:text-slate-400">
                                            <label for="title">フォルダ名</label>
                                        </p>
                                        <input type="text" class="form-control mx-10 my-3" name="title" id="title" value="{{ old('title') }}" />
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
</x-app-layout>