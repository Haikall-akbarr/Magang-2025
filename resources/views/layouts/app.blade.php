<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Nikah KUA</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">
        <nav class="bg-white shadow-md p-4 mb-8">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="font-bold text-xl text-gray-800">KUA KAYUTANGI</a>
                <div>
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 mx-2">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 mx-2">Daftar</a>
                    @else
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-red-500 hover:text-red-700 mx-2">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>