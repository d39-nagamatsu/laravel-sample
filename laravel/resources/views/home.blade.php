<x-app-layout>
  <div class="container">
      <div class="flex justify-center">
          <div class="relative rounded-xl overflow-auto">
              <div class="shadow-sm overflow-hidden my-8">
                  <table class="border-collapse table-auto text-sm ">
                      <thead>
                          <tr>
                          <th class="border-b dark:baorder-slte-600 font-medium p-4 px-3 pt-3 pb-3 text-slate-700 dark:text-slate-200 bg-gray-300" >
                            まずはフォルダを作成しましょう
                          </th>
                          </tr>
                      </thead>
                      <tbody class="bg-white dark:bg-slate-800">
                          <tr>
                              <th>
                                <div class="p-4 px-3 pt-5 pb-5 text-slate-700 dark:text-slate-400">
                                  <div class="text-center">
                                    <a href="{{ route('folders.create') }}" class="rounded-lg py-2 px-2 mx-2 my-2 bg-sky-400 text-white">
                                      フォルダ作成ページへ
                                    </a>
                                  </div>
                                </div>
                              </th>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
