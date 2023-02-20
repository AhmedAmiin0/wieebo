<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Users') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <a class="block px-2 py-1 text-sm text-green-600 transition-colors duration-200 border border-green-300 rounded-md hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 dark:border-green-500 hover:bg-green-50 dark:hover:bg-green-700 w-max "
            href="{{ route('users.create') }}">
            Create New User
          </a>
          <div class="flex flex-col">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                  <th scope="col"
                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    ID
                  </th>

                  <th scope="col"
                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Name
                  </th>
                  <th scope="col"
                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Email
                  </th>

                  <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Actions
                  </th>

                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($users as $user)
                  <tr>
                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                      <div>
                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $user->id }}</h2>
                      </div>
                    </td>
                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                      <div
                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                        {{ $user->name }}
                      </div>
                    </td>
                    <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                      <div
                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                        {{ $user->email }}
                      </div>
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">
                      <div class='flex gap-5'>
                        <a class="px-2 py-1 text-sm text-blue-600 transition-colors duration-200 border border-blue-300 rounded-md hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 dark:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-700 "
                          href="{{ route('users.edit', $user->id) }}">
                          Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
