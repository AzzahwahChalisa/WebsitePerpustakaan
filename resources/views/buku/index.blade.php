<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Buku</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('buku.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="q" value="{{ $q }}"
               class="border-gray-300 rounded-md shadow-sm"
               placeholder="Cari judul atau pengarang...">
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Cari</button>
            @if ($q)
                <a href="{{ route('buku.index') }}" class="px-4 py-2 border rounded-md">Reset</a>
            @endif
        </form>

        <a href="{{ route('buku.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
            Tambah Buku
        </a>
    </div>

                    <a href="{{ route('buku.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
                        Tambah Buku
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">No</th>
                            <th class="border border-gray-300 p-2">Kode Buku</th>
                            <th class="border border-gray-300 p-2">Judul</th>
                            <th class="border border-gray-300 p-2">Pengarang</th>
                            <th class="border border-gray-300 p-2">Penerbit</th>
                            <th class="border border-gray-300 p-2">Tahun Terbit</th>
                            <th class="border border-gray-300 p-2">Stok</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buku as $item)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->kode_buku }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->judul }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->pengarang }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->penerbit }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->tahun_terbit }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->stok }}</td>
                                <td class="border border-gray-300 p-2 whitespace-nowrap">
                                    <a href="{{ route('buku.edit', $item->id) }}"
                                       class="px-3 py-1 bg-yellow-400 rounded text-sm">Edit</a>

                                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="border border-gray-300 p-4 text-center text-gray-500">
                                    {{ $q ? 'Buku tidak ditemukan.' : 'Belum ada data buku.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>