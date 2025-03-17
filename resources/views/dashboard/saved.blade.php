@extends('layouts.dashboard')
@section('title', 'Saved Questions - AskAround')

@section('main-content')
<div class="container mx-auto p-6">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-semibold text-white mb-6">Saved Questions</h2>
        
        @if($savedQuestions->count() > 0)
            <div class="grid gap-6">
                @foreach($savedQuestions as $question)
                    <div class="bg-white/15 rounded-lg p-6">
                        <a href="{{ route('questions.show', $question->id) }}" class="block">
                            <h3 class="text-xl font-semibold text-white hover:text-[#FF2D20]">{{ $question->title }}</h3>
                            <p class="mt-2 text-white/70">{{ Str::limit($question->content, 150) }}</p>
                            <div class="mt-4 flex items-center gap-4">
                                <span class="text-sm text-[#FF2D20]">{{ $question->ville }}</span>
                                <span class="text-sm text-white/50">{{ $question->created_at->format('M d, Y') }}</span>
                                <span class="text-sm text-white/50">by {{ $question->user->username }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-white/50">You haven't saved any questions yet.</p>
        @endif
    </div>
</div>
@endsection
