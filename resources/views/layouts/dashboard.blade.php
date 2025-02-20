<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        {{------- yield title  --}}
        <title> @yield("title") </title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
            <!-- Header -->
            <header class="w-full bg-gray-50/80 dark:bg-black/80 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="flex items-center justify-between py-4">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <a href="/dashboard">
                                <span class="text-white text-xl font-bold">dashboard</span>
                            </a>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('dashboard') }}"class="flex items-center flex-1 max-w-2xl mx-8">
                            <div class="relative w-full">
                                <input 
                                    name="city" 
                                    type="text" 
                                    value="{{ request('city') }}"
                                    id="city-search" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                           focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full ps-10 p-2.5
                                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                           dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]" 
                                    placeholder="Enter city..." 
                                />
                            </div>
                            <div class="relative w-full ml-2">
                                <input 
                                    name="keywords" 
                                    type="text" 
                                    id="keyword-search" 
                                     value="{{ request('keywords') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                           focus:ring-[#FF2D20] focus:border-[#FF2D20] block w-full ps-10 p-2.5
                                           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                           dark:text-white dark:focus:ring-[#FF2D20] dark:focus:border-[#FF2D20]" 
                                    placeholder="Search keywords..." 
                                />
                            </div>
                            <button 
                                type="submit" 
                                class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white 
                                       bg-[#FF2D20] rounded-lg border border-[#FF2D20] hover:bg-transparent 
                                       hover:text-[#FF2D20] focus:ring-4 focus:outline-none focus:ring-[#FF2D20]/50 
                                       transition-all duration-300"
                            >
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>Search
                            </button>
                        </form>
                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button 
                                type="button" 
                                class="flex items-center text-white hover:text-[#FF2D20] transition-colors duration-300"
                                id="profile-menu-button"
                                aria-expanded="false"
                                aria-haspopup="true"
                            >
                                <img class="w-8 h-8 rounded-full mr-2" src="{{Auth::user()->picture ? asset('storage/' . Auth::user()->picture) : asset('https://picsum.photos/32/32') }}"   alt="User profile" />
                                <span class="mr-2">{{Auth::user()->username}}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div 
                                class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg py-1
                                       group-hover:block hover:block"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="profile-menu-button"
                            >
                                <a href="/profile" 
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                   role="menuitem"
                                >Profile</a>
                                <a href="/saved" 
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                   role="menuitem"
                                >Saved Items</a>
                                <a href="/statistics" 
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                role="menuitem"
                             >Statistics</a>
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                <p
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                role="menuitem"
                             >
                             <form action="{{ route('logout') }}" method="POST">
                                 @csrf
                                 <button class="block w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                 type="submit">Logout</button>
                             </form>
                         </p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content -->
          {{------- yield title  --}}
          @yield("main-content")

            <!-- Footer -->
            <footer class="w-full bg-gray-50/80 dark:bg-black/80 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-black dark:text-white/70">
                    <span class="text-white text-md font-bold">AskAround</span> - ask questions and get fast responses
                </div>
            </footer>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>