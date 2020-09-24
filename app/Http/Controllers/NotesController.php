<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
class NotesController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'integer|required',
            'note' => 'required'
        ]);
        Notes::create($data);
        return redirect()->back()->with('succ','Note added');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $note = Notes::findOrFail($id);
        $note->note = $request->note;
        $note->save();
        return redirect()->back()->with('succ','Noted updated successfully!');
    }


    public function destroy($id)
    {
        $note = Notes::findOrfail($id);
        $note->delete();
        return redirect()->back()->with('succ','Note deleted successfully!');
    }
}
