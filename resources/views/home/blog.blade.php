@extends('home/layouts/app')
@section('title','Blog')
@section('style')
@endsection
@section('content')

{{-- serhc --}}

<div class="card">

    <!-- form start -->
    <form action="" method="get">


        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="container">
                        <div class="row mx-0">
                            <div class="left d-flex">
                                <div class="form-group col-sm-3">
                                    <label for="">Author</label>
                                    <input type="text" name="author" value="{{Request::get('author')}}"
                                        class="form-control" id="" placeholder="Enter Author">


                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" value="{{Request::get('title')}}"
                                        class="form-control" id="" placeholder="Enter title">
                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="category">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request()->get('category') ==
                                            $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="date" name="date" value="{{Request::get('publish_date')}}"
                                        class="form-control" id="" placeholder="Enter date">

                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                                <a href="{{route('blog')}}" class="btn btn-success" style="margin-top: 30px">Reset</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </div>
        <!-- /.card-body -->


    </form>
</div>

<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Our Blog</span>
            </p>
            <h1 class="mb-4">Latest Articles From Blog</h1>
        </div>
        <div class="row pb-3">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm mb-2">
                    <img class="card-img-top mb-2" src="{{asset('storage/images/' . $blog->image)}}" alt="" />
                    <div class="card-body bg-light text-center p-4">
                        <h4 class="">{{$blog->title}}</h4>
                        <h3 class="">Author:{{$blog->author}}</h3>
                        <p class="section-title px-5">
                            <span class="px-2">{{$blog->tags}}</span>
                        </p>
                        <div class="d-flex justify-content-center mb-3">
                            <small class="mr-3"><i class="fa fa-user text-primary"></i>{{$blog->user_name}}</small>
                            <small class="mr-3"><i
                                    class="fa fa-folder text-primary"></i>{{$blog->categories_name}}</small>
                            <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0</small>
                        </div>
                        <p>
                            {{-- {strip_tags(Str::substr($blog->description,0,170))} --}}

                        <p>{{ $blog->short_description }}</p>
                        </p>
                        <a href="{{ route('blog_detail', ['id' => encrypt($blog->id)]) }}"
                            class="btn btn-primary px-4 mx-auto my-2">Blog Details</a>
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