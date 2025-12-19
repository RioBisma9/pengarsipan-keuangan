<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semua Status Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-gradient-to-br from-gray-50 to-blue-50/30 space-y-8">

                    {{-- Header Dashboard --}}
                    <div class="flex items-center gap-3 pb-6 border-b border-gray-200">
                        <div class="p-3 bg-blue-500 rounded-lg shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-3-3v6m-2 10h4a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Pengajuan Saya</h2>
                            <p class="text-sm text-gray-500 mt-1">Kelola semua pengajuan keuangan Anda</p>
                        </div>
                    </div>


                    {{-- ======================== BAGIAN 1 : Pengajuan Diproses ======================== --}}
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Pengajuan dalam Proses
                            </h3>
                        </div>

                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap' && $pengajuan->status_verifikasi == 0)
                                <div class="group relative mb-4 last:mb-0">
                                    <div
                                        class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-300 transition-all duration-300">

                                        {{-- NOMOR --}}
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-sm rounded-lg shadow-md">
                                            {{ $no++ }}
                                        </div>

                                        {{-- KONTEN LIST --}}
                                        <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                            {{-- Nama Pengajuan --}}
                                            <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                                                {{ $pengajuan->pengajuan_name }}
                                            </div>

                                            {{-- STATUS --}}
                                            <div class="flex flex-wrap items-center gap-2">
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                                    Proses
                                                </span>

                                                @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                                        Belum Lengkap
                                                    </span>
                                                @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                        Lengkap
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                                        Belum Diperiksa
                                                    </span>
                                                @endif

                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                                    Belum Diverifikasi
                                                </span>

                                                @if ($pengajuan->status_diarsipkan == 1)
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">
                                                        Diarsipkan
                                                    </span>
                                                @endif
                                            </div>
                                        </a>

                                        {{-- Aksi --}}
                                        <div class="flex gap-2 flex-shrink-0">
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-3-3v6m-2 10h4a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Belum ada pengajuan dalam proses</p>
                            </div>
                        @endforelse
                    </div>


                    {{-- ======================== BAGIAN 2 : SEMUA PENGAJUAN ======================== --}}
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-gray-100 rounded-lg">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Semua Pengajuan
                            </h3>
                        </div>

                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            <div class="group relative mb-4 last:mb-0">
                                <div
                                    class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-300 transition-all duration-300">

                                    {{-- NOMOR --}}
                                    <div
                                        class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-br from-gray-500 to-gray-600 text-white font-bold text-sm rounded-lg shadow-md">
                                        {{ $no++ }}
                                    </div>

                                    {{-- KONTEN LIST --}}
                                    <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                        {{-- Nama Pengajuan --}}
                                        <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                                            {{ $pengajuan->pengajuan_name }}
                                        </div>

                                        {{-- STATUS --}}
                                        <div class="flex flex-wrap items-center gap-2">
                                            @if ($pengajuan->status_kelengkapan == 'Belum Lengkap')
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                                    Belum Lengkap
                                                </span>
                                            @elseif($pengajuan->status_kelengkapan == 'Lengkap')
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Lengkap
                                                </span>
                                            @else
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                                    Belum Diperiksa
                                                </span>
                                            @endif

                                            @if ($pengajuan->status_verifikasi == 1)
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Diverifikasi
                                                </span>
                                            @else
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                                    Belum Diverifikasi
                                                </span>
                                            @endif

                                            @if ($pengajuan->status_diarsipkan == 1)
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                                    Diarsipkan
                                                </span>
                                            @endif
                                        </div>
                                    </a>

                                    {{-- Aksi --}}
                                    <div class="flex gap-2 flex-shrink-0">
                                        <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                            class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Belum ada pengajuan</p>
                            </div>
                        @endforelse
                    </div>


                    {{-- ======================== BAGIAN 3 : Pengajuan Selesai ======================== --}}
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Pengajuan Diverifikasi atau Selesai
                            </h3>
                        </div>

                        @php $no = 1; @endphp

                        @forelse ($my_pengajuan as $pengajuan)
                            @if ($pengajuan->status_kelengkapan == 'Lengkap' && $pengajuan->status_verifikasi == 1)
                                <div class="group relative mb-4 last:mb-0">
                                    <div
                                        class="flex items-center p-5 bg-gray-50 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-green-300 transition-all duration-300">

                                        {{-- NOMOR --}}
                                        <div
                                            class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gradient-to-br from-green-500 to-green-600 text-white font-bold text-sm rounded-lg shadow-md">
                                            {{ $no++ }}
                                        </div>

                                        {{-- KONTEN LIST --}}
                                        <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="flex-1 px-6">
                                            {{-- Nama Pengajuan --}}
                                            <div class="font-semibold text-base text-gray-800 mb-3 break-words">
                                                {{ $pengajuan->pengajuan_name }}
                                            </div>

                                            {{-- STATUS --}}
                                            <div class="flex flex-wrap items-center gap-2">
                                                @if ($pengajuan->status_diarsipkan == 1)
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                        Selesai
                                                    </span>
                                                @endif

                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Lengkap
                                                </span>

                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                    Diverifikasi
                                                </span>

                                                @if ($pengajuan->status_diarsipkan == 1)
                                                    <span
                                                        class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                                        Diarsipkan
                                                    </span>
                                                @endif
                                            </div>
                                        </a>

                                        {{-- Aksi --}}
                                        <div class="flex gap-2 flex-shrink-0">
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="text-center py-8">
                                <div
                                    class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Belum ada pengajuan yang selesai</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
