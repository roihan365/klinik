<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="flex items-center justify-center py-4 border-b">
                <img src="{{ asset('images/Logo Medilink.png') }}" alt="Logo" class="h-6 w-auto">
            </div>
            <nav class="mt-6 space-y-1">
                <a href="#" class="flex items-center px-6 py-3 text-blue-600 bg-blue-50 border-l-4 border-blue-600">
                    <i class="fas fa-home text-lg mr-3"></i> Beranda
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-user-md text-lg mr-3"></i> Dokter
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-calendar-alt text-lg mr-3"></i> Jadwal
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-notes-medical text-lg mr-3"></i> Booking
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-wallet text-lg mr-3"></i> Pembayaran
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-chart-bar text-lg mr-3"></i> Laporan
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            
            <!-- Topbar -->
            <header class="flex justify-between items-center bg-white shadow px-6 py-4">
                <h2 class="text-lg font-semibold">Klinik Sehat Utama (Admin)</h2>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-700">Welcome, Admin</span>
                    <i class="fas fa-user-circle text-2xl text-gray-600"></i>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                <!-- Statistik -->
                <div class="grid grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-medium text-gray-700">Total Dokter</h3>
                        <p class="mt-4 text-3xl font-bold text-blue-600">14</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-medium text-gray-700">Total Pasien</h3>
                        <p class="mt-4 text-3xl font-bold text-blue-600">25</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-medium text-gray-700">Booking Hari ini</h3>
                        <p class="mt-4 text-3xl font-bold text-blue-600">6</p>
                    </div>
                </div>

                <!-- Grafik -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Grafik Booking Bulanan</h3>
                        <canvas id="bookingChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-medium text-gray-700 mb-4">Grafik Pendapatan</h3>
                        <canvas id="incomeChart"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxBooking = document.getElementById('bookingChart').getContext('2d');
        new Chart(ctxBooking, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                datasets: [{
                    label: 'Booking',
                    data: [120, 150, 180, 400, 250, 200, 300, 350, 420, 380, 500, 600],
                    borderColor: 'rgba(37, 99, 235, 1)',
                    backgroundColor: 'rgba(37, 99, 235, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        const ctxIncome = document.getElementById('incomeChart').getContext('2d');
        new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu'],
                datasets: [{
                    label: 'Pendapatan (juta)',
                    data: [2, 4, 5, 7, 6, 5, 4, 3],
                    backgroundColor: 'rgba(37, 99, 235, 0.7)',
                }]
            }
        });
    </script>
</x-app-layout>
