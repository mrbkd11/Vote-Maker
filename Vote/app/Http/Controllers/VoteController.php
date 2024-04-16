<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Vote;

class VoteController extends Controller
{
   public function index(): View
    {
      $votes=Vote::all() ;
        return view('vote',['votes'=>$votes]);
        
    }
    public function create(Request $request) {
        $request-> validate ([
            'question' => 'required' 
        ]);
        
    $activeVote = Vote::where('is_active', 1)->first();
    if ($activeVote) {
        // If an active vote is found, return an error response
        return response()->json(['message' => 'There is already an active vote.'], 422);
    }
        else {
       return  $vote = Vote::create (['question' => $request->question,
        'admin_id'=> '1'] ) ;

        
    //    return redirect('votetimer') ;
    } }

    //delete function //
    public function delete($id) {
        $vote = vote::find($id) ;
        if ($vote) {
           return $vote -> delete() ;
            // return redirect ('vote') ;
        }
    }

    //update vote
    public function upvote (Request $request,$id) {

        $vote=vote::find($id) ;
        $data = $request-> validate ([
            'question' => 'required'
        ]) ;
        return $vote =update($data) ;
    }
}