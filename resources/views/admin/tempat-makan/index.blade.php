<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Tempat Makan') }}
            </h2>
            <a href="{{ route('admin.tempat-makan.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Tempat Makan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($tempatMakan->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">No</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama Tempat</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Alamat</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Jam Operasional</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center text-sm font-semibold text-gray-700">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach($tempatMakan as $index => $tempat)
                                        <tr class="hover:bg-gray-50">
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $tempatMakan->firstItem() + $index }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $tempat->nama_tempat }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $tempat->alamat }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700">
                                                {{ $tempat->jam_operasional ?? '-' }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <div class="flex justify-center gap-2">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('admin.tempat-makan.edit', $tempat->id) }}"
                                                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded text-sm">
                                                        Edit
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('admin.tempat-makan.destroy', $tempat->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus tempat makan ini?');"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm">
                                                            Delete
                                                        </button>
                                                    </form>

                                                    <!-- Kelola Menu Button -->
                                                    <a href="{{ route('admin.menu-makan.index', $tempat->id) }}"
                                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded text-sm">
                                                        Kelola Menu
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $tempatMakan->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-lg">Belum ada data tempat makan.</p>
                            <a href="{{ route('admin.tempat-makan.create') }}"
                                class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Tambah Tempat Makan Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
