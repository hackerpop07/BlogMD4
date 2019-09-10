<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="/"><i class="fa fa-dashboard fa-fw"></i>Trang Chủ</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Các Bài Viết<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('post.index')}}">Danh Sách</a>
                    </li>
                    <li>
                        <a href="{{route('post.create')}}">Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a href="{{route('posts')}}">List Product</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('admin.product.create')}}">Add Product</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- /.nav-second-level -->--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level">--}}
{{--                    <li>--}}
{{--                        <a href="{{route('userLogin')}}">List User</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('admin.user.create')}}">Add User</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- /.nav-second-level -->--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
