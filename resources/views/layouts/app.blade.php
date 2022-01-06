<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <nav class="bg-gray-100 dark:bg-gray-800 shadow ">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                    <a class="flex-shrink-0 text-xl font-bold" href="{{ route('items.index') }}">{{ config('app.name', 'Laravel') }}</a>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a class="text-gray-500  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('items.index') }}">
                                Home
                            </a>
                            @guest
                            <a class="text-gray-500 dark:text-white  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('login') }}">
                                Login
                            </a>
                            <a class="text-gray-500  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="{{ route('register') }}">
                                Register
                            </a>
                            @endguest
                            <a class="text-gray-500  hover:text-gray-800 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/#">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
                @auth
                <div class="block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div class="relative inline-block text-left">
                                <div class="auth-menu-trigger">
                                    <button type="button" class="flex items-center justify-center w-full rounded-md  px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-50 hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500" id="options-menu">
                                        <span class="material-icons">
                                            person_pin
                                            </span>
                                    </button>
                                </div>
                                <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden auth-menu">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="#" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    {{ Auth::user()->name }}
                                                </span>
                                            </span>
                                        </a>
                                        <hr>
                                        @if (Auth::id() == 1)
                                        <a href="{{ route('categories.create') }}" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Add category
                                                </span>
                                            </span>
                                        </a>
                                        <a href="#" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Add item
                                                </span>
                                            </span>
                                        </a>
                                        @endif
                                        <a href="{{ route('orders.gethistory', ['user' => Auth::id()]) }}" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600">
                                            Purchase history
                                        </a>
                                        <a href="#" class="block block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white dark:hover:bg-gray-600" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="flex flex-col">
                                                <span>
                                                    Logout
                                                </span>
                                            </span>
                                        </a>
                                        <form action="{{ route('logout') }}" method="post" id="logout-form">
                                        @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                <div class="-mr-2 flex md:hidden">
                    <button class="text-gray-800 dark:text-white hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" class="h-8 w-8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
        <main>
            @yield('content')

            <footer class="bg-gray-100">
                <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                    <a href="{{ route('items.index') }}" class="text-xl font-bold text-gray-500 hover:text-gray-400">PaiShop</a>
                    <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
                </div>
            </footer>
        </main>

        <script src="{{ mix('js/nav-menu.js') }}"></script>
</body>
</html>
