@extends('layouts.dashboard')
 @section('title', 'Info - AskAround')

@section('main-content')
<div class="container mx-auto p-6">
    <div class="mt-6 py-4 max-w-7xl mx-auto px-6">
        <a href="{{ url()->previous() }}" class="text-blue-400 hover:underline">Back</a>
    </div>
    <div class="bg-white/15 rounded-lg p-6 max-w-5xl mx-auto">
        <h2 class="text-2xl font-semibold text-white">{{ $question->title }}</h2>
        <p class="mt-2 text-white/70">{{ $question->content }}</p>
        <div class="mt-4 flex items-center gap-4">
            <span class="text-sm text-[#FF2D20]">{{ $question->ville }}</span>
            <span class="text-sm text-white/50"> {{ $question->created_at->format('M d, Y') }}</span>
            <span class="text-sm text-white/50">by {{ $question->user->username }}</span>
            <form action="{{ route('questions.save', $question) }}" method="POST" class="ml-auto">
                @csrf
                <button type="submit" class="flex items-center gap-2 text-sm {{ auth()->user()->savedQuestions->contains($question) ? 'text-[#FF2D20]' : 'text-white/70' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ auth()->user()->savedQuestions->contains($question) ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                    {{ auth()->user()->savedQuestions->contains($question) ? 'Saved' : 'Save' }}
                </button>
            </form>
        </div>
    </div>
    
    <!-- Responses Section -->
    <div class="mt-8 max-w-5xl mx-auto">
        

                <!-- Response Form -->
                <div class="mt-8 bg-white/15 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-white mb-2">Add a Response</h4>
                    <form action="{{ route('responses.store', $question) }}" method="POST">
                        @csrf
                        <textarea 
                            name="content" 
                            rows="4" 
                            class="w-full bg-white/10 text-white rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#FF2D20]"
                            placeholder="Your response..."
                            required
                        ></textarea>
                        <button type="submit" class="mt-4 bg-[#FF2D20] text-white px-6 py-2 rounded-lg hover:bg-[#FF2D20]/90">
                            Submit Response
                        </button>
                    </form>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Responses</h3>

        @if(isset($responses) && $responses->count() > 0)
            @foreach($responses as $response)
                <div class="bg-white/10 rounded-lg p-4 mb-4 mt-4">
                    <p class="text-white/90">{{ $response->content }}</p>
                    <div class="mt-2 flex items-center gap-4">
                        <span class="text-sm text-white/50">{{ $response->created_at->format('M d, Y') }}</span>
                        <span class="text-sm text-white/50">by {{ $response->user->username }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-white/50">No responses yet. Be the first to respond!</p>
        @endif


    </div>
</div>
@endsection
