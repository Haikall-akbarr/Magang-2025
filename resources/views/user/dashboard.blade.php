@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 text-center">
    <h1 class="text-3xl font-bold mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="text-gray-600 mb-8">Anda berhasil login sebagai calon pengantin.</p>
    
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h3 class="text-xl font-semibold mb-4">Mulai Pendaftaran Nikah</h3>
        <p class="mb-4">
            Silakan pilih tanggal yang tersedia untuk melaksanakan akad nikah Anda.
        </p>
        <a href="{{ route('user.schedule') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Pilih Tanggal Nikah
        </a>
    </div>
</div>
@endsection