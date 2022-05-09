<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::all(['id', 'title', 'content']);
        return response()->json($notes);
    }


    public function store(Request $request)
    {
        $note = Note::create($request->post());
        return response()->json([
            'note' => $note
        ]);
    }


    public function show(Note $note)
    {
        return response()->json($note);
    }


    public function update(Request $request, Note $note)
    {
        $note->fill($request->post())->save();
        return response()->json([
            'note' => $note
        ]);
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json([
            'message' => 'note deleted'
        ]);
    }
}
