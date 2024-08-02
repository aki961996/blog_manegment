<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) == 'dashboard') @else  collapsed @endif"
                href="{{asset('admin/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) == 'user') @else  collapsed @endif"
                href="{{asset('admin/user/list')}}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) == 'category') @else  collapsed @endif"
                href="{{asset('admin/category/list')}}">
                <i class="bi bi-person"></i>
                <span>Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(Request::segment(2) == 'blog') @else  collapsed @endif"
                href="{{asset('admin/blog/list')}}">
                <i class="bi bi-person"></i>
                <span>Blog</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="{{asset('logout')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>





    </ul>

</aside>