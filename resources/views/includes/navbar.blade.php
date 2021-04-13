<!-- START NAVBAR -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- START NAVBAR LINKS -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
    </ul>
    <!-- END NAVBAR LINKS -->

    <!-- START RIGHT NAVBAR LINKS -->
   
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link"></a>
        </li>
         <!-- nav item 1 -->
        {{-- <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link">
                <i class="fas fa-user-plus"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <a href="" class="dropdown-item "><i class="fas fa-user-md"></i> Users</a>
                <div class="dropdown-divider"></div>
            </div>
        </li> --}}
        <!-- nav item 2 -->
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                {{-- <a href="" class="dropdown-item"><i class="fas fa-users"></i>Users</a>
                <div class="dropdown-divider"></div> --}}
                <form action="{{ route('logout') }}" id="frmLogout" method="post">
                @csrf
                    <a href="javascript:void(0);" onclick="$('#frmLogout').submit();" class="dropdown-item" style="color: red;">Logout</a>
                    <button type="submit" style="display:none;">Submit</button>
                </form>
            </div>
        </li>
    </ul>
    <!-- END RIGHT NAVBAR LINKS -->
    
</nav>
<!-- END NAVBAR -->