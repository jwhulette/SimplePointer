@extends('layout')

@section('content')
<div class="antialiased">
    <div
        class="relative flex flex-col justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">

        <div class="px-4 mb-3 text-lg tracking-wider text-gray-500">
            Looks like I messed something up. If this occures when accessing a room, create a new room.
        </div>

        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg tracking-wider text-gray-500 border-r border-gray-400">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg tracking-wider text-gray-500 uppercase">
                    @yield('message')
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
