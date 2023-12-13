<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Index: Display a list of notes.
        $notes = Note::paginate(5);
        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Create: Show a form to create a new note.
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store: Save a new note to the database. 
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        $note = new Note;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->status = $data['status'];
        $note->save();
    
        return redirect('/notes')->with('success', 'Note created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show: Display details of a specific note.
        $note = Note::find($id);
        if (!$note) {
            abort(404);
        }
        return view('note.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Edit: Show a form to edit an existing note. 
        $note = Note::find($id);
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update: Update the details of an existing note. 
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
            Note::find($id)->update($data);
            return redirect('notes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Destroy: Delete a note.
        Note::find($id)->delete();
        return back();
    }
}
