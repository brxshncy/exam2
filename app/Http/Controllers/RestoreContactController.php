<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RestoreContactController extends Controller
{

    public function index()
    {
        $users = User::where('isDeleted',1)->get();
        return view('restore-contact')->with('users',$users);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->isDeleted = 0;
        $user->save();
        return redirect('/contact')->with('succ','User restored');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/contact')->with('succ','User completely remove');
    }
}
