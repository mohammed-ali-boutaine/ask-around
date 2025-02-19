@extends('layouts.home')


{{------------------    title section  --}}
@section('title', 'Login - AskAround')


{{------------------    Main section  --}}
@section('main-content')        
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
                                        name="username" 
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
@endsection
