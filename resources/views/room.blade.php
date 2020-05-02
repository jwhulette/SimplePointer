@extends('layout')

@section('title', $name)

@section('content')

<div class="container">

    <h1 class="text-center">{{ $name }} Room</h1>

    <room cardset=@json($cardset) roomid="{{ $id }}" routes=@json($routes)>
    </room>

</div>


@endsection
