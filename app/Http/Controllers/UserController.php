<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\TeamUser;

class UserController extends Controller
{
    public function index(){
        $users = User::where('type','!=','admin')->get();
        return view('users.index',compact('users'));
    }

    public function create(){
        $teams = Team::all();
        return view('users.create',compact('teams'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:11',
            'type' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => bcrypt($request->password),
        ]);
        if($request->team_id){
            $team_user = TeamUser::create([
                'user_id' => $user->id,
                'team_id' => $request->team_id
            ]);
        }
        return redirect()->route('admin.users.index');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $teams = Team::all();
        return view('users.edit',compact('user','teams'));
    }
}
