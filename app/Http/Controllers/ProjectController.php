<?php

namespace App\Http\Controllers;

use App\Team;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('projects.create',compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'members' => 'required',
            'team_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $project = Project::create([
            'name' => $request->name,
            'members' => $request->members,
            'team_id' => $request->team_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'active'
        ]);
        return redirect()->route('team_leader.projects.index');
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $teams = Team::all();
        return view('projects.edit',compact('project','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'members' => 'required',
            'team_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $project = Project::findOrFail($id);
        $project->update([
            'name' => $request->name,
            'members' => $request->members,
            'team_id' => $request->team_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'active'
        ]);
        return redirect()->route('team_leader.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kanban(){
        return view('kanban');
    }
}
