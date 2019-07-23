@extends('layout')

@section('title')
    Projects
@endsection

@section('content')
    <h1 class="title">Projects</h1>
    <div>
        <p>
            <a class="button is-link" href="/projects/create">New Project</a>
        </p>
    </div>


    <ul>
        @foreach($projects as $project)
            <li><a href="/projects/{{$project->id}}">
                    {{$project->title}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection