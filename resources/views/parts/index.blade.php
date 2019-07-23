@extends('layout')

@section('title','Parts')

@section('content')
    <h1 class="title">Parts</h1>
    <ul>
        @foreach($parts as $part)
            <li>{{$part->partname}}</li>
        @endforeach
    </ul>
@endsection