<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notes;
use Illuminate\Support\Str;
class ContactController extends Controller
{
 
    public function index()
    {
        $users = User::where('isDeleted',0)
                     ->orderBy('id','DESC')->get();

        return view('welcome')->with('users',$users);
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        if($request->avatar != null){
            $this->validate($request,
            [
                'avatar' => 'file|image|max:8000'
            ],
            [
                'avatar.file' => 'Invalid type of file uploaded',
                'avatar.image' => 'Uploaded not an image',
                'avatar.max' => 'Image is too big',
            ]);
            $file = $request->file('avatar');
            $avatar = Str::random(40).".".$file->getClientOriginalExtension();
            $file->move(public_path("uploads"),$avatar);
        }
        else{
            $avatar = null;
        }
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'contact' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid Email format',
                'email.unique' => 'Email is already taken'
            ]);
        $data['avatar'] = $avatar;
        User::create($data);
        return redirect()->back()->with('succ','New Contact Added!');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        $notes = Notes::where('user_id',$id)->get();
        return view('view-contact')->with('user',$user)
                                    ->with('notes',$notes);
    }

   
    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->avatar !=null){
            $this->validate($request,
            [
                'avatar' => 'file|image|max:8000'
            ],
            [
                'avatar.file' => 'Invalid type of file uploaded',
                'avatar.image' => 'Uploaded not an image',
                'avatar.max' => 'Image is too big',
            ]);
            $file = $request->file('avatar');
            $avatar = Str::random(40).".".$file->getClientOriginalExtension();
            $file->move(public_path("uploads"),$avatar);
        }
        else{
            $avatar =  $user->avatar;
        }
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'address' => 'required',
                'contact' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid Email format',
                'email.unique' => 'Email is already taken'
            ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->avatar = $avatar;
        $user->save();
        return redirect()->back()->with('succ','Contact Updated Successfully!');
    }

    public function softDelete($id){
        $user = User::findOrFail($id);
        $user->isDeleted = 1;
        $user->save();
        return redirect()->back()->with('succ','Contact Deleted Successfully!');
    }
    public function destroy($id)
    {
        
    }
}
