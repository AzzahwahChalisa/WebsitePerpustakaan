<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Peminjaman</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-end mb-4">
                    <a href="{{ route('peminjaman.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
                        Pinjam Buku
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">No</th>
                            <th class="border border-gray-300 p-2">Judul Buku</th>
                            <th class="border border-gray-300 p-2">Nama Anggota</th>
                            <th class="border border-gray-300 p-2">Kelas</th>
                            <th class="border border-gray-300 p-2">Tanggal Pinjam</th>
                            <th class="border border-gray-300 p-2">Tanggal Kembali</th>
                            <th class="border border-gray-300 p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $item)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->buku->judul }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->anggota->nama }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->anggota->kelas }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->tanggal_pinjam }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->tanggal_kembali ?? '-' }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border border-gray-300 p-4 text-center text-gray-500">
                                    Belum ada data peminjaman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>