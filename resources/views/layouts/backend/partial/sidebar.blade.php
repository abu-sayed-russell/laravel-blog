<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if ( Request::is('admin*')  )

                <li class="{{ Request::is('admin/dashboard') ? 'active' : 'inactive' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/post*') ? 'active' : 'inactive' }} treeview">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Post</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/post') ? 'active' : 'inactive' }}"><a href="{{ route('admin.post.index') }}"><i class="fa fa-circle-o"></i> Post</a></li>
                        <li class="{{ Request::is('admin/post') ? 'active' : 'inactive' }}"><a href="{{ route('admin.post.pending') }}"><i class="fa fa-circle-o"></i>Pending Post</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('admin/tag*') ? 'active' : 'inactive' }} treeview">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Tags</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/tag') ? 'active' : 'inactive' }}"><a href="{{ route('admin.tag.index') }}"><i class="fa fa-circle-o"></i> Tag</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : 'inactive' }} treeview">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Categories</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/category') ? 'active' : 'inactive' }}"><a href="{{ route('admin.category.index') }}"><i class="fa fa-circle-o"></i> Category</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('admin/subscriber') ? 'active' : 'inactive' }} treeview">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>subscriptions</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/subscriber') ? 'active' : 'inactive' }}"><a href="{{ route('admin.subscriber.index') }}"><i class="fa fa-circle-o"></i> Subscribers</a></li>
                        </ul>
                </li>
                <li class="header">System</li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out text-red"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
            @if ( Request::is('author*') )
                <li class="{{ Request::is('author/dashboard') ? 'active' : '' }} treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Author Dashboard</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                <li class="{{ Request::is('author/post*') ? 'active' : 'inactive' }} treeview">
                    <a href="#">
                        <i class="fa fa-tags"></i>
                        <span>Post</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('author/post') ? 'active' : 'inactive' }}"><a href="{{ route('author.post.index') }}"><i class="fa fa-circle-o"></i> Post</a></li>
                    </ul>
                </li>
                </li>

            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>