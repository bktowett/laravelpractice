<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$projects = \App\Project::where('owner_id',auth()->id())->get();
        $projects = auth()->user()->projects;
        $title = "Projects";
        //return $projects;
        return view('projects.index', compact('projects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$project = new Project();
        $project->title = request('title');
        $project->description = request('description');

        $project->save();*/

        /*$validated = request()->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:4']
        ]);*/

        $validated = $this->validateProject();

        $validated['owner_id'] = auth()->id();


        $project = Project::create($validated);

        //send mail when a new project is create
       /* \Mail::to('bktowett@gmail.com')->send(
            new ProjectCreated($project)
        );*/

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //abort_if($project->owner_id != auth()->id(),403);
        $this->authorize('view',$project);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //return $project;
        //$this->authorize('view',$project);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Project $project)
    {
        dd('hello!');

        //return view('projects.index');
    }*/
    public function update(Project $project)
    {
        $this->authorize('view',$project);
        /*$validated = request()->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:4']
        ]);
       $project->title = request('title');
       $project->description = request('description');

       $project->save();*/

        $project->update($this->validateProject());

       return redirect('/projects');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('view',$project);
        $project->delete();
        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['required','min:4']
        ]);
    }
}
