@extends('shared.layout')

@section('pageContent')
    @include('shared.success-message')
    @include('shared.forum-navigation')

    <div class="container bootstrap snippets bootdey ">
        {{-- Get all topics ever created (not deleted ones :) ) --}}
        @foreach ($topics as $topic)
            @include('partials.show-topic')
        @endforeach
    </div>
@endsection
