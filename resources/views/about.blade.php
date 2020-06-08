@extends('layout')

@section('title', 'About')

@section('content')
<div class="container">
    <div class="w-1/2 mx-auto mt-10">
        <p class="mb-4 text-center">
            Simplepointer.com is a free tool for agile pointing.
        </p>

        <p class="mb-4">
            While there are several agile pointing websites available, they either don't work very well or are
            overly complex.
        </p>

        <p class="mb-4">
            I created simplepointer to provide a free easy way for teams to have a pointing session.
        </p>

        <p class="mb-4">
            Rooms do not expire so you can keep using the unique room url for your pointing sessions.
        </p>

        <p class="mb-4">
            You can log into the room as a player or observer. Observers do not have the ability to vote.
        </p>

        <p class="font-bold">How to use:</p>
        <ol class="ml-4 list-decimal list-inside">
            <li>Create a room by entering a name</li>
            <li>Share the room url with your team.</li>
            <li>Login to the room by entering your name</li>
            <li>Start your pointing session</li>
        </ol>

        <p class="mt-4 text-sm">
            The site is currently not responsive, so it works best on a larger
            screen. I do have plans to update the site to be mobile responsive.
        </p>

    </div>

</div>
@endsection
