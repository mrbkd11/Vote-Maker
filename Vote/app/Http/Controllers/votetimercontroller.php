<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Result;
use Illuminate\View\View;

class votetimercontroller extends Controller
{

 public function votetimer () 
    {
          $activevote = Vote::where('is_active', 1)->first();
    if ( $activevote) {
     //return view('votetimer', ['activevote' => $activevote]);
    return response()->json( ['activevote' => $activevote]);
} else {
     return response()->json(['message' => 'There is not  an active vote.'], 400);
}

    }
    public function livestats(Request $request) {
        $activevote = Vote::where('is_active', 1)->first();
        if ($activevote) {
        $vote = Vote::select('id')
        ->where('id',  $activevote->id)
        ->withCount(['results as oui' => function ($query) {
            $query->where('reponse', '=', 'oui');
        }, 'results as non' => function ($query) {
            $query->where('reponse', '=', 'non');
        }, 'results as q' => function ($query) {
            $query->where('reponse', '=', 'q');
        }])
        ->first();
        $total_count = $vote->oui + $vote->non + $vote->q;
        $vote->total_count = $total_count;
        return $vote ; }
        else {
            return  response()->json(['message' => 'There is not  an active vote.'], 400);
        }
     }


    public function deactivateVote(Request $request) 
{
     $activevote = Vote::where('is_active', 1)->first();
    $activevote->is_active = 0;
    $activevote->save(); 
     return response()->json(['message' => 'vote has been desacrivated'], 200);
}
}

