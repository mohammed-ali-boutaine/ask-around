<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //
    public function index(Request $request)
    {
        $keywords = $request->query('keywords');
        $city = $request->query('city');
    
        // Query Builder with optional search filters
        $questions = Question::when($keywords, function ($query, $keywords) {
                            return $query->where('title', 'LIKE', "%{$keywords}%")
                                         ->orWhere('content', 'LIKE', "%{$keywords}%");
                        })
                        ->when($city, function ($query, $city) {
                            return $query->where('ville', 'LIKE', "%{$city}%"); // Ensure column is correct
                        })->get();
       

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        // 
        $villes = Ville::all();
        return view("questions.create",compact("villes"));
    }


    public function store(Request $request)
    {
        // validate things
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'ville' => 'required|string',
        ]);

        $question = Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'ville' => $request->ville,
            'user_id' => Auth::id()
        ]);

        if ($question) {
            return redirect()->route("dashboard")->with('success', 'Question added successfully!');
        }
        return redirect()->route("dashboard")->with('error', 'Something went wrong!');
    }

    public function show($id)
    {
        // 
        $question = Question::findOrFail($id);
        return view("questions.show", compact("question"));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);

        $this->authorizeOwner($question);


        return view('questions.edit', compact('question'));
    }
    public function update(Request $request, $id)
    {
        // 
        $question = Question::findOrFail($id);
        $this->authorizeOwner($question);


        $request->validate([
            'title' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update question
        $question->update([
            'title' => $request->title,
            'ville' => $request->ville,
            'content' => $request->content,
        ]);
        return redirect()->route('questions.show', $id)->with('success', 'Question updated successfully!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $this->authorizeOwner($question);


        $question->delete();
        return redirect()->route('dashboard')->with('success', 'Question deleted successfully');
    }

    // Helper method for authorization
    private function authorizeOwner(Question $question)
    {
        if (Auth::id() !== $question->user_id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
