@extends('admin.layouts.app')
@section('title','Blog Add')
@section('style')
@endsection
@section('content')


<main id="main" class="main">
    <div class="pagetitle">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blog Add</h1>
                    </div>

                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{route('blog.list')}}" class="btn btn-primary">Back</a>
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
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <!-- Title Input -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        id="title" placeholder="Enter title">
                                    <div style="color: red">{{ $errors->first('title') }}</div>
                                </div>

                                <!-- Category Select -->
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category')==$category->id ?
                                            'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">{{ $errors->first('category') }}</div>
                                </div>

                                <!-- Image Input -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <div style="color: red">{{ $errors->first('image') }}</div>
                                </div>

                                <!-- Description Input -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control tinymce-editor" id="description"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    <div style="color: red">{{ $errors->first('description') }}</div>
                                </div>

                                <!-- Tags Input -->
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <textarea name="tags" class="form-control" id="tags"
                                        placeholder="Enter tags">{{ old('tags') }}</textarea>
                                    <div style="color: red">{{ $errors->first('tags') }}</div>
                                </div>

                                <!-- Publish Status Select -->
                                <div class="form-group">
                                    <label for="publish">Publish</label>
                                    <select class="form-control" name="publish" id="publish">
                                        <option value="1" {{ old('publish')==0 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('publish')==1 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>



                                <!-- Author Input -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" name="author" value="{{ old('author') }}" class="form-control"
                                        id="author" placeholder="Enter author's name">
                                    <div style="color: red">{{ $errors->first('author') }}</div>
                                </div>

                                <!-- Publish Date Input -->
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" name="publish_date" value="{{ old('publish_date') }}"
                                        class="form-control" id="publish_date">
                                    <div style="color: red">{{ $errors->first('publish_date') }}</div>
                                </div>

                                <!-- Status Select -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="0" {{ old('status')==0 ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ old('status')==1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer ">
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