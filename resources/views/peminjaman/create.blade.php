<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pinjam Buku</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <ul class="mb-4 text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1">Buku</label>
                        <select name="buku_id" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($buku as $b)
                                <option value="{{ $b->id }}" @selected(old('buku_id') == $b->id)>
                                    {{ $b->judul }} (stok: {{ $b->stok }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Anggota</label>
                        <select name="anggota_id" class="w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih Anggota --</option>
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" @selected(old('anggota_id') == $a->id)>
                                    {{ $a->nama }} - {{ $a->kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam"
                               value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Simpan</button>
                    <a href="{{ route('peminjaman.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>