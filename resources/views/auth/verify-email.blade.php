<x-guest-layout>
    <div class="mb-4 text-sm text-gray-700 bg-white p-4 rounded shadow border border-gray-200">
        {{ __('Terima kasih telah mendaftar! Sebelum melanjutkan, mohon verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirim. Jika Anda belum menerima emailnya, kami akan kirim ulang.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-700 bg-green-100 p-3 rounded shadow border border-green-200">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
        </div>
    @endif

    <div class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Kirim Ulang Verifikasi -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </x-primary-button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="underline text-sm text-red-600 hover:text-red-800 focus:outline-none">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
