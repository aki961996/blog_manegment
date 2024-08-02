@extends('admin.layouts.app')
@section('title','Users List')
@section('style')
@endsection
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    @include('msg')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            Users List
                            <a href="{{route('users.add')}}" class="btn btn-primary"
                                style="float: right;margin-top: -12px;">Add New Users</a>
                        </h5>



                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$users->firstItem() + $loop->index}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{route('users.edit', encrypt($user->id))}}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                    <td><a href="{{route('users.destroy',encrypt($user->id))}}"
                                            class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>

                    <div style="padding: 10px; float:right;">
                        {!!
                        $users->appends(\Illuminate\Support\Facades\Request::except('page'))->links()
                        !!}
                    </div>
                </div>



            </div>


        </div>
    </section>

</main><!-- End #main -->


@endsection

@section('script')
@endsection