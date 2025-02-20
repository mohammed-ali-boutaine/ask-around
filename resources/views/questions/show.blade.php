

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
        </div>

    </div>
</div>
@endsection
