@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 text-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-lg mx-auto">
        <h2 class="text-3xl font-bold text-green-600 mb-4">Pendaftaran Berhasil!</h2>
        <p class="text-gray-600 mb-4">
            Terima kasih, pendaftaran Anda telah kami terima dan sedang menunggu konfirmasi dari pihak staff KUA.
        </p>
        <p class="text-gray-600 mb-6">
            Anda akan menerima notifikasi jika pendaftaran Anda sudah dikonfirmasi.
        </p>
        <a href="{{ route('user.dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Kembali ke Dashboard awal nikah 
        </a>
    </div>
</div>
@endsection