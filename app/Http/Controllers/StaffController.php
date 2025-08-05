<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Penghulu; // Asumsi ada model Penghulu

class StaffController extends Controller
{
    public function dashboard()
    {
        $pendingRegistrations = Registration::where('status', 'pending')->count();
        $upcomingWeddings = Registration::where('status', 'confirmed')
                                        ->where('wedding_date', '>=', now())
                                        ->orderBy('wedding_date')
                                        ->get();

        return view('staff.dashboard', compact('pendingRegistrations', 'upcomingWeddings'));
    }

    public function showRegistrations()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        return view('staff.registration-list', compact('registrations'));
    }

    public function showRegistrationDetail($id)
    {
        $registration = Registration::findOrFail($id);
        $penghulus = Penghulu::where('status', 'available')->get(); // Ambil penghulu yang tersedia
        return view('staff.registration-detail', compact('registration', 'penghulus'));
    }

    public function confirmRegistration(Request $request, $id)
    {
        $request->validate([
            'penghulu_id' => 'required|exists:penghulus,id',
            'confirmed_date' => 'required|date',
            'slot' => 'required|integer|min:1|max:5',
        ]);

        $registration = Registration::findOrFail($id);
        
        // Perbarui status pendaftaran dan tetapkan penghulu
        $registration->update([
            'status' => 'confirmed',
            'penghulu_id' => $request->penghulu_id,
            'confirmed_date' => $request->confirmed_date,
            'slot_number' => $request->slot,
        ]);

        return redirect()->route('staff.registrations')->with('success', 'Pendaftaran berhasil dikonfirmasi.');
    }
}