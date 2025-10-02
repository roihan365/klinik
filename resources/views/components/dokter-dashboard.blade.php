<div class="flex h-screen bg-gray-100">

    <aside class="w-64 bg-white shadow-md">
        <div class="flex items-center justify-center py-4 border-b">
            <img src="{{ asset('images/Logo Medilink.png') }}" alt="Logo" class="h-6 w-auto">
        </div>
        <nav class="mt-6 space-y-1">
            <a href="{{ route('dokter.dashboard') }}" class="flex items-center px-6 py-3 text-blue-600 bg-blue-50 border-l-4 border-blue-600">
                <i class="fas fa-home text-lg mr-3"></i> Beranda
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                <i class="fas fa-calendar-check text-lg mr-3"></i> Jadwal Praktik
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                <i class="fas fa-user-injured text-lg mr-3"></i> Daftar Pasien
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100">
                <i class="fas fa-notes-medical text-lg mr-3"></i> Rekam Medis
            </a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">

        <header class="flex justify-between items-center bg-white shadow px-6 py-4">
            <h2 class="text-lg font-semibold">Dashboard Dokter</h2>
            <div class="flex items-center space-x-2">
                <span class="text-gray-700">Selamat datang, {{ Auth::user()->name }}</span>
                <i class="fas fa-user-circle text-2xl text-gray-600"></i>
            </div>
        </header>

        <main class="p-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-medium text-gray-700">Selamat datang di dashboard Anda.</h3>
                <p class="mt-2 text-gray-600">Anda dapat melihat jadwal praktik dan mengelola daftar pasien.</p>
            </div>

            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold mb-4">Janji Temu Hari Ini</h4>
                <ul class="divide-y divide-gray-200">
                    <li class="py-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800">John Doe</p>
                            <p class="text-sm text-gray-500">Pukul 10:00 - Konsultasi Umum</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Terkonfirmasi</span>
                    </li>
                    <li class="py-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-800">Jane Smith</p>
                            <p class="text-sm text-gray-500">Pukul 11:30 - Konsultasi Gizi</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Menunggu</span>
                    </li>
                </ul>
            </div>
        </main>
    </div>
</div>