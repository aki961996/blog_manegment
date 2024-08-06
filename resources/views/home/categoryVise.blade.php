@extends('home/layouts/app')
@section('title','Filter Blogs')
@section('style')
@endsection
@section('content')

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Filter blogs by category</span>
            </p>

        </div>
        <div class="row pb-3">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="{{asset('storage/images/' . $blog->image)}}" alt="" />
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">{{$blog->title}}</h4>
                        <h3 class="">Author:{{$blog->author}}</h3>
                        <h4 class="">Catgeory:{{$blog->category->name}}</h4>
                        <p class="section-title px-5">
                            <span class="px-2">{{$blog->publish_date_formatted}}</span>
                        </p>
                        <p class="section-title px-5">
                            <span class="px-2">{{$blog->tags}}</span>

                        </p>
                        <div class="d-flex justify-content-center mb-3">
                            <small class="mr-3">{{$blog->description}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="padding: 10px; float:right;">
                {!!
                $blogs->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                !!}
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
@endsection