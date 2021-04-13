<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token()}}'}</script>
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('xyz.png') }}" type="image/x-icon">
    <!-- link href -->
    @include('includes.links')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- end link -->
</head>
<body class="hold-transition sidebar-mini layout-fixed bg-white">

    <div id="app">
        <div>
            <div class="wrapper">
                <aside class="main-sidebar sidebar-light-primary elevation-4">
                    <a href="" class="brand-link">
                        <img src="/xyz.png" alt="XYZ Logo" class="brand-image  elevation-3" style="opacity: 0.8"/>
                        <span class="brand-text font-weight-light">xyz</span>
                    </a>

                    <div class="sidebar">
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <router-link to="/dashboard" exact-active-class="active" class="nav-link" role="dashboard">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>Dashboard</p>
                                    </router-link>
                                </li>

                                <li class="nav-item" role="user">
                                    <router-link to="/users" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Users</p>
                                    </router-link>
                                </li>   

                                <li class="nav-item" role="posts">
                                    <router-link to="/posts" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-sticky-note nav-icon"></i>
                                        <p>Posts</p>
                                    </router-link>
                                </li>

                                <li class="nav-item" role="comments">
                                    <router-link to="/comments" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-comments nav-icon"></i>
                                        <p>Comments</p>
                                    </router-link>
                                </li>

                                <li class="nav-item" role="photos">
                                    <router-link to="/photos" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-camera nav-icon"></i>
                                        <p>Photos</p>
                                    </router-link>
                                </li>

                                <li class="nav-item" role="albums">
                                    <router-link to="/albums" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-image nav-icon"></i>
                                        <p>Albums</p>
                                    </router-link>
                                </li>

                                <li class="nav-item" role="todos">
                                    <router-link to="/todos" exact-active-class="active" class="nav-link">
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Todos</p>
                                    </router-link>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </aside>
                <div class="content-wrapper">
                    <!-- START MAIN CONTENT -->
                    <section class="content">
                        <div class="container-fluid">
                            <router-view />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    

            
    <footer class="main-footer fixed-buttom">
        <strong>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y')}} <a href="" class="no-underline text-blue-500 hover:text-blue-600">XYZ Enterprise</a>.</strong>
        All rights reserved.
    </footer>
    <!-- START SCRIPTS LINK -->
    @include('includes.scripts')
    

</body>
</html>
