<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - AskAround</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/0 dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px] h-full z-0" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />

            <!-- Header -->
            <header class="w-full bg-gray-50/80 dark:bg-black/0 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-3 items-center py-4">
                        <div class="col-span-1">
                            <span class="text-white text-xl font-bold">AskAround</span>
                        </div>
                        <nav class="col-span-2 flex justify-end -mx-3">
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white border border-[#FF2D20] transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-[#FF2D20]/20 focus:outline-none">
                                Log in
                            </a>
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 bg-[#FF2D20] text-white transition-all duration-300 hover:bg-transparent hover:border hover:border-[#FF2D20] focus:outline-none ml-4">
                                Register
                            </a>
                        </nav>
                    </div>
                </div>
            </header>
            
            
            <!-- Main Content -->
            <main class="flex-grow flex items-center justify-center relative z-10">
                <div class=" max-w-md w-full px-6 py-8">
                    <div class="bg-black/85 rounded-lg p-8">
                        <h2 class="text-2xl font-bold text-white mb-6 text-center">Create Account</h2>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-white mb-2">Name</label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name" 
                                        class="w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-[#FF2D20] sm:text-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        class="w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-[#FF2D20] sm:text-sm"
                                        required
                                    >
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password" 
                                        class="w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-[#FF2D20] sm:text-sm"
                                        required
                                    >
                                </div>
                          
                                <button 
                                    type="submit"
                                    class="w-full rounded-md bg-[#FF2D20] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:bg-transparent hover:border hover:border-[#FF2D20] focus:outline-none"
                                >
                                    Create Account
                                </button>
                                <p class="text-center text-sm text-white/70">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-[#FF2D20] hover:text-[#FF2D20]/80 transition-colors duration-300">
                                        Log In
                                    </a>
                                </p>
                            </div>
                        </form>
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
    </body>
</html>