<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan dashboard user (calon pengantin).
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Menampilkan halaman pilihan jadwal nikah.
     */
    public function showSchedule()
    {
        // Logika untuk mengambil jadwal yang tersedia dari database
        $availableDates = [
            '2025-08-20' => ['slots' => 5, 'text' => 'Tersedia'],
            '2025-08-21' => ['slots' => 3, 'text' => 'Tersedia'],
            '2025-08-22' => ['slots' => 0, 'text' => 'Penuh'],
        ];

        return view('user.schedule', compact('availableDates'));
    }

    /**
     * Menampilkan formulir pendaftaran.
     */
    public function showForm(Request $request)
    {
        $selectedDate = $request->get('date');
        return view('user.form', compact('selectedDate'));
    }

    /**
     * Memproses pengajuan formulir pendaftaran nikah.
     */
    public function submitForm(Request $request)
    {
        // Validasi data dan upload berkas
        $request->validate([
            'wedding_date' => 'required|date',
            'groom_name' => 'required|string',
            'bride_name' => 'required|string',
            // ... tambahkan validasi berkas upload di sini
        ]);

        // Simpan data pendaftaran ke database
        Registration::create([
            'user_id' => Auth::id(),
            'wedding_date' => $request->wedding_date,
            'groom_name' => $request->groom_name,
            'bride_name' => $request->bride_name,
            'status' => 'pending',
            // ... simpan data lainnya dan path berkas
        ]);

        return redirect()->route('user.success');
    }

    /**
     * Menampilkan halaman sukses pendaftaran.
     */
    public function showSuccessPage()
    {
        return view('user.success');
    }
}