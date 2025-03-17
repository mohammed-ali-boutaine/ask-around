<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
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


        // get villes
        // $villes = Ville::all() ;
        $villes = [];
        $count = $questions->count();

        $data = ["questions" => $questions, "villes" => $villes, "count" => $count];


        return view('dashboard.index', $data);
    }

    public function savedQuestions()
    {
        $savedQuestions = auth()->user()->savedQuestions()->with('user')->get();
        return view('dashboard.saved', compact('savedQuestions'));
    }
}
