<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Penting: Import model User
use Spatie\Permission\Models\Role; // Opsional, tetapi membantu
use Illuminate\Routing\Controller; // Pastikan ini ada (biasanya otomatis)


class AdminDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua user yang memiliki role 'dokter'
        // Jika role belum ada, gunakan try-catch atau default
        try {
            $dokters = User::role('dokter')->get();
        } catch (\Exception $e) {
            // Jika terjadi error (misalnya role belum terdaftar), kembalikan koleksi kosong
            $dokters = collect(); 
        }

        // Kirim data ke view admin.dokter.index
        return view('admin.dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.dokter.create'); // Nanti diisi
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logika untuk menyimpan data dokter baru
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Biasanya tidak digunakan untuk resource table
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('admin.dokter.edit', compact('dokter')); // Nanti diisi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Logika untuk update data dokter
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Logika untuk menghapus data dokter
    }
}