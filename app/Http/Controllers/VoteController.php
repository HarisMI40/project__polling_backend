<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choice;
use App\Models\Poll;
use App\Models\Vote;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_vote' => 'required',
            'id_poll' => 'required',
            'user_vote' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $choice = Choice::find($request->id_vote);
        $choice->total = $choice->total + 1;
        $choice->save();

        $vote = Vote::create([
            'user_id' => $request->user_vote,
            'choice_id'=> $choice->id
        ]);

        if(!$choice or !$vote) return response()->json(['success' => false,'message' => "Vote tidak berhasil dikirim"], 400);
        
        
        $poll = Poll::with('choices')->where('id', $request->id_poll)->first();
        return response()->json(['status' => 'success', 'data' => $poll], 200);
    }
}
