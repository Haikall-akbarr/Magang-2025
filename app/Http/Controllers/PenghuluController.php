<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class PenghuluController extends Controller
{
    public function dashboard()
    {
        $todayWeddings = Registration::where('penghulu_id', Auth::id())
                                    ->where('confirmed_date', now()->format('Y-m-d'))
                                    ->get();
        
        $upcomingWeddings = Registration::where('penghulu_id', Auth::id())
                                        ->where('confirmed_date', '>', now()->format('Y-m-d'))
                                        ->orderBy('confirmed_date')
                                        ->get();

        return view('penghulu.dashboard', compact('todayWeddings', 'upcomingWeddings'));
    }
}