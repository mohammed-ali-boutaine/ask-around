@vite('resources/css/app.css')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create a New Post</h2>

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf

            <!-- Title -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder="Enter title" required>
            </div>

            <!-- Content -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">Content</label>
                <textarea name="content" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" rows="4" placeholder="Write your content here..." required></textarea>
            </div>

            <!-- Ville -->
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">Ville</label>
                <input type="text" name="ville" list="villes-list" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" placeholder="Enter city name" required>
            
                <!-- Datalist -->
                <datalist id="villes-list">
                    @foreach($villes as $ville)
                        <option value="{{ $ville->name }}"></option>
                    @endforeach
                </datalist>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg transition duration-300 hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Submit
            </button>
        </form>
    </div>
</div>
