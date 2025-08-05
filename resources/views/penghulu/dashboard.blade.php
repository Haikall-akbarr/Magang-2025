@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Dashboard Penghulu</h1>
    <h2 class="text-2xl font-semibold mb-4">Jadwal Hari Ini</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        @if ($todayWeddings->isEmpty())
            <p class="text-gray-600">Tidak ada jadwal nikah untuk hari ini.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach ($todayWeddings as $wedding)
                    <li class="py-4">
                        <p class="font-bold text-lg">Pernikahan {{ $wedding->groom_name }} & {{ $wedding->bride_name }}</p>
                        <p class="text-gray-600">Tanggal: {{ \Carbon\Carbon::parse($wedding->confirmed_date)->translatedFormat('d F Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <h2 class="text-2xl font-semibold mb-4">Jadwal Mendatang</h2>
    <div class="bg-white p-6 rounded-lg shadow-md">
        @if ($upcomingWeddings->isEmpty())
            <p class="text-gray-600">Tidak ada jadwal nikah yang akan datang.</p>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach ($upcomingWeddings as $wedding)
                    <li class="py-4">
                        <p class="font-bold text-lg">Pernikahan {{ $wedding->groom_name }} & {{ $wedding->bride_name }}</p>
                        <p class="text-gray-600">Tanggal: {{ \Carbon\Carbon::parse($wedding->confirmed_date)->translatedFormat('d F Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection