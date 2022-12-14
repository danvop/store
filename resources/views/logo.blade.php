@extends('layouts.main')

@section('content')

    <div class="max-w-sm mx-auto flex p-6 bg-white rounded-lg shadow-xl">
        <div class="flex-shrink-0">
            <img class="h-12 w-12" src="/images/logo.svg" alt="ChitChat Logo">
        </div>
        <div class="ml-6 pt-1">
            <h4 class="text-xl text-gray-900 leading-tight">ChitChat</h4>
            <p class="text-base text-gray-600 leading-normal">You have a new message!</p>
        </div>
    </div>

@endsection