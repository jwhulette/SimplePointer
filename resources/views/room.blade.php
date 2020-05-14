@extends('layout')

@section('title', $name)

@section('content')

<div class="container">

    <h1 class="text-5xl text-center text-green-600 underline">{{ $name }} Room</h1>

    <div class="container">

        <room cardset=@json($cardset) roomid="{{ $id }}" routes=@json($routes)>
        </room>

    </div>

</div>


@endsection
