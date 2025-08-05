@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8 text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di Sistem Pendaftaran Nikah KUA</h1>
    <p class="text-gray-600 text-lg mb-8">
        Silakan daftar atau login untuk melanjutkan proses pendaftaran pernikahan Anda.
    </p>
    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300">
        Mulai Pendaftaran
    </a>
</div>
@endsection