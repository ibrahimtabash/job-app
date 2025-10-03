<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'HireMe.ps' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js Cloak -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- flex items-center justify-center --}}

<body class="bg-black text-white min-h-screen flex flex-col relative overflow-hidden">
    {{-- <div class="border-b-2 border-white/10">
        <header class="container mx-auto px-4 flex justify-between items-center h-16 ">
            <a href="{{ route('dashboard') }}" class="font-extrabold text-white text-3xl cursor-pointer">HireMe.ps</a>
            <ul class="hidden md:flex space-x-6">
                <li class="">
                    <a href="{{ route('register') }}" class="rounded-lg bg-white/10 px-4 py-2 text-white">Create an
                        account</a>
                </li>
                <li class="">
                    <a href="{{ route('login') }}"
                        class="rounded-lg bg-gradient-to-t from-indigo-500 to-rose-500 px-4 py-2 text-white">Login</a>
                </li>
            </ul>
            <button class="md:hidden" id="menu-btn" onclick="">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" id="fi_10613684">
                    <linearGradient id="paint0_linear_2100_2530" gradientUnits="userSpaceOnUse" x1="3"
                        x2="16.569" y1="5" y2="22.446">
                        <stop offset="0" stop-color="#4ea2ea"></stop>
                        <stop offset=".244792" stop-color="#484dff"></stop>
                        <stop offset=".484375" stop-color="#cd0ef3"></stop>
                        <stop offset=".723958" stop-color="#f640bb"></stop>
                        <stop offset=".950204" stop-color="#fb6d64"></stop>
                    </linearGradient>
                    <path clip-rule="evenodd"
                        d="m4 5c-.55228 0-1 .44772-1 1s.44772 1 1 1h16c.5523 0 1-.44772 1-1s-.4477-1-1-1zm-1 7c0-.5523.44772-1 1-1h16c.5523 0 1 .4477 1 1s-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1zm0 6c0-.5523.44772-1 1-1h16c.5523 0 1 .4477 1 1s-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"
                        fill="url(#paint0_linear_2100_2530)" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>

    </div> --}}
    <div class="border-b-2 border-white/10">
        <header class="max-w-4xl mx-auto px-4 flex justify-between items-center h-16 ">
            <a href="{{ route('dashboard') }}" class="font-extrabold text-white text-3xl cursor-pointer">HireMe.ps</a>
            <ul class="hidden md:flex space-x-6">
                @auth
                    <li class="">
                        <form action="{{ route('logout') }}" method="POST"
                            class="rounded-lg bg-white/10 px-4 py-2 text-red-500">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        {{-- <a href="{{ route('register') }}" class="rounded-lg bg-white/10 px-4 py-2 text-white">Explore
                            Projects</a> --}}
                    </li>
                @endauth
                @guest
                    <li class="">
                        <a href="{{ route('register') }}" class="rounded-lg bg-white/10 px-4 py-2 text-white">Create an
                            account</a>
                    </li>
                    <li class="">
                        <a href="{{ route('login') }}"
                            class="rounded-lg bg-gradient-to-t from-indigo-500 to-rose-500 px-4 py-2 text-white">Login</a>
                    </li>
                @endguest

            </ul>
            <button class="md:hidden" id="menu-btn">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" id="fi_10613684">
                    <linearGradient id="paint0_linear_2100_2530" gradientUnits="userSpaceOnUse" x1="3"
                        x2="16.569" y1="5" y2="22.446">
                        <stop offset="0" stop-color="#4ea2ea"></stop>
                        <stop offset=".244792" stop-color="#484dff"></stop>
                        <stop offset=".484375" stop-color="#cd0ef3"></stop>
                        <stop offset=".723958" stop-color="#f640bb"></stop>
                        <stop offset=".950204" stop-color="#fb6d64"></stop>
                    </linearGradient>
                    <path clip-rule="evenodd"
                        d="m4 5c-.55228 0-1 .44772-1 1s.44772 1 1 1h16c.5523 0 1-.44772 1-1s-.4477-1-1-1zm-1 7c0-.5523.44772-1 1-1h16c.5523 0 1 .4477 1 1s-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1zm0 6c0-.5523.44772-1 1-1h16c.5523 0 1 .4477 1 1s-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"
                        fill="url(#paint0_linear_2100_2530)" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
    </div>

    <div id="mobile-menu"
        class="hidden absolute top-16 right-4 w-56 bg-gray-900/90 backdrop-blur-md rounded-xl shadow-xl p-4 flex flex-col gap-3 z-50">
        @auth
            <form action="{{ route('logout') }}" method="POST" class="rounded-lg bg-white/10 px-4 py-2 text-red-500">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('register') }}"
                class="px-4 py-3 bg-white/10 text-white rounded-lg text-center font-medium hover:bg-white/20 transition">
                Create an account
            </a>
            <a href="{{ route('login') }}"
                class="px-4 py-3 bg-gradient-to-r from-indigo-500 to-rose-500 text-white rounded-lg text-center font-medium hover:opacity-90 transition">
                Login
            </a>
        @endguest
    </div>


    <!-- Floating Background Shapes -->
    {{-- <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute top-[15%] left-[-10%] md:left-[-5%] w-[600px] h-[140px] rotate-12 gradient-bg bg-indigo-500/15 blur-2xl rounded-full">
        </div>
        <div
            class="absolute top-[70%] right-[-5%] md:right-[0%] w-[500px] h-[120px] -rotate-15 gradient-bg bg-rose-500/15 blur-2xl rounded-full">
        </div>
        <div
            class="absolute bottom-[5%] left-[5%] md:left-[10%] w-[300px] h-[80px] -rotate-8 gradient-bg bg-violet-500/15 blur-2xl rounded-full">
        </div>
        <div
            class="absolute top-[10%] right-[15%] md:right-[20%] w-[200px] h-[60px] rotate-20 gradient-bg bg-amber-500/15 blur-2xl rounded-full">
        </div>
    </div> --}}

    <!-- Main Content -->
    <main class="flex-1 flex justify-center items-center">
        <div class="h-1/2 w-full text-center">
            {{ $slot }}
        </div>
    </main>
    <!-- Bottom Gradient -->
    {{-- <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/80 pointer-events-none"></div> --}}

    <script>
        let menuBtn = document.getElementById('menu-btn');
        let mobileMenu = document.getElementById('mobile-menu');
        menuBtn.onclick = () => {
            mobileMenu.classList.toggle('hidden');
        }
    </script>
</body>

</html>
