@extends('layouts.app')
@section('title','Login')
@section('content')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{route('login')}}" class="logo d-flex align-items-center w-auto">
                                <img src="{{asset('public/img/logo.png')}}" alt="">
                                <span class="d-none d-lg-block">Blog</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>

                                {{-- message --}}
                                @session('status')
                                <div class="alert alert-success" role="alert">
                                    {{$value}}
                                </div>
                                @endsession
                                {{-- message --}}

                                {{-- error msg --}}
                                @session('error')
                                <div class="alert alert-danger" role="alert">
                                    {{$value}}
                                </div>
                                @endsession
                                {{-- erromsg end --}}
                                <form action="{{route('auth_login')}}" method="POST" class="row g-3 needs-validation">
                                    @csrf
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>


                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="{{route('register')}}">Create
                                                an account</a></p>

                                        {{-- <p class="small mb-0">Forget Your Password ? <a
                                                href="{{route('forget_password')}}">Then click here
                                            </a></p> --}}
                                    </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection