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

<body class="bg-black text-white relative ">
    <div class="border-b-2 border-white/10">
        <header class="max-w-4xl mx-auto px-4 flex justify-between items-center h-16 ">
            <a href="{{ route('dashboard') }}" class="font-extrabold text-white text-3xl cursor-pointer">HireMe.ps</a>
            <ul class="hidden md:flex space-x-6">
                @auth
                    <li class="">
                        <a href="{{ route('register') }}" class="rounded-lg bg-white/10 px-4 py-2 text-white">Explore
                            Projects</a>
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
    </div>
    <div id="mobile-menu"
        class="hidden absolute top-16 right-4 w-56 bg-gray-900/90 backdrop-blur-md rounded-xl shadow-xl p-4 flex flex-col gap-3 z-50">
        @auth
            <a href="{{ route('register') }}" class="rounded-lg bg-white/10 px-4 py-2 text-white">Explore
                Projects</a>

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

    <!-- Main Content -->
    <div class="py-16 relative z-10 container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h5 class="text-2xl font-extrabold text-white mb-6 tracking-wide uppercase">
                About the Platform
            </h5>
            <p class="text-gray-300 leading-relaxed mb-4">
                Our platform serves as a Palestinian-driven talent hub, dedicated to connecting skilled professionals
                with meaningful opportunities across Palestine and the Arab world.
            </p>
            <p class="text-gray-300 leading-relaxed mb-4">
                We provide a trusted space for talents to showcase their skills and projects, enabling companies and
                entrepreneurs to discover, connect, and collaborate with the right people.
            </p>
            <p class="text-gray-300 leading-relaxed">
                With a strong commitment to empowering local expertise, our mission is to highlight Palestinian
                creativity while opening doors to regional and global opportunities.
            </p>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="py-16 relative z-10 container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h5 class="text-2xl font-extrabold text-white mb-6 tracking-wide uppercase">
                How It Works
            </h5>
            <p class="text-gray-300 leading-relaxed mb-12">
                The platform makes it simple for talents and companies to connect.
                Here’s how it works in just a few steps:
            </p>

            <div class="grid md:grid-cols-4 gap-8 text-left">
                <!-- Step 1 -->
                <div class="bg-gray-500/30 p-6 rounded-md shadow-lg">
                    <svg class="w-10 h-10" id="fi_12528728" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" data-name="line copy">
                        <linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="4"
                            x2="60" y1="32" y2="32">
                            <stop offset="0" stop-color="#00c0ff"></stop>
                            <stop offset="1" stop-color="#5558ff"></stop>
                        </linearGradient>
                        <path
                            d="m44.96177 29.67877c-10.95223-.15567-18.637 11.95894-13.52351 21.85837a15.10531 15.10531 0 0 0 13.52351 8.3746c20.05195-.83057 20.05-29.40381 0-30.23297zm0 28.22944a13.113 13.113 0 1 1 13.11295-13.113 13.1462 13.1462 0 0 1 -13.11295 13.113zm7.6634-16.0281h-4.74827v-4.73829a2.91508 2.91508 0 1 0 -5.83015.00006l-.00006 4.73823h-4.74832a2.92012 2.92012 0 0 0 0 5.84024h4.74832v4.7383a2.91511 2.91511 0 0 0 5.83021 0v-4.7383h4.74827a2.89636 2.89636 0 0 0 2.06366-.86149 2.93642 2.93642 0 0 0 -2.06366-4.97875zm.65117 3.55623a.92.92 0 0 1 -.65117.28049h-5.75a.99829.99829 0 0 0 -1.00176 1.00176v5.74006a.91177.91177 0 0 1 -1.82323-.00006v-5.74a.99823.99823 0 0 0 -1.0017-1.00176h-5.75011a.91661.91661 0 0 1 0-1.83319h5.75008a1.00465 1.00465 0 0 0 1.0017-1.00176v-5.74006a.91166.91166 0 0 1 1.82323.00006v5.74a1.0047 1.0047 0 0 0 1.00176 1.00176h5.75a.92051.92051 0 0 1 .6512 1.5527zm-24.0521 6.10066a19.40275 19.40275 0 0 0 1.02176 2.00354h-23.67146a2.57366 2.57366 0 0 1 -2.57454-2.57445v-19.1937a8.37009 8.37009 0 0 1 8.70525-8.34459 1.03515 1.03515 0 0 1 .7112.29032 12.70984 12.70984 0 0 0 17.9114.00025 1.35411 1.35411 0 0 1 1.08189-.29057 8.34055 8.34055 0 0 1 7.62337 4.97875 14.6619 14.6619 0 0 0 -1.88331.69121 6.32642 6.32642 0 0 0 -5.7-3.66649 14.67608 14.67608 0 0 1 -20.15531 0 6.33835 6.33835 0 0 0 -6.291 6.34112v19.1937a.56449.56449 0 0 0 .571.57093zm-6.84775-26.10182a10.67346 10.67346 0 1 0 -10.673-10.67346 10.68607 10.68607 0 0 0 10.673 10.67346zm0-19.34345a8.67 8.67 0 1 1 -8.6695 8.67 8.67993 8.67993 0 0 1 8.6695-8.67z"
                            fill="url(#linear-gradient)"></path>
                    </svg>
                    <h6 class="text-lg font-semibold text-white my-3">1. Create an Account</h6>
                    <p class="text-gray-400">Sign up and build your profile (Soon..).</p>
                </div>

                <!-- Step 2 -->
                <div class="bg-gray-500/30 p-6 rounded-md shadow-lg">
                    <svg class="w-10 h-10" id="fi_9564145" height="512" viewBox="0 0 64 64" width="512"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        data-name="FLATICON FLAT">
                        <linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="4"
                            x2="60" y1="32.168" y2="32.168">
                            <stop offset="0" stop-color="#00c0ff"></stop>
                            <stop offset="1" stop-color="#5558ff"></stop>
                        </linearGradient>
                        <path
                            d="m55.19 5.51h-46.38a4.80974 4.80974 0 0 0 -4.81 4.8v4.31h56v-4.31a4.80974 4.80974 0 0 0 -4.81-4.8zm-42.55 6.06a1.14034 1.14034 0 0 1 0-2.28 1.14034 1.14034 0 0 1 0 2.28zm4.56 0a1.14013 1.14013 0 0 1 .00005-2.28 1.14013 1.14013 0 0 1 -.00005 2.28zm4.55 0a1.14013 1.14013 0 0 1 .00005-2.28 1.14013 1.14013 0 0 1 -.00005 2.28zm4.9 0a1.14013 1.14013 0 0 1 0-2.28 1.14013 1.14013 0 0 1 0 2.28zm26.01-.14h-13.15a1.00012 1.00012 0 0 1 .00005-2h13.14995a1.00012 1.00012 0 0 1 0 2zm4.28 45.68a1.00075 1.00075 0 0 1 -1.4099 1.42c-.35489-.3565-6.74363-6.72924-6.88008-6.87008a8.13092 8.13092 0 0 1 -10.61982-.75992c-5.11692-5.0085-1.39986-13.97714 5.75958-13.88991 6.71827-.14843 10.63844 8.15499 6.31022 13.25991.37878.37667 6.84 6.84 6.84 6.83994zm-52.94-40.49v27.08a4.80978 4.80978 0 0 0 4.81 4.8h25.41a9.88234 9.88234 0 0 1 -.48-2c-1.31423-9.478 10.34449-15.37051 17.22011-8.52988a10.17653 10.17653 0 0 1 2.39989 10.52988h1.83a4.80978 4.80978 0 0 0 4.81-4.8v-27.08zm15.6 8.62c.075-4.99545 8.1016-4.99522 8.17 0v4.51a3.83432 3.83432 0 0 1 -4.46 3.70986 3.715 3.715 0 0 1 -3.71-3.70986zm-9.47 4.21a1.00019 1.00019 0 0 1 2 .00006 1.87385 1.87385 0 0 0 1.86 2.00994 1.85219 1.85219 0 0 0 1.85-1.85v-6.08h-2.76a1.00012 1.00012 0 0 1 0-2h3.76a1.003 1.003 0 0 1 1 1v7.08a3.856 3.856 0 1 1 -7.71-.16zm1 7.71h8.22a1.00016 1.00016 0 0 1 -.00006 2h-8.21994a1.00011 1.00011 0 0 1 0-2zm0 4.88h12.56a1.00011 1.00011 0 0 1 0 2h-12.56a1.00011 1.00011 0 0 1 0-2zm26.02-16.72a3.14642 3.14642 0 0 1 -.87 2.18 3.14631 3.14631 0 0 1 .87 2.18 3.281 3.281 0 0 1 -3.18012 3.77994l-3.36988.00006a.99654.99654 0 0 1 -1-1v-9.93a1.003 1.003 0 0 1 1-1h3.37a3.28831 3.28831 0 0 1 3.18 3.79zm-2 4.36v.6a1.18218 1.18218 0 0 1 -1.18 1.18h-2.37v-2.96h2.37a1.18218 1.18218 0 0 1 1.18 1.18zm0-4.97v.61a1.18222 1.18222 0 0 1 -1.18 1.18h-2.37v-2.97h2.37a1.18222 1.18222 0 0 1 1.18 1.18zm-13.55 5.04v-4.51a1.71571 1.71571 0 0 1 1.71-1.71h.75a1.70926 1.70926 0 0 1 1.71 1.71v4.51a1.70286 1.70286 0 0 1 -1.71 1.71h-.75a1.70921 1.70921 0 0 1 -1.71-1.71z"
                            fill="url(#linear-gradient)"></path>
                    </svg>

                    <h6 class="text-lg font-semibold text-white my-3">2. Explore Opportunities</h6>
                    <p class="text-gray-400">Browse jobs and projects tailored to your skills.</p>
                </div>

                <!-- Step 3 -->
                <div class="bg-gray-500/30 p-6 rounded-md shadow-lg">
                    <svg class="w-10 h-10" id="fi_10984744" enable-background="new 0 0 512 512"
                        viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="109.856" x2="402.12"
                            y1="509.119" y2="2.903">
                            <stop offset="0" stop-color="#57ffd9"></stop>
                            <stop offset="1" stop-color="#2a6eff"></stop>
                        </linearGradient>
                        <path
                            d="m389.398 14.342c-67.052 0-121.603 54.551-121.603 121.603 0 17.003 3.598 33.914 10.448 49.361l-99.492 57.442 17.031-42.333c9.426-23.428-.462-38.211-11.793-43.751-18.1-8.851-47.148-.26-64.43 29.438-17.493 30.061-27.711 52.602-35.922 70.714-14.456 31.892-21.72 47.914-51.491 66.17l-27.156 15.736c-3.818 2.213-5.124 7.1-2.917 10.922l83.146 144.014c1.062 1.839 2.812 3.181 4.863 3.729.679.182 1.373.271 2.064.271 1.396 0 2.781-.365 4.01-1.078l32.914-19.066c47.443.94 97.366-24.735 116.834-35.975l31.765-18.339c7.313-4.222 12.552-11.064 14.75-19.266s1.083-16.746-3.141-24.061c-3.502-6.066-8.721-10.539-14.691-13.159 6.768-9.776 7.748-22.987 1.418-33.95-3.739-6.479-9.448-11.14-15.943-13.665 5.616-9.536 6.089-21.75.171-32-2.857-4.949-6.855-8.837-11.474-11.523l70.182-40.519c20.633 14.727 44.865 22.491 70.457 22.491 67.052 0 121.602-54.551 121.602-121.603s-54.55-121.603-121.602-121.603zm-294.329 464.377-75.147-130.158 20.332-11.781c.057-.032.112-.065.168-.1.18-.11.349-.22.527-.33l75.16 130.181zm109.198-195.93c-3.826 2.209-5.138 7.102-2.928 10.928 1.481 2.566 4.17 4.001 6.936 4.001 1.356 0 2.732-.346 3.992-1.073l12.648-7.302.02-.011c3.607-2.073 7.828-2.615 11.891-1.526 4.073 1.091 7.465 3.682 9.551 7.295 4.334 7.506 1.753 17.138-5.752 21.47l-7.859 4.537c-3.82 2.206-5.135 7.089-2.937 10.914s7.078 5.153 10.907 2.959c7.495-4.283 17.1-1.688 21.413 5.785 4.334 7.506 1.753 17.138-5.752 21.471l-10.414 6.013c-.01.006-.02.011-.03.017v.001c-3.826 2.209-5.138 7.102-2.928 10.928 2.208 3.825 7.1 5.136 10.928 2.929 0 0 0 0 0-.001l.047-.026c7.502-4.298 17.1-1.71 21.424 5.779 2.086 3.613 2.633 7.846 1.542 11.919-1.092 4.073-3.683 7.466-7.296 9.551l-31.765 18.34c-17.973 10.376-63.443 33.879-106.205 33.854l-77.509-134.25c23.079-17.688 31.436-36.103 44.021-63.865 8.061-17.783 18.093-39.915 35.177-69.274 13.727-23.588 34.115-27.737 43.574-23.112 7.112 3.478 8.562 12.009 3.977 23.406l-25.682 63.835c-1.273 3.166-.399 6.791 2.178 9.027 2.577 2.237 6.289 2.596 9.244.887l129.517-74.776c3.611-2.086 7.844-2.636 11.92-1.542 4.073 1.091 7.465 3.682 9.551 7.295 4.322 7.487 1.757 17.109-5.702 21.44zm185.131-41.241c-21.123 0-41.176-6.089-58.492-17.668 6.021-9.638 6.677-22.213.617-32.711-4.223-7.314-11.065-12.553-19.267-14.75-6.699-1.796-13.628-1.378-19.929 1.138-5.592-13.068-8.532-27.298-8.532-41.612 0-58.229 47.373-105.603 105.603-105.603s105.602 47.373 105.602 105.603-47.373 105.603-105.602 105.603zm71.96-163.066c-4.621-4.621-10.766-7.166-17.302-7.166-6.535 0-12.68 2.545-17.301 7.166l-60.953 60.954-17.388-21.88c-4.062-5.109-9.87-8.332-16.356-9.072-6.486-.744-12.87 1.089-17.979 5.15-5.109 4.062-8.331 9.871-9.071 16.355-.741 6.485 1.088 12.871 5.148 17.979l33.656 42.353c4.166 5.83 10.633 9.527 17.784 10.158.724.063 1.444.095 2.163.095 6.458 0 12.657-2.549 17.273-7.165l80.325-80.326c4.621-4.621 7.166-10.766 7.166-17.301.001-6.535-2.544-12.679-7.165-17.3zm-11.315 23.288-80.324 80.325c-1.8 1.8-4.188 2.671-6.718 2.445-2.515-.222-4.784-1.534-6.228-3.601-.095-.136-.193-.268-.296-.397l-33.797-42.53c-1.402-1.764-2.033-3.968-1.777-6.208s1.368-4.245 3.132-5.647c1.507-1.198 3.336-1.834 5.233-1.834.323 0 .648.019.975.056 2.238.256 4.244 1.368 5.646 3.131l22.966 28.9c1.418 1.785 3.531 2.88 5.808 3.01 2.281.131 4.5-.718 6.112-2.33l67.295-67.295c1.599-1.599 3.725-2.48 5.986-2.48 2.263 0 4.389.881 5.987 2.48 3.302 3.302 3.302 8.674 0 11.975z"
                            fill="url(#SVGID_1_)"></path>
                    </svg>
                    <h6 class="text-lg font-semibold text-white my-3">3. Apply & Submit Your CV</h6>
                    <p class="text-gray-400">Send your application and upload your resume.</p>
                </div>

                <!-- Step 4 -->
                <div class="bg-gray-500/30 p-6 rounded-md shadow-lg">
                    <svg class="w-10 h-10" id="fi_12343362" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Layer 1">
                        <linearGradient id="linear-gradient" gradientUnits="userSpaceOnUse" x1="256"
                            x2="256" y1="507.983" y2="4.017">
                            <stop offset="0" stop-color="#9345ff"></stop>
                            <stop offset="0" stop-color="#8e4aff"></stop>
                            <stop offset="1" stop-color="#00c1ff"></stop>
                        </linearGradient>
                        <path
                            d="m337.795 408.073c-12.322-11.322-26.896-19.533-42.619-24.218 16.218-10.35 27.004-28.491 27.004-49.115 0-22.093-12.367-41.351-30.541-51.218v-78.696c0-23.13-16.564-42.654-39.386-46.423l-74.187-12.252c23.352-13.447 36.347-43.959 35.443-71.865-1.175-36.275-24.229-59.715-58.732-59.715s-57.557 23.44-58.732 59.715c-.904 27.92 12.104 58.45 35.479 71.887l-74.054 12.23c-22.822 3.769-39.386 23.293-39.386 46.423v78.599c0 14.717 9.068 27.093 23.101 31.529l16.032 5.067 1.124 16.522h-46.463c-3.866 0-7 3.134-7 7v22.859c0 3.866 3.134 7 7 7h208.565c3.58 4.023 7.709 7.543 12.267 10.451-15.723 4.685-30.297 12.896-42.62 24.219-20.062 18.435-32.453 43.477-34.889 70.513-.019.209-.028.418-.028.628v21.769c0 3.866 3.134 7 7 7h203.539c3.866 0 7-3.134 7-7v-21.769c0-.21-.01-.419-.028-.628-2.436-27.036-14.826-52.078-34.889-70.513zm-60.156-203.247v73.319c-4.395-1.064-8.978-1.642-13.696-1.642-2.894 0-5.738.22-8.52.629l3.023-44.437c.236-3.475-.985-6.921-3.353-9.455-2.367-2.534-5.723-3.987-9.206-3.987h-64.484l-5.935-59.342 74.502 12.304c16.032 2.648 27.667 16.363 27.667 32.611zm-122.778-48.318 6.302 1.041 6.171 61.704h-24.945l6.171-61.704zm-32.888-38.524c-8.081-12.207-12.432-27.969-11.937-43.244.351-10.831 4.614-46.168 44.74-46.168s44.389 35.338 44.74 46.169c.495 15.275-3.856 31.037-11.937 43.244-5.93 8.957-16.417 19.84-32.803 21.087-16.386-1.248-26.874-12.131-32.803-21.087zm-76.569 183.621c-8.091-2.558-13.32-9.693-13.32-18.179v-78.599c0-16.248 11.636-29.963 27.667-32.611l74.503-12.304-5.935 59.342h-64.484c-3.483 0-6.838 1.453-9.205 3.986-2.367 2.534-3.589 5.98-3.354 9.456l4.92 72.321-10.793-3.411zm19.943-68.352h179.029l-3.259 47.916c-20.798 8.896-35.41 29.558-35.41 53.571 0 .605.027 1.203.046 1.804h-133.38zm-46.469 126.15v-8.859h189.026c.865 3.062 1.968 6.023 3.3 8.859zm200.828-24.663c0-24.393 19.844-44.237 44.237-44.237s44.237 19.844 44.237 44.237-19.844 44.236-44.237 44.236-44.237-19.845-44.237-44.236zm139.005 159.242h-189.538v-14.448c4.585-49.181 45.273-86.229 94.77-86.229s90.184 37.047 94.769 86.228v14.449zm125.106-245.458c-15.052-15.052-35.064-23.341-56.351-23.341s-41.3 8.29-56.352 23.341c-31.073 31.073-31.073 81.631 0 112.703 5.791 5.792 12.351 10.606 19.545 14.351-.021 8.62-3.143 19.047-9.311 31.066-1.236 2.408-.973 5.312.676 7.46 1.341 1.746 3.404 2.736 5.551 2.736.492 0 .988-.052 1.48-.158 15.908-3.441 31.046-20.64 37.419-32.12 21.437.261 42.101-8.094 57.342-23.335 31.072-31.072 31.072-81.63 0-112.703zm-9.899 102.805c-13.501 13.501-32.172 20.455-51.235 19.066-3.074-.23-5.935 1.592-7.041 4.471-1.613 4.199-7.014 12.062-13.745 18.464 2.451-8.354 3.265-15.977 2.479-23.02-.273-2.453-1.818-4.58-4.065-5.6-7.185-3.259-13.677-7.762-19.298-13.382-25.614-25.614-25.614-67.291 0-92.905 12.807-12.807 29.629-19.21 46.452-19.21s33.646 6.403 46.452 19.21c25.614 25.614 25.614 67.291 0 92.905zm4.279-46.012c0 3.866-3.134 7-7 7h-87.461c-3.866 0-7-3.134-7-7s3.134-7 7-7h87.461c3.866 0 7 3.134 7 7zm-54.171-27.484c0-3.866 3.134-7 7-7h35.925c3.866 0 7 3.134 7 7s-3.134 7-7 7h-35.925c-3.866 0-7-3.134-7-7zm48.597 54.968c0 3.866-3.134 7-7 7h-76.313c-3.866 0-7-3.134-7-7s3.134-7 7-7h76.313c3.866 0 7 3.134 7 7zm-91.641-54.968c0-3.866 3.134-7 7-7h14.294c3.866 0 7 3.134 7 7s-3.134 7-7 7h-14.294c-3.866 0-7-3.134-7-7zm-81.572-137.269c-.116 7.569-2.9 16.712-8.307 27.248-1.235 2.408-.972 5.312.676 7.459 1.341 1.747 3.404 2.737 5.551 2.737.492 0 .988-.052 1.48-.158 15.316-3.313 28.354-19.115 33.937-28.912.171 0 .341.001.512.001 19.166 0 37.604-7.58 51.252-21.228 28.259-28.26 28.259-74.241 0-102.5-28.26-28.259-74.241-28.258-102.5 0-28.259 28.26-28.259 74.241 0 102.5 5.166 5.167 11.003 9.478 17.398 12.854zm-7.499-105.454c11.4-11.4 26.375-17.101 41.351-17.101s29.95 5.7 41.351 17.101c22.796 22.801 22.799 59.902 0 82.702-12.018 12.019-28.643 18.204-45.609 16.974-3.084-.226-5.936 1.593-7.041 4.471-1.285 3.343-5.273 9.307-10.386 14.595 1.699-6.654 2.216-12.798 1.577-18.528-.273-2.452-1.818-4.58-4.065-5.599-6.395-2.901-12.175-6.909-17.178-11.913-22.801-22.801-22.801-59.9 0-82.702zm17.892 22.547c1.55-11.717 11.631-20.552 23.449-20.552 6.882 0 13.378 2.779 17.825 7.625 5.663 6.17 7.274 15.465 4.105 23.68-1.761 4.563-5.271 8.215-8.368 11.437-.938.976-1.825 1.898-2.551 2.734-2.498 2.876-4.045 5.518-4.045 9.792 0 3.866-3.134 7-7 7s-7-3.134-7-7c0-9.186 3.995-14.964 7.475-18.971.958-1.103 2.011-2.198 3.029-3.257 2.181-2.27 4.654-4.842 5.4-6.775 1.25-3.239.704-6.927-1.359-9.174-1.776-1.936-4.583-3.091-7.51-3.091-4.823 0-8.938 3.606-9.57 8.388-.507 3.833-4.03 6.523-7.857 6.021-3.833-.507-6.528-4.025-6.021-7.857zm30.415 53.098v1.569c0 3.866-3.134 7-7 7s-7-3.134-7-7v-1.569c0-3.866 3.134-7 7-7s7 3.134 7 7zm-185.357 161.241c-10.667 0-19.344 8.678-19.344 19.344s8.678 19.344 19.344 19.344 19.345-8.678 19.345-19.344-8.678-19.344-19.345-19.344zm0 24.688c-2.947 0-5.344-2.397-5.344-5.344s2.397-5.344 5.344-5.344 5.345 2.397 5.345 5.344-2.397 5.344-5.345 5.344z"
                            fill="url(#linear-gradient)"></path>
                    </svg>
                    <h6 class="text-lg font-semibold text-white my-3">3. Interview & Get Hired</h6>
                    <p class="text-gray-400">If accepted, attend an interview and secure your opportunity</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Team Section -->
    <div class="py-16 relative z-10 container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <h5 class="text-2xl font-extrabold text-white mb-12 tracking-wide uppercase">
                Our Team
            </h5>
            <p class="text-gray-300 mb-12">
                Meet the talented individuals behind our platform, committed to connecting skills with opportunities.
            </p>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Team Member 1 -->
                <div class="bg-gray-900/50 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <img src="{{ asset('images/ibrahim.jpg') }}" alt="Team member ibrahim tabash"
                        class="w-28 h-28 rounded-full object-cover mb-4">
                    <h6 class="text-white font-semibold text-lg">Ibrahim Tabash</h6>
                    <p class="text-gray-400">Founder & CEO</p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-gray-900/50 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <img src="{{ asset('images/yousef.jpg') }}" alt="Team member Yousef Alnather"
                        class="w-28 h-28 rounded-full object-cover mb-4">
                    <h6 class="text-white font-semibold text-lg">Yousef Alnather</h6>
                    <p class="text-gray-400">Full-Stack Developer</p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-gray-900/50 p-6 rounded-2xl shadow-lg flex flex-col items-center">
                    <img src="{{ asset('images/adam.jpg') }}" alt="Team member Adam Saleh"
                        class="w-28 h-28 rounded-full object-cover mb-4">
                    <h6 class="text-white font-semibold text-lg">Adam Saleh</h6>
                    <p class="text-gray-400">Frontend Developer</p>
                </div>
            </div>
        </div>
    </div>



    <footer class="bg-gray-500/30 w-full">
        <ul class="max-w-4xl py-10 mx-auto flex flex-col md:flex-row justify-evenly md:items-center h-auto md:h-20">
            <li class="px-3 py-3">
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'bg-slate-600' : '' }} rounded-2xl px-3 py-1">About Us</a>
            </li>
            <li class="px-3 py-3">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'bg-slate-600' : '' }} rounded-2xl px-3 py-1">Explore
                    Projects</a>
            </li>
            <li class="px-3 py-3">
                <a href="https://wa.me/972567244201?text=مرحبا، أريد الاستفسار عن خدماتكم
" target="_blank"
                    class="rounded-2xl px-3 py-1">Join As
                    Company Owner</a>
            </li>
        </ul>
    </footer>



    <script>
        let menuBtn = document.getElementById('menu-btn');
        let mobileMenu = document.getElementById('mobile-menu');
        menuBtn.onclick = () => {
            mobileMenu.classList.toggle('hidden');
        }
    </script>
</body>

</html>
