<div x-show="tambahKamar" x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4">

    <div x-on:click.away="tambahKamar = false"
        class="relative bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                {{ isset($kamar) ? 'Edit' : 'Tambah' }} Kamar
            </h2>
            <button @click="tambahKamar = false"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                ✕
            </button>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ isset($kamar) ? route('kamar.update', $kamar) : route('kamar.store') }}">
            @csrf
            @if (isset($kamar))
                @method('PUT')
            @endif

            <!-- Nama Kamar -->
            <div class="mb-4">
                <label for="nama_kamar" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                    Nama Kamar
                </label>
                <input type="text" name="nama_kamar" id="nama_kamar" required
                    value="{{ old('nama_kamar', $kamar->nama_kamar ?? '') }}"
                    class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                    Status
                </label>
                <select name="status" id="status"
                    class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="tersedia" {{ old('status', $kamar->status ?? '') == 'tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>
                    <option value="terisi" {{ old('status', $kamar->status ?? '') == 'terisi' ? 'selected' : '' }}>
                        Terisi
                    </option>
                </select>
            </div>

            <!-- Fasilitas -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Fasilitas</label>
                <div class="space-y-1">
                    @php
                        $selectedFasilitas = old('fasilitas', $kamar->fasilitas ?? []);
                    @endphp

                    @foreach (['AC', 'Kamar Mandi Dalam', 'WiFi', 'Kasur'] as $item)
                        <label class="inline-flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-300">
                            <input type="checkbox" name="fasilitas[]" value="{{ $item }}"
                                class="rounded text-blue-600 border-gray-300 focus:ring-blue-500"
                                {{ in_array($item, $selectedFasilitas) ? 'checked' : '' }}>
                            <span>{{ $item }}</span>
                        </label><br>
                    @endforeach
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md shadow-sm transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
