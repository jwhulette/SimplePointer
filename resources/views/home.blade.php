<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Agile Pointing Poker')

@section('content')

<div class="flex flex-col mx-auto xl:mt-8 md:mt-4">

    <div class="grid gap-2">

        <div class="px-3 md:max-w-md md:mx-auto">
            <h1 class="text-2xl text-center underline">Welcome to Simple Pointer</h1>

            <p class="mt-4 text-sm">
                Simple Pointer is an agile pointing poker web app.
                The app is free and does not require you to log in.
                There are not a lot of frills, just a unique room for you and
                your team to use to use.
            </p>

            <p class="mt-4 text-sm">
                Create a room and then share the room link with your team.
                Each member can log in as a player or an observer.
                You can reuse the room link.
            </p>

        </div>

        <div class="p-6 border-2 border-green-300 rounded-md md:max-w-sm md:mx-auto">
            <form action="{{ route('rooms_index') }}" method="post">
                @csrf
                <div class="my-6">
                    <label class="inline-block mb-2" for="room_name">Enter a room name</label>
                    <input name="name"
                        class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                        type="text">
                </div>

                <div class="my-6">
                    <label class="inline-block mb-2" for="card_set">Select a card set</label>
                    <div class="relative inline-block">
                        <select
                            class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded-lg shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline"
                            name="card_set">
                            @foreach ($cards as $card)
                            <optgroup class="font-light" label="{{ $card->description }}" />
                            <option value="{{ $card->id }}">{{ $card->card_set->implode(', ') }}</option>
                            @endforeach
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="my-6 text-center">
                    <button class="px-4 py-2 font-bold text-white bg-green-600 rounded hover:bg-green-400"
                        type="submit">Create Room</button>
                </div>
            </form>

            @if ($errors->any())
            <div class="text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

        <div class="px-4 py-2 mt-4 mb-4 text-white bg-green-500 border-0 rounded md:max-w-md md:mx-auto">
            <span class="inline-block mr-8 text-sm align-middle">
                <b>Note:</b> <br />
                <p>I'm updating the site and trying to implement a CI/CD pipeline.</p>
                <p>I appolgize if you lose your room, just create a new room if needed.</p>
            </span>
        </div>

    </div>
</div>


@endsection
