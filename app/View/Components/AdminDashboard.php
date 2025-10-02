<div class="flex h-screen bg-gray-100">
    <aside class="w-64 bg-white shadow-md">
        <div class="flex items-center justify-center py-4 border-b">
            <img src="{{ asset('images/Logo Medilink.png') }}" alt="Logo" class="h-6 w-auto">
        </div>
        <nav class="mt-6 space-y-1">
            
            {{-- Tautan Beranda/Dashboard (Active jika di Beranda) --}}
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-6 py-3 {{ Request::routeIs('admin.dashboard') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-home text-lg mr-3"></i> Beranda
            </a>
            
            {{-- Tautan Dokter (Active jika di halaman Dokter atau sub-halamannya) --}}
            {{-- **PERBAIKAN ADA DI SINI: route('admin.dokter.index')** --}}
            <a href="{{ route('admin.dokter.index') }}" 
               class="flex items-center px-6 py-3 {{ Request::routeIs('admin.dokter.*') ? 'text-blue-600 bg-blue-50 border-l-4 border-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
                <i class="fas fa-user-md text-lg mr-3"></i> Dokter
            </a>
            
            {{-- Tautan Lainnya --}}
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100"><i class="fas fa-calendar-alt text-lg mr-3"></i> Jadwal</a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100"><i class="fas fa-notes-medical text-lg mr-3"></i> Booking</a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100"><i class="fas fa-wallet text-lg mr-3"></i> Pembayaran</a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100"><i class="fas fa-chart-bar text-lg mr-3"></i> Laporan</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="flex justify-between items-center bg-white shadow px-6 py-4">
            <h2 class="text-lg font-semibold">Klinik Sehat Utama (Admin)</h2>
            <div class="flex items-center space-x-2">
                <span class="text-gray-700">Selamat datang, {{ Auth::user()->name }}</span>
                <i class="fas fa-user-circle text-2xl text-gray-600"></i>
            </div>
        </header>

        <main class="p-6 overflow-y-auto">
            {{-- Konten statistik dimuat di sini --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                </div>
        </main>
    </div>
</div>