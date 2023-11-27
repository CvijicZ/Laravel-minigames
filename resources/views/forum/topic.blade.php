@extends('shared.layout')

@section('pageContent')


    @include('shared.success-message')
    @include('shared.forum-navigation')

{{-- Controller will get clicked topic by ID and return with this view to show clicked topic --}}
@include('partials.show-topic')

@endsection
