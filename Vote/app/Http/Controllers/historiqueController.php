<?php

namespace App\Http\Controllers;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;

use Illuminate\Http\Request;

class historiqueController extends Controller
{
    public function stats() 
    {
  
        $votes = Vote::select('id', 'question')
        ->withCount(['results as oui' => function ($query) {
            $query->where('reponse', '=', 'oui');
        }, 'results as non' => function ($query) {
            $query->where('reponse', '=', 'non');
        }, 'results as q' => function ($query) {
            $query->where('reponse', '=', 'q');
        }])
        ->get();
        foreach ($votes as $vote) {
    $total_count = $vote->oui + $vote->non + $vote->q;
    $vote->total_count = $total_count;
}
        return $votes ;
    }
    public function search(Request $request) 
    {

         $votes = Vote::select('id', 'question')
         ->where('question','like','%'.$request->search.'%')
        ->withCount(['results as oui' => function ($query) {
            $query->where('reponse', '=', 'oui');
        }, 'results as non' => function ($query) {
            $query->where('reponse', '=', 'non');
        }, 'results as abstreint' => function ($query) {
            $query->where('reponse', '=', 'q');
        }])
        ->get();
        foreach ($votes as $vote) {
    $total_count = $vote->oui + $vote->non + $vote->q;
    $vote->total_count = $total_count;
}
         return $votes ;
    }
}
