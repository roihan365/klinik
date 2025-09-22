<x-app-layout>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md min-h-screen p-6">
            <h2 class="text-xl font-bold mb-6 text-blue-600">Medilink</h2>
            <ul class="space-y-4">
                <li><a href="#" class="flex items-center gap-2"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-blue-600 font-bold"><i class="fas fa-user-md"></i> Dokter</a></li>
                <li><a href="#" class="flex items-center gap-2"><i class="fas fa-calendar"></i> Jadwal</a></li>
                <li><a href="#" class="flex items-center gap-2"><i class="fas fa-edit"></i> Booking</a></li>
                <li><a href="#" class="flex items-center gap-2"><i class="fas fa-wallet"></i> Pembayaran</a></li>
                <li><a href="#" class="flex items-center gap-2"><i class="fas fa-chart-bar"></i> Laporan</a></li>
            </ul>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Klinik Sehat Utama (Admin)</h1>
                <a href="{{ route('doctors.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</a>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Id</th>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Spesialisasi</th>
                            <th class="border p-2">Jadwal</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td class="border p-2">{{ $doctor->id }}</td>
                                <td class="border p-2">{{ $doctor->name }}</td>
                                <td class="border p-2">{{ $doctor->spesialisasi }}</td>
                                <td class="border p-2">{{ $doctor->jadwal }}</td>
                                <td class="border p-2">{{ $doctor->status }}</td>
                                <td class="border p-2 flex gap-2">
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Yakin hapus dokter ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-app-layout>
