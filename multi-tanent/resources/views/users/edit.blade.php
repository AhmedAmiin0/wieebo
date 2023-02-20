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

          <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
              <x-input-label for="name" :value="__('Name')" />
              <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                value="{{ $user->name }}" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                value="{{ $user->email }}" required autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->


            <div class="flex items-center justify-end mt-4">

              <x-primary-button class="ml-4">
                {{ __('Update User') }}
              </x-primary-button>
            </div>
          </form>


        </div>
      </div>
      <div class="mt-10 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class=''>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
              {{ __('Change Password') }}
            </h2>
          </div>

          <form method="POST" action="{{ route('users.updatePassword', $user->id) }}">
            @csrf
            <div class="mt-4">
              <x-input-label for="password" />

              <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" placeholder="Enter new password" />

              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
              <x-input-label for="password_confirmation" />

              <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password" />

              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">

              <x-primary-button class="ml-4">
                {{ __('Update Password') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
