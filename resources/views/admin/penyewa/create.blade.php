<div x-show="tambahPenyewa" x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4">

    <div x-on:click.away="tambahPenyewa = false" class="relative bg-white rounded-2xl shadow-2xl w-full max-w-xl p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ isset($penyewa) ? 'Edit Penyewa' : 'Tambah Penyewa' }}
            </h2>
            <button @click="tambahPenyewa = false"
                class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center text-white bg-red-500 hover:bg-red-600 rounded-full shadow-lg text-2xl font-bold transition duration-200"
                title="Tutup">
                ×
            </button>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm border border-red-300">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST"
            action="{{ isset($penyewa) ? route('admin.penyewa.update', $penyewa) : route('admin.penyewa.store') }}"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if (isset($penyewa))
                @method('PUT')
            @endif

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required value="{{ old('nama', $penyewa->nama ?? '') }}">
            </div>

            <!-- No HP -->
            <div>
                <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-1">No HP</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="08xxxx"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required value="{{ old('no_hp', $penyewa->no_hp ?? '') }}">
            </div>

            <!-- NIK -->
            <div>
                <label for="nik" class="block text-sm font-semibold text-gray-700 mb-1">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="NIK"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required value="{{ old('nik', $penyewa->nik ?? '') }}">
            </div>

            <!-- Foto KTP -->
            <div>
                <label for="foto_ktp" class="block text-sm font-semibold text-gray-700 mb-1">Foto KTP</label>
                <input type="file" name="foto_ktp" id="foto_ktp"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none bg-white" {{ isset($penyewa) ? '' : 'required' }} accept="image/*">
                @if (isset($penyewa) && $penyewa->foto_ktp)
                    <img src="{{ asset('storage/' . $penyewa->foto_ktp) }}" alt="Foto KTP"
                        class="w-32 mt-2 rounded shadow border">
                @endif
            </div>

            <!-- Pilih Kamar -->
            <div>
                <label for="kamar_id" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Kamar</label>
                @if ($kamars->isEmpty())
                    <p class="text-sm text-red-600 bg-red-100 px-3 py-2 rounded-md">Tidak ada kamar tersedia.</p>
                @else
                    <select name="kamar_id" id="kamar_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- Pilih Kamar --</option>
                        @foreach ($kamars as $kamar)
                            <option value="{{ $kamar->id }}" {{ old('kamar_id', $penyewa->kamar_id ?? '') == $kamar->id ? 'selected' : '' }}>
                                {{ $kamar->nama_kamar }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
                    <option value="aktif" {{ old('status', $penyewa->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif
                    </option>
                    <option value="keluar" {{ old('status', $penyewa->status ?? '') == 'keluar' ? 'selected' : '' }}>
                        Keluar</option>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-all">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>