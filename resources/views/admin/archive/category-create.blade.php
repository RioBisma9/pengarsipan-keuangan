<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Input Arsip') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-8 border border-gray-200">
                <form action="{{ route('category.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Nama Rak Arsip --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Kategori Arsip
                        </label>
                        <input type="text" name="name" id="name"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan nama rak arsip" required>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi
                        </label>
                        <input type="text" name="deskripsi" id="keterangan"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                            placeholder="Masukkan keterangan" required>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-between pt-4">
                        <a href="{{ route('admin.rack.archive') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition">
                            ← Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
                            + Buat Kategori
                        </button>
                    </div>
                </form>
            </div>

            @php
                $no = 1;
            @endphp
            {{-- List Kategori Arsip --}}
            <div class="mt-5 bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Kategori yang Sudah Ada</h3>

                @if ($categories->count() > 0)
                    <div class="divide-y divide-gray-200 rounded-lg border border-gray-100">
                        @php $no = 1; @endphp
                        @foreach ($categories as $categori)
                            <div
                                class="flex items-center justify-between p-4 hover:bg-gray-50 transition duration-150 ease-in-out">

                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-8 h-8 flex items-center justify-center bg-indigo-100 text-indigo-600 font-semibold rounded-full">
                                        {{ $no++ }}
                                    </div>

                                    <div>
                                        <p class="text-gray-800 font-medium">
                                            {{ $categori->category_name }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            {{ $categori->deskripsi }}
                                        </p>
                                    </div>
                                </div>

                                {{-- (Optional) Tambah tombol edit/delete jika dibutuhkan --}}
                                <div class="flex gap-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('category.edit', $categori->id) }}"
                                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-md p-2 transition"
                                        title="Edit">
                                        <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff"
                                            alt="edit">
                                    </a>

                                    {{-- Tombol Delete --}}
                                    <form action="{{ route('category.destroy', $categori->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-md p-2 transition"
                                            title="Hapus">
                                            <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff"
                                                alt="hapus">
                                        </button>
                                    </form>
                                </div>


                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6 text-gray-500">
                        Belum ada kategori arsip.
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
