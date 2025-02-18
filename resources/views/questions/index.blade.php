<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Questions - AskAround</title>
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
                            <span class="text-white text-xl font-bold">AskAround</span>
                        </div>
                        <!-- Search Form -->
                        <form action="{{ route('questions.index') }}"class="flex items-center flex-1 max-w-2xl mx-8">
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
                                <img class="w-8 h-8 rounded-full mr-2" src="/api/placeholder/32/32" alt="User profile" />
                                <span class="mr-2">John Doe</span>
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
                                <a href="#profile" 
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                   role="menuitem"
                                >Profile</a>
                                <a href="#saved" 
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                   role="menuitem"
                                >Saved Items</a>
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                <a href="#logout" 
                                   class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700" 
                                   role="menuitem"
                                >Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content -->
            <main class="flex-grow">

                <div class="max-w-7xl mx-auto px-6 py-8">
                    {{-- ---------------    sub nab ------------------ --}}
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-3xl font-bold text-white">Recent Questions</h1>
                
                        <div class="flex items-center">
                            {{-- <div class="relative inline-block text-left">
                                <div>
                                    <button type="button" 
                                            class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" 
                                            id="menu-button" 
                                            onclick="toggleDropdown()">
                                        Sort
                                        <svg class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" 
                                             viewBox="0 0 20 20" 
                                             fill="currentColor" 
                                             aria-hidden="true" 
                                             data-slot="icon">
                                            <path fill-rule="evenodd" 
                                                  d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" 
                                                  clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                
                                <div class="dropdown-menu absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white ring-1 shadow-2xl ring-black/5 focus:outline-hidden" 
                                     role="menu" 
                                     aria-orientation="vertical" 
                                     aria-labelledby="menu-button" 
                                     tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="?sortby=latest" 
                                           class="block px-4 py-2 text-sm font-medium text-gray-900" 
                                           role="menuitem" 
                                           tabindex="-1">Newest</a>
                                        <a href="?sortby=oldest" 
                                           class="block px-4 py-2 text-sm text-gray-500" 
                                           role="menuitem" 
                                           tabindex="-1">Oldest</a>
                                        <a href="?sortby=popular" 
                                           class="block px-4 py-2 text-sm text-gray-500" 
                                           role="menuitem" 
                                           tabindex="-1">Popular</a>
                                    </div>
                                </div>
                            </div> --}}
                
                            <a href="#" 
                               class="rounded-md px-4 py-2 bg-[#FF2D20] text-white transition-all duration-300 hover:bg-transparent hover:border hover:border-[#FF2D20] focus:outline-none">
                                Ask a Question
                            </a>
                        </div>
                    </div>
                    <!-- Questions List -->
                    <div class="space-y-6">
                        @foreach ($questions as $question)
                        <!-- Question Card -->
                        <div class="bg-white/15 rounded-lg p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h2 class="text-xl font-semibold text-white">{{ $question->title }}</h2>
                                    <p class="mt-2 text-white/70">{{ Str::limit($question->content, 100, '...') }}</p>
                                    <div class="mt-4 flex items-center gap-4">
                                        <span class="text-sm text-[#FF2D20]">{{ $question->ville }}</span>
                                        <span class="text-sm text-white/50"> {{ $question->created_at->format('M d, Y') }}</span>
                                        <span class="text-sm text-white/50">by Someone</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
          </main>

            <!-- Footer -->
            <footer class="w-full bg-gray-50/80 dark:bg-black/80 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-black dark:text-white/70">
                    <span class="text-white text-md font-bold">AskAround</span> - ask questions and get fast responses
                </div>
            </footer>
        </div>
        <script>
            const profileButton = document.getElementById('profile-menu-button');
            const dropdownMenu = profileButton.nextElementSibling;

            profileButton.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });

            dropdownMenu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.add('hidden');
            });
        </script>
            <script>
                const dropdownMenu = document.querySelector('.dropdown-menu');
                const menuButton = document.getElementById('menu-button');
                let isOpen = false;
        
                function toggleDropdown() {
                    isOpen = !isOpen;
                    dropdownMenu.classList.toggle('active');
                    menuButton.setAttribute('aria-expanded', isOpen);
                }
        
                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event.target);
                    
                    if (!isClickInside && isOpen) {
                        isOpen = false;
                        dropdownMenu.classList.remove('active');
                        menuButton.setAttribute('aria-expanded', 'false');
                    }
                });
            </script>
    </body>
</html>