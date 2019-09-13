<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="/"><i class="fa fa-dashboard fa-fw"></i>Trang Chủ</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Các Bài Viết<span class="fa arrow"></span></a>
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
            <li>
                <a href="#"><i class="fas fa-images"></i> Album Ảnh<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('images.show')}}">Danh Sách</a>
                    </li>
                    <li>
                        <a href="{{route('images.index')}}">Quản Lý</a>
                    </li>
                    <li>
                        <a href="{{route('images.create')}}">Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{route('inbox')}}"><i class="fas fa-inbox"></i> Hộp Thư </a>
                </li>
            </ul>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
