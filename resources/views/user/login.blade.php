@extends('shared.layout')

@section('pageContent')

    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Prijava</h2>

                        <form action="{{route('user.login')}}" method="post" id="form">
                            @csrf
                            <div class="form-outline mb-4">
                            @error('credentialsError')
                                        <span class="border-bottom border-danger d-block fs-6 text-danger mt-2">{{$message}}</span>
                                        @enderror
                                <div class="input-control">
                                    <label class="form-label" for="ime">Ime ili e-mail</label>
                                    <input type="text" id="ime" name="name"
                                        class="form-control form-control-lg" />
                                        @error('name')
                                        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                                        @enderror

                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <div class="input-control">
                                    <label class="form-label" for="sifra">Šifra</label>
                                    <input type="password" id="sifra" name="password"
                                        class="form-control form-control-lg" />
                                        @error('password')
                                        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="submit"
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Prijavi se</button>
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Nemaš nalog? <a href="register.php"
                                    class="fw-bold text-body"><u>Registruj se</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
