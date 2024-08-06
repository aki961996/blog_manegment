@extends('home/layouts/app')
@section('title','Home')
@section('style')
@endsection
@section('content')



<!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-0">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">Create with wisdom</h4>
            <h1 class="display-3 font-weight-bold text-white">
                This is my Blog website and everyone hopes you like it
            </h1>

            {{-- <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a> --}}
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="{{asset('/home/img/header.png')}}" alt="" />
        </div>
    </div>
</div>
<!-- Header End --




@endsection
@section('script')
@endsection