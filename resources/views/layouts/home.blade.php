<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        {{------- yield title  --}}
        <title> @yield("title") </title>

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
                            <a href="/">
                                <span class="text-white text-xl font-bold">home</span>
                            </a>
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


        {{------- yield title  --}}
          @yield("main-content")
            <!-- Footer -->
            <footer class="w-full bg-gray-50/80 dark:bg-black/10 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-black dark:text-white/70">
                    <span class="text-white text-md font-bold">AskAround</span> - ask questions and get fast responses
                </div>
            </footer>
        </div>
    </body>
</html>