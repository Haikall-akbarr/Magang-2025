@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Pilih Jadwal Akad Nikah</h2>
    <div id="calendar-container" class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-center text-gray-500 mb-4">
            Anda bisa memilih tanggal yang tersedia pada kalender di bawah.
        </p>

        <div class="mt-8">
            <h3 class="text-xl font-bold mb-4">Slot Tersedia</h3>
            <ul class="space-y-2">
                @php
                    $availableDates = [
                        '2025-08-20' => ['slots' => 5, 'text' => 'Tersedia'],
                        '2025-08-21' => ['slots' => 3, 'text' => 'Tersedia'],
                        '2025-08-22' => ['slots' => 0, 'text' => 'Penuh'],
                    ];
                @endphp

                @foreach ($availableDates as $date => $info)
                    @if ($info['slots'] > 0)
                        <li class="p-4 bg-green-100 rounded-lg flex justify-between items-center">
                            <span class="font-semibold">{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}:</span> 
                            <span class="text-green-600">{{ $info['slots'] }} slot tersedia</span>
                            <a href="{{ route('user.form', ['date' => $date]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded-lg text-sm transition duration-300">
                                Pilih
                            </a>
                        </li>
                    @else
                        <li class="p-4 bg-gray-200 rounded-lg text-gray-500">
                            <span class="font-semibold">{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}:</span> 
                            Penuh
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection