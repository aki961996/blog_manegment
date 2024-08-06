<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary">Blog</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

            {{-- <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                @foreach ($categories as $categoryHeader)
                <a href="" class="nav-item nav-link">{{ $categoryHeader->name }}</a>
                @endforeach
                <a href="{{ route('blog') }}" class="nav-item nav-link">Blogs</a>

            </div> --}}

            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('blog') }}" class="nav-item nav-link">Blogs</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $categoryHeader)
                        <a class="dropdown-item" href="{{ route('category.filter', encrypt($categoryHeader->id)) }}">
                            {{ $categoryHeader->name }}
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="py-0">
                <a href="{{route('login')}}" class="btn btn-primary px-4">Login</a>
                <a href="{{route('register')}}" class="btn btn-primary px-4">Register</a>

            </div>

        </div>
    </nav>
</div>
<!-- Navbar End -->