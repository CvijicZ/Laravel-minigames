@extends('shared.layout')

@section('pageContent')
    @include('shared.forum-navigation')

    <div class="container bootstrap snippets bootdey ">
        {{-- Get all topics created by currently logged in user in DESC order and display them with show-topic partial --}}
        @foreach (auth()->user()->topics()->latest()->get() as $topic)
            <div class="container bootstrap snippets bootdey ">
                @include('partials.show-topic')
        @endforeach
    </div>
@endsection
