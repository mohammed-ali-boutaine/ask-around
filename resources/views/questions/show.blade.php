{{-- 
@vite('resources/css/app.css')

<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
     <h1 class="text-2xl font-bold mb-4">{{ $question->title }}</h1>
     <p class="text-gray-700 mb-2"><strong>Ville:</strong> {{ $question->ville }}</p>
     <p class="text-gray-800">{{ $question->content }}</p>
     {{-- <p class="text-sm text-gray-500 mt-4">Posted by: {{ $question->user->name }} on {{ $question->created_at->format('M d, Y') }}</p> --}}
 
     {{-- Check if logged-in user is the post owner --}}
     {{-- @if(Auth::check() && Auth::id() === $question->user_id)
         <div class="mt-4 flex gap-2">
             <!-- Edit Button -->
             <a href="{{ route('questions.edit', $question->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Edit</a>
 
             <!-- Delete Button with Confirmation -->
             <form action="{{ route('questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Delete</button>
             </form>
         </div>
     @endif
 </div>  --}}



 @extends('layouts.dashboard')
 @section('title', 'Info - AskAround')

@section('main-content')
<div class="container mx-auto p-6">
    <div class="bg-white/15 rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-white">{{ $question->title }}</h2>
        <p class="mt-2 text-white/70">{{ $question->content }}</p>
        <div class="mt-4 flex items-center gap-4">
            <span class="text-sm text-[#FF2D20]">{{ $question->ville }}</span>
            <span class="text-sm text-white/50"> {{ $question->created_at->format('M d, Y') }}</span>
            <span class="text-sm text-white/50">by {{ $question->user->username }}</span>
        </div>
        <div class="mt-6">
            <a href="{{ url()->previous() }}" class="text-blue-400 hover:underline">Back</a>
        </div>
    </div>
</div>
@endsection
