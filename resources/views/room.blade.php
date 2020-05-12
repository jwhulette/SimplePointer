@extends('layout')

@section('title', $name)

@section('content')

<div class="container">

    <h1 class="text-5xl text-center text-green-600 underline">{{ $name }} Room</h1>

    <div class="container">
        <div class="flex flex-col mx-auto">
            <div class="grid grid-cols-3 gap-2">

                <div class="m-auto">left ad</div>

                <room cardset=@json($cardset) roomid="{{ $id }}" routes=@json($routes)>
                </room>

                <div class="m-auto">right ad</div>
            </div>
        </div>
    </div>

</div>


@endsection
