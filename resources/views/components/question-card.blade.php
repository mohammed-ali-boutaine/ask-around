<div class="bg-white/15 hover:bg-white/20 transition-all duration-300 rounded-lg p-6">
    <div class="flex gap-6">
        <!-- Left Side: Profile Picture and Username -->
        <div class="flex-shrink-0 text-center">
            <div class="w-12 h-12 rounded-full bg-[#FF2D20]/20 flex items-center justify-center overflow-hidden">
                @if($question->user->profile_picture)
                    <img src="{{ asset($question->user->profile_picture) }}" 
                         alt="{{ $question->user->username }}'s profile" 
                         class="w-full h-full object-cover">
                @else
                    <span class="text-[#FF2D20] text-xl font-semibold">
                        {{ strtoupper(substr($question->user->username, 0, 1)) }}
                    </span>
                @endif
            </div>
            <span class="block mt-2 text-sm text-white/70">
                {{ $question->user->username }}
            </span>
        </div>

        <!-- Middle: Main Content -->
        <div class="flex-1">
            <h2 class="text-xl font-semibold text-white hover:text-[#FF2D20] transition-colors duration-300">
                {{ $question->title }}
            </h2>
            
            <p class="mt-3 text-white/70 text-base leading-relaxed">
                {{ Str::limit($question->content, 100, '...') }}
            </p>

            <!-- Location -->
            <div class="mt-4">
                <span class="inline-flex items-center text-sm text-[#FF2D20]">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                    </svg>
                    {{ $question->ville }}
                </span>
            </div>
        </div>

        <!-- Right Side: Date and View Details -->
        <div class="flex flex-col items-end justify-between">
            <span class="text-sm text-white/50">
                {{ $question->created_at->format('M d, Y') }}
            </span>

            <a href="{{ route('questions.show', $question->id) }}" 
               class="inline-flex items-center text-[#FF2D20] hover:text-[#FF2D20]/80 transition-colors duration-300">
                View Details
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</div>