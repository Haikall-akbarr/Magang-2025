@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Dashboard Staff KUA</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-2">Pendaftaran Baru</h3>
            <p class="text-gray-600 text-3xl font-bold">{{ $pendingRegistrations }}</p>
            <a href="{{ route('staff.registrations') }}" class="text-blue-500 hover:underline mt-4 block">Lihat Selengkapnya</a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-2">Jadwal Minggu Ini</h3>
            <p class="text-gray-600 text-3xl font-bold">5</p>
            <a href="#" class="text-blue-500 hover:underline mt-4 block">Lihat Jadwal</a>
        </div>
    </div>
</div>
@endsection