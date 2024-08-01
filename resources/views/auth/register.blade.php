@extends('layouts.app')
@section('title','Register')
@section('content')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{route('register')}}" class="logo d-flex align-items-center w-auto">
                                <img src="{{asset('public//img/logo.png')}}" alt="">
                                <span class="d-none d-lg-block">Blog</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form action="{{route('create_user')}}" method="POST" class="row g-3 needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{old('name')}}">
                                        <div style="color: red">{{$errors->first('name')}}</div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label"> Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{old('email')}}">
                                        <div style="color: red">{{$errors->first('email')}}</div>
                                    </div>



                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            value="{{old('password')}}">
                                        <div style="color: red">{{$errors->first('password')}}</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value=""
                                                id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                <a href="#">terms and conditions</a></label>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{route('login')}}">Log
                                                in</a></p>
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