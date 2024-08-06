@extends('home.layouts.app')
@section('title', 'Blog Detail')
@section('style')
@endsection
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Blog Detail</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="{{ route('index') }}">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Blog Details</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Detail Start -->
<div class="container py-5">
    <div class="row pt-5">
        <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
                <p class="section-title pr-5">
                    <span class="pr-2">Blog Detail Page</span>
                </p>
                <h1 class="mb-3">{{ $blog->title }}</h1>
                <div class="d-flex">
                    <p class="mr-3"><i class="fa fa-user text-primary"></i> Author: {{ $blog->user->name }}</p>
                    <p class="mr-3"><i class="fa fa-folder text-primary"></i> Category: {{ $blog->category->name }}</p>
                    <p class="mr-3"><i class="fa fa-comments text-primary"></i> Status: {{ $blog->status }}</p>
                </div>
            </div>
            <div class="mb-5">
                <img class="img-fluid rounded w-100 mb-4" src="{{ asset('storage/images/' . $blog->image) }}"
                    alt="Image" />
                <p>{!! $blog->description !!}</p>
                <p>{!! $blog->tags !!}</p>
                <h2 class="mb-4">{{ $blog->title }}</h2>
                <p>{{ $blog->created_at_formatted }}</p>
                <img class="img-fluid rounded w-50 float-left mr-4 mb-3"
                    src="{{ asset('storage/images/' . $blog->image) }}" alt="Image" />
                <p>{!! $blog->publish_date_formatted !!}</p>
                <h3 class="mb-4">{{ $blog->tags }}</h3>
                <p>{!! $blog->description !!}</p>
            </div>


        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
            <!-- Author Bio -->
            <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
                <img src="{{ $blog->user->image ? asset('storage/images/' . $blog->user->image) : asset('home/img/user.jpg') }}"
                    class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px" />
                <h3 class="text-secondary mb-3">{{ $blog->user->name }}</h3>
                <p class="text-white m-0">{{ $blog->user->email }}</p>
                <p class="text-white m-0">{{ $blog->user->created_at_formatted }}</p>
            </div>

            <!-- Search Form -->
            <div class="mb-5">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Keyword" name="keyword" />
                        <div class="input-group-append">
                            <button class="input-group-text bg-transparent text-primary"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Category List -->
            <div class="mb-5">
                <h2 class="mb-4">Categories</h2>
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <a href="">{{ $category->name }}</a>
                        <span class="badge badge-primary badge-pill">{{ $category->title }}</span>
                        <span class="badge badge-primary badge-pill">{{ $category->description }}</span>
                        <span class="badge badge-primary badge-pill">{{ $category->keywords }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Single Image -->






        </div>
    </div>
</div>
<!-- Detail End -->

@endsection