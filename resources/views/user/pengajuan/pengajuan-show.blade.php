<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-gradient-to-br from-gray-50 to-blue-50/30">

                    {{-- Tombol Kembali --}}
                    <div class="mb-6">
                        <a href="{{ route('user.worklist') }}"
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

                    {{-- Header Informasi --}}
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
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

                        {{-- Timestamp --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <span class="text-gray-500">Dibuat:</span>
                                    <span class="font-medium text-gray-800 ml-1">
                                        {{ $pengajuan->created_at->translatedFormat('d M Y — H:i') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <span class="text-gray-500">Update:</span>
                                    <span class="font-medium text-gray-800 ml-1">
                                        {{ $pengajuan->updated_at->translatedFormat('d M Y — H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Status Badges --}}
                        <div class="flex flex-wrap gap-2">
                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Tahapan: Dalam Proses
                                </span>
                            @endif

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_kelengkapan == 'Lengkap' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                Kelengkapan: {{ ucfirst($pengajuan->status_kelengkapan) }}
                            </span>

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_verifikasi ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $pengajuan->status_verifikasi ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}
                            </span>

                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $pengajuan->status_diarsipkan ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $pengajuan->status_diarsipkan ? 'Diarsipkan' : 'Belum Diarsipkan' }}
                            </span>
                        </div>
                    </div>

                    {{-- Diperiksa Oleh --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                        <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-teal-100 rounded-lg">
                                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-800">Diperiksa Oleh</h3>
                        </div>

                        <div class="space-y-2 text-sm">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-500 w-16">Nama:</span>
                                <span
                                    class="font-medium text-gray-800">{{ $pengajuan->finance_officer->name ?? '-' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-gray-500 w-16">Email:</span>
                                <span
                                    class="font-medium text-gray-800">{{ $pengajuan->finance_officer->email ?? '-' }}</span>
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

                        {{-- Nama File Saat Ini dengan Tombol Lihat --}}
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-4">
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-gray-500 mb-1">File Saat Ini:</p>
                                    <p class="text-sm font-semibold text-gray-800 break-all">
                                        {{ basename($pengajuan->path_file_pengajuan) ?? '-' }}
                                    </p>
                                </div>

                                <a href="{{ asset('storage/' . $pengajuan->path_file_pengajuan) }}" target="_blank"
                                    class="flex-shrink-0 inline-flex items-center gap-2 px-4 py-2.5
               bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    Lihat File
                                </a>
                            </div>
                        </div>

                        {{-- Form Upload Perbaikan --}}
                        @if (!$pengajuan->status_verifikasi && !$pengajuan->status_diarsipkan)
                            <form action="{{ route('keuangan.perbaiki', $pengajuan->id) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-4">
                                @method('PUT')
                                @csrf

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Upload File Pengajuan Baru (Perbaikan)
                                    </label>

                                    <input type="file" name="file_pengajuan"
                                        class="block w-full text-sm text-gray-700
                    file:mr-4 file:py-2.5 file:px-5
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-500 file:text-white
                    file:cursor-pointer
                    border border-gray-300 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                                </div>

                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-500 text-white font-semibold rounded-lg shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    Upload Perbaikan
                                </button>
                            </form>
                        @else
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-blue-800 mb-1">File Tidak Dapat Diperbarui
                                        </p>
                                        <p class="text-xs text-blue-700">
                                            @if ($pengajuan->status_verifikasi && $pengajuan->status_diarsipkan)
                                                File pengajuan sudah diverifikasi dan diarsipkan.
                                            @elseif ($pengajuan->status_verifikasi)
                                                File pengajuan sudah diverifikasi.
                                            @elseif ($pengajuan->status_diarsipkan)
                                                File pengajuan sudah diarsipkan.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Catatan --}}
                    @if (isset($catatan) && $catatan)
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-lg p-5 mb-6 shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="text-2xl">📝</div>
                                <div class="flex-1">
                                    <h3 class="text-base font-semibold text-yellow-800 mb-2">Catatan Pengajuan</h3>
                                    <p class="text-sm text-yellow-900 leading-relaxed">
                                        {{ $pengajuan->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Tabel Dokumen --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="font-semibold text-lg text-gray-800">Checklist Dokumen</h3>
                        </div>

                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full bg-white text-sm">
                                {{-- HEADER --}}
                                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                                    <tr>
                                        <th rowspan="2" class="px-4 py-3 border border-gray-300 text-center">No
                                        </th>
                                        <th rowspan="2" class="px-4 py-3 border border-gray-300">Nama Dokumen & TTD
                                        </th>
                                        <th colspan="2" class="px-4 py-3 border border-gray-300 text-center">
                                            Dokumen</th>
                                        <th colspan="2" class="px-4 py-3 border border-gray-300 text-center">Tanda
                                            Tangan</th>
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
                                                class="px-4 py-3 border border-gray-300 text-gray-900 font-medium text-center">
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
                                                <input type="radio" class="w-4 h-4 text-green-600" disabled
                                                    {{ isset($ada[$index]) && $ada[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- Dokumen Tidak Ada --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-red-600" disabled
                                                    {{ isset($tidakada[$index]) && $tidakada[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- TTD Lengkap --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-blue-600" disabled
                                                    {{ isset($lengkap[$index]) && $lengkap[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- TTD Belum --}}
                                            <td class="px-4 py-3 border border-gray-300 text-center">
                                                <input type="radio" class="w-4 h-4 text-gray-600" disabled
                                                    {{ isset($belum[$index]) && $belum[$index] ? 'checked' : '' }}>
                                            </td>

                                            {{-- Keterangan --}}
                                            <td class="px-4 py-3 border border-gray-300 text-gray-900">
                                                {{ $keterangan[$index] ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
