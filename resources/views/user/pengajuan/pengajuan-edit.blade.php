<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div
                    class="border border-gray-200 rounded-lg shadow-sm p-8 bg-gradient-to-br from-gray-50 to-blue-50/30">

                    {{-- Header Section --}}
                    <div class="flex items-center gap-3 mb-8">
                        <div class="p-3 bg-amber-500 rounded-lg shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">
                                Edit/Perbaiki Pengajuan Keuangan
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">
                                Perbarui informasi pengajuan Anda
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @method('PUT')
                        @csrf

                        {{-- Nama Pengajuan --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-semibold">Nama Pengajuan</label>
                            </div>
                            <input type="text" name="nama_pengajuan" value="{{ $pengajuan->pengajuan_name }}"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
                                placeholder="Contoh: Pengajuan Pembelian Alat" required>
                            <p class="text-xs text-gray-500 mt-2">Masukkan nama pengajuan yang jelas dan deskriptif</p>
                        </div>

                        {{-- File Upload --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-red-100 rounded-lg">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-semibold">File PDF Pengajuan</label>
                            </div>

                            {{-- File Saat Ini --}}
                            @if ($pengajuan->path_file_pengajuan)
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-4">
                                    <div class="flex items-center justify-between gap-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs text-gray-500 mb-1">File Saat Ini:</p>
                                            <p class="text-sm font-semibold text-gray-800 break-all">
                                                {{ basename($pengajuan->path_file_pengajuan) }}
                                            </p>
                                        </div>

                                        <a href="{{ asset('storage/' . $pengajuan->path_file_pengajuan) }}"
                                            target="_blank"
                                            class="flex-shrink-0 inline-flex items-center gap-2 px-4 py-2
                                           bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            @endif

                            {{-- Upload File Baru --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ $pengajuan->path_file_pengajuan ? 'Upload File Baru (Opsional)' : 'Upload File PDF' }}
                                </label>

                                <div class="flex items-center gap-3">
                                    <label for="file"
                                        class="inline-flex items-center gap-2 bg-blue-500 text-white px-5 py-2.5 rounded-lg shadow-sm cursor-pointer font-medium">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                        Pilih File
                                    </label>

                                    <span id="filename" class="text-sm text-gray-600 flex-1">
                                        {{ $pengajuan->path_file_pengajuan ? 'Tidak ada file baru dipilih' : 'Belum ada file dipilih' }}
                                    </span>
                                </div>

                                <input id="file" name="file" type="file" accept="application/pdf"
                                    class="hidden"
                                    onchange="document.getElementById('filename').innerText = this.files.length ? this.files[0].name : '{{ $pengajuan->path_file_pengajuan ? 'Tidak ada file baru dipilih' : 'Belum ada file dipilih' }}'">
                            </div>

                            <p class="text-xs text-gray-500 mt-3">
                                {{ $pengajuan->path_file_pengajuan ? 'Biarkan kosong jika tidak ingin mengubah file' : 'Format file: PDF' }}
                            </p>
                        </div>

                        {{-- Buttons --}}
                        <div class="space-y-3 pt-2">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white px-6 py-4 rounded-lg shadow-md font-semibold text-lg">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Perubahan
                                </span>
                            </button>

                            <a href="{{ route('user.worklist') }}"
                                class="w-full flex items-center justify-center gap-2 bg-white text-gray-700 px-6 py-4 rounded-lg border border-gray-300 shadow-sm font-semibold">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
