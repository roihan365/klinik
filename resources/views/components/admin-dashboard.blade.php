<div class="flex h-screen bg-gray-100">
    <aside class="w-56 bg-white shadow-md">
        <div class="flex items-center justify-center py-3 border-b">
            {{-- Logo kecil --}}
            <img src="{{ asset('images/Logo Medilink.png') }}" alt="Logo" class="h-5 w-auto">
        </div>
        <nav class="mt-4 space-y-1 text-sm">
            
            {{-- Beranda (Active Style) --}}
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-4 py-2 {{ Request::routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-home text-base mr-2"></i> Beranda
            </a>
            
            {{-- Dokter (Menggunakan admin.dokter.index yang benar) --}}
            <a href="{{ route('admin.dokter.index') }}" 
               class="flex items-center px-4 py-2 {{ Request::routeIs('admin.dokter.*') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-user-md text-base mr-2"></i> Dokter
            </a>
            
            {{-- Menu Lainnya (Non-aktif) --}}
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-calendar-alt text-base mr-2"></i> Jadwal</a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-notes-medical text-base mr-2"></i> Booking</a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-wallet text-base mr-2"></i> Pembayaran</a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100"><i class="fas fa-chart-bar text-base mr-2"></i> Laporan</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="flex justify-between items-center bg-white shadow px-4 py-3">
            <h2 class="text-base font-semibold">Klinik Sehat Utama (Admin)</h2>
            <div class="flex items-center space-x-1">
                {{-- Nama user --}}
                <span class="text-sm text-gray-700">Welcome, {{ Auth::user()->name }}</span>
                <i class="fas fa-user-circle text-xl text-gray-600"></i>
            </div>
        </header>

        <main class="p-4 overflow-y-auto">
            
            {{-- 1. BAGIAN STATISTIK (Lebih Ringkas) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                
                {{-- Kotak Total Dokter (Ambil dari Controller) --}}
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xs font-medium text-gray-600">Total Dokter</h3>
                    <p class="mt-1 text-3xl font-light text-gray-900">{{ $totalDokter ?? '14' }}</p>
                </div>
                
                {{-- Kotak Total Pasien --}}
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xs font-medium text-gray-600">Total Pasien</h3>
                    <p class="mt-1 text-3xl font-light text-gray-900">{{ $totalPasien ?? '25' }}</p>
                </div>
                
                {{-- Kotak Booking Hari Ini --}}
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-xs font-medium text-gray-600">Booking Hari ini</h3>
                    <p class="mt-1 text-3xl font-light text-gray-900">{{ $bookingHariIni ?? '6' }}</p>
                </div>
            </div>

            {{-- 2. BAGIAN GRAFIK (Tinggi Dibatasi) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                
                {{-- Grafik Booking Bulanan --}}
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Grafik Booking Bulanan</h3>
                    {{-- Wrapper untuk kontrol tinggi --}}
                    <div class="h-64"> 
                        <canvas id="bookingChart"></canvas>
                    </div>
                </div>
                
                {{-- Grafik Pendapatan --}}
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Grafik Pendapatan</h3>
                    {{-- Wrapper untuk kontrol tinggi --}}
                    <div class="h-64">
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
        
        {{-- Footer --}}
        <footer class="bg-blue-800 text-white text-xs p-2 text-center">
            &copy; 2025 Medilink Health Care
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pastikan Anda telah menginstal Font Awesome agar ikon terlihat.
    
    // --- Data dan Konfigurasi Grafik Booking Bulanan ---
    const ctxBooking = document.getElementById('bookingChart').getContext('2d');
    new Chart(ctxBooking, {
        type: 'line',
        data: {
            labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S'],
            datasets: [{
                label: 'Booking',
                data: [180, 200, 300, 420, 250, 280, 220, 350, 400],
                borderColor: 'rgba(37, 99, 235, 1)',
                backgroundColor: 'rgba(37, 99, 235, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });

    // --- Data dan Konfigurasi Grafik Pendapatan ---
    const ctxIncome = document.getElementById('incomeChart').getContext('2d');
    new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A'],
            datasets: [{
                label: 'Pendapatan (juta)',
                data: [3, 4, 5, 7, 6, 5, 4, 3],
                backgroundColor: 'rgba(37, 99, 235, 0.7)',
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>