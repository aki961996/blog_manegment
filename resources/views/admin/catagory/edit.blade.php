@extends('admin.layouts.app')
@section('title','Category Edit')
@section('style')
@endsection
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Edit</h1>
                    </div>

                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{route('category.list')}}" class="btn btn-primary">Back</a>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- End Page Title -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('category.update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}" class="form-control" id=""
                                placeholder="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{old('name', $category->name) }}"
                                        class="form-control" id="" placeholder="Enter name">
                                    <div style="color: red">{{$errors->first('name')}}</div>

                                </div>

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{old('title', $category->title)}}"
                                        class="form-control" id="" placeholder="Enter title">
                                    <div style="color: red">{{$errors->first('title')}}</div>

                                </div>
                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="description" class="form-control" id="title"
                                        placeholder="Enter title">{{ old('description', $category->description) }}</textarea>
                                    <div style="color: red">{{ $errors->first('description') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Keywords</label>
                                    <input type="text" name="keyword" value="{{old('keyword', $category->keywords)}}"
                                        class="form-control" id="" placeholder="Enter title">
                                    <div style="color: red">{{$errors->first('keyword')}}</div>

                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    {{-- value 1 vann active selectil --}}
                                    <select class="form-control" value="{{$category->status}}" name=" status">
                                        <option value="0" @if($category->status == 0) selected="selected" @endif>Active
                                        </option>
                                        <option value="1" @if($category->status == 1) selected="selected" @endif>
                                            Inactive
                                        </option>
                                    </select>

                                </div>




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


@endsection

@section('script')
@endsection