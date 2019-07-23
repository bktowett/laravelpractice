@extends('layout')
@section('title','Create a new Project')

@section('content')
<h1 class="title">Create a new Project</h1>
<form method="post" action="/projects">
    @csrf
    <div>
        <input type="text" name="title" class="input {{$errors->has('title') ? 'is-danger':''}}" placeholder="Project Title" value="{{old('title')}}"/>
    </div>
    <div>
        <textarea name="description" class="textarea {{$errors->has('description') ? 'is-danger':''}}" placeholder="Project description">{{old('description')}}</textarea>
    </div>
    <div>
        <button class="button is-link" name="submit" type="submit">Create Project</button>
    </div>

    @if($errors->any())

    <div class="notification is-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif
</form>

@endsection