<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;

class PollController extends Controller
{
    public function index()
    {
        return Poll::with('user')->get();
    }

    public function show($id)
    {
        $poll = Poll::with('choices', 'choices.votes')->where(['id' => $id])->first();

        //cek apakah user_id ini sudah vote
        if (!$poll) return response()->json(['success' => false, 'message' => "Data tidak ada"], 400);

        return response()->json(['status' => 'success', 'data' => $poll], 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'choices' => 'required|string',
        ]);
        // pilihan1,pilihan2,pilihan3
        $choicess = explode("\r\n", $request->choices);

        $poll = Poll::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline
        ]);

        if (!$poll) {
            return response()->json([
                'success' => false,
                'message' => "Data Gagal Disimpan"
            ], 409);
        }

        foreach ($choicess as $value) {
            Choice::create([
                'id_poll' => $poll->id,
                'choice' => $value
            ]);
        }

        // $choice = Choice::insert($choicess);
        return response()->json([
            'success' => true,
            'message' => "data berhasil disimpan",
            'id_polling' => $poll->id
        ], 201);
    }

    public function destroy(Request $request)
    {
        $selectPoll = Poll::find($request->id);
        $choices = $selectPoll->choices()->delete();
        $poll = $selectPoll->delete();

        if ((!$poll) OR (!$choices)) {
            return response()->json([
                'success' => false,
                'message' => "Data Gagal Dihapus"
            ], 409);
        }

        return response()->json([
            'success' => true,
            'message' => "data berhasil dihapus",
            'data' =>  Poll::with('user')->get()
        ], 201);
    }
}
