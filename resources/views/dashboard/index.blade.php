
@extends('layouts.dashboard')

{{------------------    title section  --}}
@section('title', 'Explore - AskAround')




@section('main-content')

 {{-- messages studff  --}}
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

            <!-- Main Content -->
            <main class="flex-grow">

                <div class="max-w-7xl mx-auto px-6 py-8">


                    {{-- ---------------    sub nab start ------------------ --}}
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-3xl font-bold text-white">Recent Questions</h1>
                        <div class="flex items-center">
    
            
                            <button class="trigger-btn" onclick="openModal()">
                                Ask a Question
                            </button>
                        </div>
                    </div>
                    {{-- ---------------   END sub nab start ------------------ --}}

                    <!-- Questions List   Strart-->
                    <div class="space-y-6">
                        @if($count )
                            <div class="bg-white/15 rounded-lg p-6 text-center flex justify-between items-center">
                                <p class="mt-2 text-white/70">Here are the most recent questions asked by users.</p>
                                <p class="text-xl font-semibold text-white">Total Questions: {{ $count }}</p>
                            </div>
                        @endif
                        <div class="space-y-6">
                            @if ($questions->isEmpty())
                                <div class="bg-white/15 rounded-lg p-6 text-center">
                                    <h2 class="text-xl font-semibold text-white">No Questions Available</h2>
                                    <p class="mt-2 text-white/70">Be the first to ask a question!</p>
                                </div>
                            @else
                                @foreach ($questions as $question)
                                {{-- {{ dd($question) }} --}}

                                    <x-question-card :question="$question" />
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                {{-- craete question form  --}}
          <div id="questionModal" class="modal">
            <div class="modal-content">
                <button class="close-btn" onclick="closeModal()">&times;</button>
                <h2 style="margin-top: 0; margin-bottom: 1.5rem; font-size: 1.5rem; font-weight: 600;">Ask a Question</h2>
                
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-input" placeholder="Enter title" required>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-input" rows="4" placeholder="Write your content here..." required></textarea>
                    </div>
    
                    <div class="form-group">
                        <label class="form-label">Ville</label>
                        <input type="text" name="ville" list="villes-list" class="form-input" placeholder="Enter city name" required>
                        
                        <datalist id="villes-list">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->name }}">{{ $ville->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
    
                    <button type="submit" class="submit-btn">
                        Submit
                    </button>
                </form>
            </div>
        </div>
            {{-- --------------  --}}

    </main>

@endsection



