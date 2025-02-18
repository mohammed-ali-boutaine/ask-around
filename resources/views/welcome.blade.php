<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px] h-full" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            
            <!-- Header -->
            <header class="w-full bg-gray-50/80 dark:bg-black/0 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-3 items-center py-4">
                        <!-- Logo -->
                        <div class="col-span-1">
                            <span class="text-white text-xl font-bold">AskAround</span>
                        </div>
                        
                        <!-- Navigation -->
                        @if (Route::has('login'))
                            <nav class="col-span-2 flex justify-end -mx-3">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md mr-2 px-3 py-2 text-white border border-[#FF2D20] transition-all duration-300  hover:shadow-lg hover:shadow-[#FF2D20]/60 focus:outline-none"
                                        >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 bg-[#FF2D20] text-white transition-all duration-300 hover:bg-transparent border-transparent border hover:border-[#FF2D20] focus:outline-none"
                                            >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-grow flex items-center">
                <div class="max-w-7xl mx-auto px-6 py-12 w-full">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                            Discover Cities Around the World
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-white/70">
                            Get instant answers about any city's culture, attractions, lifestyle, and more. Your city guide companion.
                        </p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <form action="/search" method="GET" class="w-full max-w-md">
                                <div class="flex gap-x-4">
                                    <input 
                                        type="text" 
                                        name="city" 
                                        placeholder="Enter a city name..."
                                        class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-[#FF2D20] sm:text-sm sm:leading-6"
                                    >
                                    <button 
                                        type="submit"
                                        class="rounded-md bg-[#FF2D20] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#FF2D20]/80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF2D20]"
                                    >
                                        Ask Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col items-center p-6 bg-white/5 rounded-lg">
                            <svg class="h-8 w-8 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"></path>
                            </svg>
                            <h3 class="mt-4 text-lg font-semibold text-white">Local Insights</h3>
                            <p class="mt-2 text-sm text-white/70 text-center">Get authentic information about local culture, customs, and daily life.</p>
                        </div>

                        <div class="flex flex-col items-center p-6 bg-white/5 rounded-lg">
                            <svg class="h-8 w-8 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                            <h3 class="mt-4 text-lg font-semibold text-white">Travel Tips</h3>
                            <p class="mt-2 text-sm text-white/70 text-center">Discover the best attractions, restaurants, and hidden gems.</p>
                        </div>

                        <div class="flex flex-col items-center p-6 bg-white/5 rounded-lg">
                            <svg class="h-8 w-8 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <h3 class="mt-4 text-lg font-semibold text-white">Living Costs</h3>
                            <p class="mt-2 text-sm text-white/70 text-center">Compare living expenses, housing costs, and lifestyle budgets.</p>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="w-full bg-gray-50/80 dark:bg-black/10 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-black dark:text-white/70">
                    <span class="text-white text-md font-bold">AskAround</span> - ask questions and get fast responses
                </div>
            </footer>
        </div>
    </body>
</html>