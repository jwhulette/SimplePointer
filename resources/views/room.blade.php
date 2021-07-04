@extends('layout')

@section('title', $name)

@section('content')


    <h1 class="text-5xl text-center text-green-600 underline lg:mt-6">{{ $name }}</h1>

    <room
        cardset=@json($cardset)
        roomid="{{ $id }}"
        routes=@json($routes)
    >
    </room>

@endsection
