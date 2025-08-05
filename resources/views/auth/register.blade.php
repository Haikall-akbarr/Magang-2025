@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Registrasi Calon Pengantin</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                    Daftar
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('login') }}">
                    Sudah punya akun? Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection