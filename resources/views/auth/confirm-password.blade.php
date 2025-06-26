<x-guest-layout>
    <div class="mb-4 text-sm text-gray-700">
        {{ __('Ini adalah area aman aplikasi. Silakan konfirmasi password Anda sebelum melanjutkan.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="block mt-1 w-full bg-white text-gray-800 border border-gray-300
                       focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="flex justify-end mt-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
