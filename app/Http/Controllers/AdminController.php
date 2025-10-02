<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controller; // Opsional: Pastikan menggunakan kelas Controller yang benar

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama admin.
     * Metode ini dipanggil oleh rute 'admin.dashboard'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- LOGIKA MENGAMBIL DATA STATISTIK UNTUK DASHBOARD ---
        
        // Asumsi: Menghitung total user dengan role tertentu
        $totalDokter = User::role('dokter')->count();
        $totalPasien = User::role('pasien')->count();
        $bookingHariIni = 6; // Data statis sementara

        // Mengirim data ke view dashboard (yang berisi @role)
        return view('dashboard', compact('totalDokter', 'totalPasien', 'bookingHariIni'));
    }

    /**
     * Menampilkan daftar dokter.
     *
     * @return \Illuminate\View\View
     */
    public function showDokter()
    {
        // Mengambil semua user yang memiliki role 'dokter'
        $dokters = User::role('dokter')->get();

        // Mengirim data ke view admin.dokter.index
        return view('admin.dokter.index', compact('dokters'));
    }
}