@extends('layout')

@section('title', $name)

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">Register for room</div>
                <div class="card-body">
                    <form action="{{ route('store',['roomId' => $roomId]) }}" method="post">
                        @csrf
                        <input type="hidden" name="roomid" value="{{ $roomId }}" />
                        <div class="form-group">
                            <label for="room_name">Enter your name</label>
                            <input name="name" class="form-control" type="text" required />
                        </div>
                        <p class="text-center">Enter room as:</p>
                        <div class="row">
                            <div class="col-6 text-center">
                                <button class="btn btn-primary" name='type' value="1" type="submit">Player</button>
                            </div>
                            <div class="col-6 text-center">
                                <button class="btn btn-primary" name="type" value='0' type="submit">Observer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
