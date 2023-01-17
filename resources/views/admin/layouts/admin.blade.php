<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin | @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    @yield('exta-css')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a>
                                </li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block"><i class="fas fa-plus"></i></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Add New Item</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Role
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> User
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Batch
                            </a>

                        </div>
                    </li>

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('admin.home') }}">DEB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('admin.home') }}">DEB</a>
                    </div>
                    <ul class="sidebar-menu">


                        <!-- Dashboard -->
                        <li class="@yield('dashbord_menu')"><a class="nav-link" href="{{ route('admin.home') }}"><i
                                    class="fas fa-fire"></i>
                                <span>Dashboard</span></a></li>

                        <!-- User Management -->
                        <li class="nav-item dropdown @yield('user_management_dropdown')">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>User Management</span></a>

                            <ul class="dropdown-menu">
                                    <li class="@yield('users_menu')"><a class="nav-link"
                                            href="{{ route('admin.users.index') }}">User</a></li>

                                <li class="@yield('roles_menu')"><a class="nav-link"
                                        href="{{ route('admin.roles.index') }}">Role</a></li>
                                <li class="@yield('permissions_menu')"><a class="nav-link"
                                        href="{{ route('admin.permissions.index') }}">Permission</a></li>

                                <li class="@yield('modules_menu')"><a class="nav-link"
                                        href="{{ route('admin.modules.index') }}">Module</a></li>
                            </ul>
                        </li>

                        <!-- Course Management -->
                        <li class="nav-item dropdown @yield('course_management_dropdown')">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Course Management</span></a>

                            <ul class="dropdown-menu">
                                <li class="@yield('batches_menu')"><a class="nav-link"
                                        href="{{ route('admin.batches.index') }}">Batch</a></li>
                            </ul>
                        </li>

                        <!-- Genaral Content -->
                        <li class="nav-item dropdown @yield('genaral_content_dropdown')">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                class="fas fa-columns"></i> <span>Genaral Content</span></a>

                            <ul class="dropdown-menu">

                                <li class="@yield('blogs_menu')"><a class="nav-link"
                                    href="{{ route('admin.blogs.index') }}">Blog</a></li>

                                <li class="@yield('counters_menu')"><a class="nav-link"
                                    href="{{ route('admin.counters.index') }}">Counter</a></li>

                                <li class="@yield('galleries_menu')"><a class="nav-link"
                                    href="{{ route('admin.galleries.index') }}">Gallery</a></li>

                                <li class="@yield('notices_menu')"><a class="nav-link"
                                    href="{{ route('admin.notices.index') }}">Notice</a></li>

                                <li class="@yield('questions_menu')"><a class="nav-link"
                                    href="{{ route('admin.questions.index') }}">Question</a></li>

                                <li class="@yield('teams_menu')"><a class="nav-link"
                                    href="{{ route('admin.teams.index') }}">Team</a></li>

                                <li class="@yield('testimonials_menu')"><a class="nav-link"
                                        href="{{ route('admin.testimonials.index') }}">Testimonial</a></li>

                                <li class="@yield('why_chooses_menu')"><a class="nav-link"
                                        href="{{ route('admin.why-chooses.index') }}">Why Choose</a></li>
                            </ul>
                        </li>

                        <!-- Web Page -->
                        <li><a target="_blank" class="nav-link" href="{{ route('frontend.index') }}"><i class="fas fa-fire"></i>
                                <span>Web Page</span></a></li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('admin.layouts.footer')

            @yield('exta_js')
</body>

</html>
