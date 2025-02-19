@extends('layouts.home')


{{------------------    title section  --}}
@section('title', 'Welcome - Ask Around')



{{------------------    Main section  --}}
@section('main-content')
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
@endsection
