<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Pencarian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- Tombol Kembali --}}
                <div class="p-6">
                    <a href="{{ route('admin.rack.archive') }}"
                        class="inline-flex items-center gap-2 mb-4 bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                        {{-- <img src="https://img.icons8.com/?size=24&id=114402&format=png&color=4b5563" class="w-5"> --}}
                        Kembali
                    </a>

                    {{-- Hasil Pencarian --}}
                    @if ($files->count() > 0)
                        <div class="space-y-4">
                            @foreach ($files as $file)
                                <div
                                    class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition">

                                    {{-- Info File --}}
                                    <div class="flex flex-col">
                                        <p class="text-lg font-semibold text-gray-800">
                                            {{ $file->name_file }}
                                        </p>

                                        <p class="text-sm text-gray-600">
                                            Folder:
                                            <span class="font-medium">
                                                {{ $file->folder->folder_name ?? 'Tidak ada folder' }}
                                            </span>
                                        </p>

                                        <p class="text-sm text-gray-600">
                                            Rak:
                                            <span class="font-medium">
                                                {{ $file->folder->rak->rack_name ?? 'Tidak ada rak' }}
                                            </span>
                                        </p>
                                    </div>

                                    {{-- Tombol Aksi --}}
                                    <div>
                                        <a href="{{ route('file.show', $file->id) }}"
                                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-gray-500">
                            <img src="https://img.icons8.com/?size=96&id=102550&format=png&color=9ca3af"
                                class="mx-auto mb-3 opacity-70">
                            <p>Tidak ada hasil ditemukan untuk pencarian ini.</p>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
