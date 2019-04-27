<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer'
        ]);
        $add = new Project([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'tasks_done'=>$request->get('tasks_done'),
            'start'=>$request->get('start'),
            'finish'=>$request->get('finish')
        ]);
        $add->save();
        return redirect('/home')->with('success', 'New project has been added');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer'
        ]);
        $project = Project::find($id);
        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->price = $request->get('price');
        $project->tasks_done = $request->get('tasks_done');
        $project->start = $request->get('start');
        $project->finish = $request->get('finish');
        $project->save();

        return redirect('/home')->with('success', 'Project has been updated.');
    }

    public function destroy($id) {
        $project = Project::find($id);
        $project->delete();

        return redirect('/home')->with('success', 'Project has been deleted.');
    }

    public function addProject() {
        $users = User::all();
        return view('add_project', compact('users'));
    }

}
