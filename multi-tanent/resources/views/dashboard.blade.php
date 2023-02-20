<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Tasks') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex flex-col">
            <form action="{{ route('tasks.store') }}" method="POST">
              @csrf
              <div class="flex flex-col gap-10">
                <input type="text"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Title" required name="title">

                <textarea name="description"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Description" required></textarea>

                <button type="submit"
                  class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 w-max ">
                  Submit
                </button>

              </div>
            </form>
            <form action="{{ route('tasks.import') }}" method="POST" enctype="multipart/form-data">
              <div class="flex items-end gap-10 mt-10">
                <label
                  class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>
                  Select file to import
                  <input type="file" name="xlsx" class="hidden" required>
                </label>
                <button
                  class='px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 w-max h-fit '>
                  Import
                </button>
              </div>

            </form>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                  <th scope="col"
                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    ID
                  </th>

                  <th scope="col"
                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Title
                  </th>

                  <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Actions
                  </th>

                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($tasks as $task)
                  <tr>
                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                      <div>
                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $task->id }}</h2>
                      </div>
                    </td>
                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                      <div
                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                        {{ $task->title }}
                      </div>
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                      <div>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="px-2 py-1 text-sm text-red-600 transition-colors duration-200 border border-red-300 rounded-md hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 dark:border-red-500 hover:bg-red-50 dark:hover:bg-red-700 ">
                            Delete
                          </button>
                        </form>
                      </div>
                    </td>

                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class='mt-5'>
              {{ $tasks->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
