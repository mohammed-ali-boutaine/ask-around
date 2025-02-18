
@vite('resources/css/app.css')


<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Question</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $question->title) }}" 
                class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <!-- Ville -->
        <div class="mb-4">
            <label class="block text-gray-700">Ville</label>
            <input type="text" name="ville" value="{{ old('ville', $question->ville) }}" 
                class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <!-- Content -->
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" rows="5" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('content', $question->content) }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Update</button>
            <a href="{{ route('questions.show', $question->id) }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Cancel</a>
        </div>
    </form>
</div>
