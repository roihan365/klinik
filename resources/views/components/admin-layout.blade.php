<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medilink - Admin Dashboard')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex flex-col border-r border-gray-200">
            <!-- Logo Section -->
            <div class="px-6 py-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/Logo Medilink.png') }}" alt="Medilink Logo" class="h-16 w-auto object-contain">
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
                    <i class="fas fa-home text-lg w-5"></i>
                    <span class="font-medium">Beranda</span>
                </a>
                
                <a href="{{ route('admin.dokter.index') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dokter.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-50' }} transition-colors">
                    <i class="fas fa-user-md text-lg w-5"></i>
                    <span class="font-medium">Dokter</span>
                </a>
                
                <a href="#" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="far fa-calendar-alt text-lg w-5"></i>
                    <span class="font-medium">Jadwal</span>
                </a>
                
                <a href="#" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="far fa-edit text-lg w-5"></i>
                    <span class="font-medium">Booking</span>
                </a>
                
                <a href="#" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-wallet text-lg w-5"></i>
                    <span class="font-medium">Pembayaran</span>
                </a>
                
                <a href="#" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-chart-bar text-lg w-5"></i>
                    <span class="font-medium">Laporan</span>
                </a>
            </nav>

            <!-- Logout Button in Sidebar -->
            <div class="p-4 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-3 px-4 py-3 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-colors font-medium">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header Bar -->
            <header class="bg-gradient-to-r from-blue-700 to-blue-600 h-16 shadow-md"></header>

            <!-- Secondary Header with Page Title and User Info -->
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Klinik Sehat Utama (Admin)')</h1>
                
                <div class="flex items-center space-x-3">
                    <span class="text-sm text-gray-600">Welcome,</span>
                    <div class="flex items-center space-x-2 bg-gray-50 px-4 py-2 rounded-full border border-gray-200">
                        <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
                        <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white">
                            <i class="fas fa-user text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-8">
                @yield('content')
            </main>

            <!-- Bottom Footer Bar -->
            <footer class="bg-gradient-to-r from-blue-700 to-blue-600 h-12 shadow-inner flex items-center justify-center">
                <p class="text-white text-sm">© 2025 Medilink Health Care. All rights reserved.</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>