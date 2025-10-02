{{-- Halaman ini dibungkus oleh komponen layout master admin --}}
<x-admin-layout> 

    {{-- KONTEN TABEL --}}
    <div class="bg-white p-6 rounded-lg shadow-md">
        
        {{-- Container Tabel untuk Gaya Border --}}
        <div class="border border-gray-300 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr class="border-b border-gray-300 text-left">
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Id</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Spesialisasi</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    {{-- Loop Data Dokter (DINAMIS) --}}
                    @foreach ($dokters as $dokter)
                    <tr class="border-b border-gray-300">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $dokter->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $dokter->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $dokter->spesialisasi ?? 'Gigi' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $dokter->jadwal ?? 'Senin' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $dokter->status ?? 'Aktif' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-1 px-3 rounded shadow-md">Edit</a>
                            
                            {{-- Form Delete --}}
                            <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold py-1 px-3 rounded shadow-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    {{-- Baris Kosong untuk Menyesuaikan Desain --}}
                    <tr style="height: 100px;">
                        <td colspan="6" class="p-0 border-b border-gray-300">
                            <div style="height: 100%;"></div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        {{-- Tombol Create --}}
        <div class="flex justify-end mt-4">
            <a href="{{ route('admin.dokter.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md">
                Create
            </a>
        </div>

    </div>

</x-admin-layout>