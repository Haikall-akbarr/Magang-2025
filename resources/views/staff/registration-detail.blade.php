@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-6">Detail Pendaftaran Nikah #{{ $registration->id }}</h2>
    
    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="font-bold text-xl mb-2">Data Calon Pengantin</h3>
                <p><strong>Calon Pria:</strong> {{ $registration->groom_name }}</p>
                <p><strong>Calon Wanita:</strong> {{ $registration->bride_name }}</p>
                <p><strong>Tanggal Pilihan:</strong> {{ \Carbon\Carbon::parse($registration->wedding_date)->translatedFormat('l, d F Y') }}</p>
                <p><strong>Status:</strong> {{ ucfirst($registration->status) }}</p>
            </div>
            <div>
                <h3 class="font-bold text-xl mb-2">Berkas Persyaratan</h3>
                <p class="text-gray-600">
                    <a href="#" class="text-blue-500 hover:underline">Unduh Berkas KTP</a>
                </p>
            </div>
        </div>

        @if ($registration->status === 'pending')
        <div class="mt-8">
            <h3 class="font-bold text-xl mb-4">Konfirmasi Pendaftaran</h3>
            <form method="POST" action="{{ route('staff.registration.confirm', ['id' => $registration->id]) }}">
                @csrf
                <div class="mb-4">
                    <label for="confirmed_date" class="block text-gray-700 text-sm font-bold mb-2">Pilih Tanggal Konfirmasi</label>
                    <input type="date" id="confirmed_date" name="confirmed_date" class="w-full px-3 py-2 border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="penghulu_id" class="block text-gray-700 text-sm font-bold mb-2">Pilih Penghulu</label>
                    <select id="penghulu_id" name="penghulu_id" class="w-full px-3 py-2 border rounded-md" required>
                        <option value="">Pilih Penghulu</option>
                        @foreach ($penghulus as $penghulu)
                            <option value="{{ $penghulu->id }}">{{ $penghulu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Konfirmasi Pendaftaran
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection