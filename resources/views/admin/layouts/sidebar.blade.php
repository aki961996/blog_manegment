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
            <a class="nav-link @if(Request::segment(2) == 'category') @else  collapsed @endif"" href="
                {{asset('admin/category')}}">
                <i class="bi bi-person"></i>
                <span>Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
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