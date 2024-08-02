@extends('admin.layouts.app')
@section('title','Category Add')
@section('style')
@endsection
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Add</h1>
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
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id=""
                                        placeholder="Enter name">
                                    <div style="color: red">{{$errors->first('name')}}</div>

                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id=""
                                        placeholder="Enter title">
                                    <div style="color: red">{{$errors->first('title')}}</div>

                                </div>

                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="description" class="form-control" id="title"
                                        placeholder="Enter title">{{ old('description') }}</textarea>
                                    <div style="color: red">{{ $errors->first('description') }}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Keywords</label>
                                    <input type="text" name="keyword" value="{{old('keyword')}}" class="form-control"
                                        id="" placeholder="Enter title">
                                    <div style="color: red">{{$errors->first('keyword')}}</div>

                                </div>



                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{ old('status')==0 ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ old('status')==1 ? 'selected' : '' }}>Inactive</option>
                                    </select>

                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
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