<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;

class ResultController extends Controller
{
    // public function index()
    // public function index(): View
    // {
    //    $results = Result::all();
    //     return view('result', ['results' => $results]);
    //     ;
    // }
public function voting() {
    $activeVote = Vote::where('is_active', 1)->first();
    if ($activeVote) {
         $userHasVoted = Result::where('vote_id', $activeVote->id)
                              ->where('user_id', auth()->user()->id)
                              ->exists() ;
        if ( $userHasVoted ) {
            return response()->json(['error' => 'You have already submitted a vote for this vote.'], 403);
        }
    //  return view('result', ['vote' => $activeVote,'userid' => $id]);
    return ['vote' => $activeVote->question];
    
    }

    return response()->json(['message' => 'There are no current active votes.'], 404);
}

    public function create(Request $request)
    {       
        $activeVote = Vote::where('is_active', 1)->first();
        if ($activeVote) {
        $result = Result::create([
            'reponse' => $request->reponse,
            'user_id' => auth()->user()->id,
            'vote_id' => $activeVote->id,
        ]); 
    return response()->json(['message' => 'Thanks for your vote.'], 200);}

    else {
       return response()->json(['message' => 'vote has been expired .'], 404);
    } }
}
