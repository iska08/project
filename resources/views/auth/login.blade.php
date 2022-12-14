@extends('layouts.auth')
@section('title','Masuk')
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="{{asset('backend/images/pages/login.png')}}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Masuk</h4>
                            </div>
                        </div>
                        <p class="px-2">Selamat Datang, Masuk Menggunakan Akun Kamu.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <legend>E-Mail</legend>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-Mail" value="{{ old('email') }}" required>
                                        <div class="form-control-position">
                                            <em class="feather icon-user"></em>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <legend>Password</legend>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="Password" required>
                                        <div class="form-control-position">
                                            <em class="feather icon-lock"></em>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary float-right btn-inline btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection