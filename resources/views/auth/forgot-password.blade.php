<x-guest-layout>
    <div class="mb-4 text-sm text-gray-700">
        {{ __('Lupa password? Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password Anda.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full bg-white text-gray-800 border border-gray-300
                       focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
