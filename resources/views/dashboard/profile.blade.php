@extends('layouts.dashboard')

@section('title', 'Profile - AskAround')

@section('main-content')
<main class="flex-grow">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <!-- Profile Header -->
        <div class="bg-white/15 rounded-lg p-8 mb-6">
            <div class="flex flex-col items-center">
                <!-- Profile Picture -->
                <div class="relative group">
                    <div class="w-32 h-32 mx-auto rounded-full bg-[#FF2D20]/20 flex items-center justify-center overflow-hidden mb-4">
                        @if(auth()->user()->picture)
                            <img src="{{Auth::user()->picture ? asset('storage/' . Auth::user()->picture) : asset('https://picsum.photos/32/32') }}"
                                 alt="Profile picture" 
                                 class="w-full h-full object-cover mx-auto">
                        @else
                            <span class="text-[#FF2D20] text-4xl font-semibold">
                                {{ strtoupper(substr(auth()->user()->username, 0, 1)) }}
                            </span>
                        @endif
                    </div>
                    
                    <!-- Upload Button -->
                    <form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data" class="mt-2 text-center">
                        @csrf
                        @method('POST')
                        <label class="cursor-pointer inline-flex items-center justify-center px-4 py-2 bg-[#FF2D20] text-white rounded-md hover:bg-[#FF2D20]/90 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Update Picture
                            <input type="file" name="picture" class="hidden" onchange="this.form.submit()">
                        </label>
                    </form>
                </div>

                <!-- User Info -->
                <h1 class="text-2xl font-bold text-white mt-4">{{ auth()->user()->username }}</h1>
                <p class="text-white/70 mt-2">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <!-- Edit Profile Section -->
        <div class="bg-white/15 rounded-lg p-8">
            <h2 class="text-xl font-semibold text-white mb-6">Edit Profile</h2>
            
            <form action=" {{ route('profile.update') }} " method="POST">
                @csrf
                @method('PUT')
                
                <!-- Username -->
                <div class="mb-6">
                    <label class="block text-white/90 font-medium mb-2">Username</label>
                    <input type="text" 
                           name="username" 
                           value="{{ auth()->user()->username }}"
                           class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:border-[#FF2D20] transition-colors duration-300">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-white/90 font-medium mb-2">Email</label>
                    <input type="email" 
                           name="email" 
                           value="{{ auth()->user()->email }}"
                           class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:border-[#FF2D20] transition-colors duration-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-[#FF2D20] text-white font-semibold py-3 rounded-lg hover:bg-[#FF2D20]/90 transition-colors duration-300">
                    Save Changes
                </button>
            </form>
        </div>

        @if(session('success'))
        <div class="mt-4 p-4 bg-green-500/20 border border-green-500/50 rounded-lg">
            <p class="text-green-400">{{ session('success') }}</p>
        </div>
        @endif

        @if($errors->any())
        <div class="mt-4 p-4 bg-red-500/20 border border-red-500/50 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li class="text-red-400">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</main>
@endsection