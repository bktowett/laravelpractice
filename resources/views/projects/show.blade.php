@extends('layout')

@section('title','Project Details')

@section('content')
    <h1 class="title">{{$project->title}}</h1>
    <div class="content">
        {{$project->description}}
    </div>
    <p>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </p>

    @if($project->tasks->count())
        <div class="box">

            @foreach($project->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{$task->id}}">
                        @csrf
                        @method('PATCH')
                        <label class="checkbox {{$task->completed ? 'is-complete':''}}" for="completed">
                            <input type="checkbox" name="completed"
                                   onchange="this.form.submit()" {{$task->completed ? 'checked':''}}> {{$task->description}}
                        </label>
                    </form>
                </div>
            @endforeach

        </div>
    @endif
    <!--new task form -->
    <form class="box" method="post" action="/projects/{{$project->id}}/tasks">
        @csrf
        <div class="field">
            <label class="label" for="description">
                New Task
            </label>
            <div class="control">
                <input type="text" class="input {{$errors->has('description')?'is-danger':''}}" name="description" placeholder="Description" required value="{{old('description')}}">
            </div>
        </div>
        <div class="field">

            <div class="control">
                <button name="submit" class="button is-link">Create Task</button>
            </div>
        </div>
        @include('errors')
    </form>


@endsection