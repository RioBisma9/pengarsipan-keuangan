<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periksa Kelengkapan Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-gradient-to-br from-gray-50 to-emerald-50/30">

                    {{-- Tombol Kembali --}}
                    <div class="mb-6">
                        <a href="{{ route('keuangan.dashboard') }}"
                            class="inline-flex items-center gap-2 px-6 py-3
                            bg-white text-gray-700 font-medium rounded-lg
                            border border-gray-300 shadow-sm">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>

                    {{-- Informasi Pengajuan --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-emerald-100 rounded-lg">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">
                                {{ $pengajuan->pengajuan_name }}
                            </h3>
                        </div>

                        {{-- Info Pengaju --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Pengaju</p>
                                <p class="text-sm font-semibold text-gray-800">{{ $pengajuan->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Email</p>
                                <p class="text-sm font-medium text-gray-700">{{ $pengajuan->user->email }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-1">Divisi</p>
                                <p class="text-sm font-medium text-gray-700">{{ $pengajuan->user->role }}</p>
                            </div>
                        </div>

                        {{-- Timestamp --}}
                        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-600">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Dibuat:</span>
                                <span class="font-medium text-gray-800">
                                    {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Update:</span>
                                <span class="font-medium text-gray-800">
                                    {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- File Pengajuan --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-red-100 rounded-lg">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-800">File Pengajuan</h3>
                        </div>

                        <div class="flex items-center justify-between bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex items-center gap-4 flex-1 min-w-0">
                                <div class="p-3 bg-white rounded-lg shadow-sm border border-gray-200">
                                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-gray-500 mb-1">Nama File</p>
                                    <p class="text-sm font-semibold text-gray-800 truncate">
                                        {{ basename($pengajuan->path_file_pengajuan) }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-2 flex-shrink-0 ml-4">
                                <a href="{{ asset('storage/' . $pengajuan->path_file_pengajuan) }}" target="_blank"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    Lihat
                                </a>
                                <a href="{{ route('keuangan.download', $pengajuan->id) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Form Checklist --}}
                    <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        {{-- Tabel Checklist --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-lg text-gray-800">Checklist Dokumen & Tanda Tangan</h3>
                            </div>

                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table class="min-w-full bg-white text-sm">
                                    {{-- HEADER --}}
                                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                                        <tr>
                                            <th rowspan="2" class="px-4 py-3 border border-gray-300 text-center">No
                                            </th>
                                            <th rowspan="2" class="px-4 py-3 border border-gray-300">Nama Dokumen &
                                                TTD</th>
                                            <th colspan="2" class="px-4 py-3 border border-gray-300 text-center">
                                                Dokumen</th>
                                            <th colspan="2" class="px-4 py-3 border border-gray-300 text-center">
                                                Tanda Tangan</th>
                                            <th rowspan="2" class="px-4 py-3 border border-gray-300 text-center">
                                                Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th class="px-4 py-2 border border-gray-300 text-center">Ada</th>
                                            <th class="px-4 py-2 border border-gray-300 text-center">Tidak Ada</th>
                                            <th class="px-4 py-2 border border-gray-300 text-center">Lengkap</th>
                                            <th class="px-4 py-2 border border-gray-300 text-center">Belum</th>
                                        </tr>
                                    </thead>

                                    {{-- BODY --}}
                                    <tbody>
                                        @foreach ($syaratDoc as $index => $dokumen)
                                            <tr class="hover:bg-gray-50">
                                                {{-- Nomor --}}
                                                <td
                                                    class="px-4 py-3 border border-gray-300 text-center font-medium text-gray-900">
                                                    {{ $index + 1 }}
                                                </td>

                                                {{-- Nama Dokumen --}}
                                                <td class="px-4 py-3 border border-gray-300 text-gray-900">
                                                    @php
                                                        if (preg_match('/^[IVX]+\.\d+/', $dokumen)) {
                                                            echo "<span class='font-bold text-blue-700 text-base'>$dokumen</span>";
                                                        } elseif (preg_match('/^\d+\.\d+/', $dokumen)) {
                                                            echo "<span class='pl-6 text-gray-800'>$dokumen</span>";
                                                        } elseif (trim($dokumen) === '') {
                                                            echo "<span class='font-semibold text-gray-700 italic'>Dokumen Pendukung</span>";
                                                        } else {
                                                            echo "<span class='text-gray-800'>$dokumen</span>";
                                                        }
                                                    @endphp
                                                </td>

                                                {{-- Dokumen Ada --}}
                                                <td class="px-4 py-3 border border-gray-300 text-center">
                                                    <input type="radio" name="ada[{{ $index }}]"
                                                        value="1"
                                                        {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}
                                                        class="w-5 h-5 text-green-600">
                                                </td>

                                                {{-- Dokumen Tidak Ada --}}
                                                <td class="px-4 py-3 border border-gray-300 text-center">
                                                    <input type="radio" name="ada[{{ $index }}]"
                                                        value="0"
                                                        {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}
                                                        class="w-5 h-5 text-red-600">
                                                </td>

                                                {{-- TTD Lengkap --}}
                                                <td class="px-4 py-3 border border-gray-300 text-center">
                                                    <input type="radio" name="ttd[{{ $index }}]"
                                                        value="1"
                                                        {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}
                                                        class="w-5 h-5 text-blue-600">
                                                </td>

                                                {{-- TTD Belum --}}
                                                <td class="px-4 py-3 border border-gray-300 text-center">
                                                    <input type="radio" name="ttd[{{ $index }}]"
                                                        value="0"
                                                        {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}
                                                        class="w-5 h-5 text-gray-600">
                                                </td>

                                                {{-- Keterangan --}}
                                                <td class="px-4 py-3 border border-gray-300">
                                                    <input type="text" name="keterangan[{{ $index }}]"
                                                        value="{{ $keterangan[$index] ?? '' }}"
                                                        class="w-full border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 focus:outline-none"
                                                        placeholder="Catatan...">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- File Kelengkapan (Metadata) --}}
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-5 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-blue-800 mb-1">Informasi Tambahan (Opsional)</p>
                                    <p class="text-xs text-blue-700 mb-2">Metadata excel kelengkapan pengajuan ini</p>
                                    <a href="{{ asset('storage/' . $pengajuan->path_file_status_kelengkapan) }}"
                                        class="inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800 font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                        Download File Metadata
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Catatan Pengembalian --}}
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-5 mb-6">
                            <div class="flex items-start gap-3 mb-3">
                                <div class="text-2xl">📝</div>
                                <div class="flex-1">
                                    <h3 class="text-base font-semibold text-yellow-800 mb-1">Catatan Jika Belum Lengkap
                                    </h3>
                                    <p class="text-xs text-yellow-700">Tuliskan alasan pengembalian jika dokumen belum
                                        lengkap</p>
                                </div>
                            </div>
                            <textarea name="catatan" rows="4"
                                class="w-full p-3 border border-yellow-200 rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:outline-none text-sm"
                                placeholder="Contoh: Dokumen tanda tangan kepala divisi belum lengkap...">{{ $pengajuan->message }}</textarea>
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="flex justify-end">
                            <button type="submit" name="aksi" value="lengkap"
                                class="inline-flex items-center gap-2 px-8 py-3 bg-emerald-500 text-white font-semibold rounded-lg shadow-md text-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Selesaikan Pemeriksaan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
