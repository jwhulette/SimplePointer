<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Home')

@section('content')

<div class="container">

    <h1>Home Page</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <form action="{{ route('rooms_index') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="room_name">Enter a room name</label>
                    <input class="form-control" type="text" name="name" id="room_name">
                </div>
                <div class="form-group">
                    <label for="card_set">Select a card set</label>
                    <select class="custom-select" name="card_set">
                        @foreach ($cards as $card)
                        <optgroup label="{{ $card->description }}" />
                        <option value="{{ $card->id }}">{{ $card->card_set->implode(', ') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary" type="submit">Create Room</button>
                </div>

            </form>
        </div>
    </div>


</div>

@endsection
