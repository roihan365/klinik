@extends('components.admin-layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Klinik Sehat Utama (Admin)')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Dokter Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Total Dokter</h3>
            <p class="text-4xl font-bold text-gray-800">{{ $totalDokter ?? 14 }}</p>
        </div>

        <!-- Total Pasien Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Total Pasien</h3>
            <p class="text-4xl font-bold text-gray-800">{{ $totalPasien ?? 25 }}</p>
        </div>

        <!-- Booking Hari Ini Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Booking Hari ini</h3>
            <p class="text-4xl font-bold text-gray-800">{{ $bookingHariIni ?? 6 }}</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Grafik Booking Bulanan -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Booking Bulanan</h3>
            <div class="h-64">
                <canvas id="bookingChart"></canvas>
            </div>
        </div>

        <!-- Grafik Pendapatan -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Pendapatan</h3>
            <div class="h-64">
                <canvas id="pendapatanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Tabel Data Terbaru -->
    <div class="bg-white shadow-md rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="font-semibold text-gray-800 text-lg">Data Terbaru</h3>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-50 text-gray-700 border-b">
                    <tr>
                        <th class="px-4 py-3 font-semibold">#</th>
                        <th class="px-4 py-3 font-semibold">Nama</th>
                        <th class="px-4 py-3 font-semibold">Role</th>
                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                        <th class="px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataTerbaru ?? [] as $index => $data)
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $data->nama }}</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $data->role == 'Dokter' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700' }}">
                                {{ $data->role }}
                            </span>
                        </td>
                        <td class="px-4 py-3">{{ $data->tanggal }}</td>
                        <td class="px-4 py-3">
                            <button class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-800">Dr. Andi Wijaya</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                Dokter
                            </span>
                        </td>
                        <td class="px-4 py-3">01-10-2025</td>
                        <td class="px-4 py-3">
                            <button class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-800">Budi Santoso</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                Pasien
                            </span>
                        </td>
                        <td class="px-4 py-3">29-09-2025</td>
                        <td class="px-4 py-3">
                            <button class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">3</td>
                        <td class="px-4 py-3 font-medium text-gray-800">Dr. Siti Nurhaliza</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                Dokter
                            </span>
                        </td>
                        <td class="px-4 py-3">28-09-2025</td>
                        <td class="px-4 py-3">
                            <button class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Data untuk Grafik Booking Bulanan
    const bookingCtx = document.getElementById('bookingChart').getContext('2d');
    const bookingChart = new Chart(bookingCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep'],
            datasets: [{
                label: 'Jumlah Booking',
                data: [250, 280, 300, 400, 380, 280, 320, 420, 450],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 100
                    }
                }
            }
        }
    });

    // Data untuk Grafik Pendapatan (Bar Chart)
    const pendapatanCtx = document.getElementById('pendapatanChart').getContext('2d');
    const pendapatanChart = new Chart(pendapatanCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu'],
            datasets: [{
                label: 'Pendapatan (Juta)',
                data: [2.5, 4, 4.5, 6.5, 5, 4.2, 3.8, 4],
                backgroundColor: '#3b82f6',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 2
                    }
                }
            }
        }
    });
</script>
@endpush