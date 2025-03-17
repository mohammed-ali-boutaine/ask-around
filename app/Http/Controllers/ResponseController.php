<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        //

        $response = Response::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'question_id' => $id
        ]);

        if ($response) {
            return redirect()->route("questions.show", $id)->with('success', 'Response added successfully!');
        }
        return redirect()->route("questions.show", $id)->with('error', 'Something went wrong!');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
