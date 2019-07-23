@extends('layout')

@section('title')
    Edit Project
@endsection

@section('content')
    <h1 class="title">Edit Project</h1>
    <form method="post" action="/projects/{{$project->id}}">
        @csrf
        @method('PATCH')
        <div class="field">
            <label class="label" for="">Title</label>
            <div class="control">
                <input type="text" class="input" name="title" placeholder="" value="{{$project->title}}"/>
            </div>

        </div>
        <div class="field">
            <label class="label" for="">Description</label>
            <div class="control">
                <textarea class="textarea" name="description">{{$project->description}}</textarea>
            </div>

        </div>
        <div class="field">
            <div class="control">
                <button name="submit" class="button is-link">Update Project</button>
            </div>

        </div>
    </form>
    <form method="post" action="/projects/{{$project->id}}">
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button name="submit" class="button">Delete Project</button>
            </div>

        </div>
    </form>
@endsection