@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Formulir Pendaftaran Nikah</h2>
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
        <h3 class="text-xl font-semibold mb-4">Tanggal Akad: {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('l, d F Y') }}</h3>
        
        <form method="POST" action="{{ route('user.submit.form') }}" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="wedding_date" value="{{ $selectedDate }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h4 class="font-bold text-lg mb-2">Data Calon Pria</h4>
                    <div class="mb-4">
                        <label for="groom_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" id="groom_name" name="groom_name" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-2">Data Calon Wanita</h4>
                    <div class="mb-4">
                        <label for="bride_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" id="bride_name" name="bride_name" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                </div>
            </div>

            <h4 class="font-bold text-lg mb-2">Unggah Berkas Persyratan Nikah</h4>
            <div class="mb-4">
                <label for="file_ktp" class="block text-gray-700 text-sm font-bold mb-2">KTP Calon Pria & Wanita (PDF/JPG)</label>
                <input type="file" id="file_ktp" name="file_ktp" class="w-full px-3 py-2 border rounded-md" required>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Ajukan Pendaftaran Nikah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection