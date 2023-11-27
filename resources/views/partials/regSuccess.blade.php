
@extends('shared.layout')

@section('pageContent')
 <div class="regSus text-center">
        <h2>Registracija uspesna!</h2>
        <p>Prijavite se da biste nastavili!</p>
        <a href="{{route('login')}}"><button type="button" class="btn btn-success">Prijavi se</button></a>
    </div>
@endsection
