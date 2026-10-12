<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Anggota</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-end mb-4">
                    <a href="{{ route('anggota.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
                        Tambah Anggota
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 p-2">No</th>
                            <th class="border border-gray-300 p-2">NIS</th>
                            <th class="border border-gray-300 p-2">Nama</th>
                            <th class="border border-gray-300 p-2">Kelas</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota as $item)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->nis }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->nama }}</td>
                                <td class="border border-gray-300 p-2">{{ $item->kelas }}</td>
                                <td class="border border-gray-300 p-2">
                                    <form action="{{ route('anggota.destroy', $item->id) }}" method="POST"
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
                                <td colspan="5" class="border border-gray-300 p-4 text-center text-gray-500">
                                    Belum ada data anggota.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
