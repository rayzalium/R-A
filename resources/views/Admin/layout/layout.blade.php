<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>

    <!-- Meta Tags for SEO -->
    <meta name="title" content="Neumorphism Components - Tables">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../../vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"  href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}" >


    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> --}}


</head>

<body>
    <nav id="sidebarMenu" class="sidebar">
        <div class="sidebar-inner px-4 pt-3">
            <!-- Profile Section -->
            <div class="profile-section">

                <div class="profile-info">
                    <p class="mb-0 font-weight-bold"></p>
                    <small></small>
                </div>
            </div>

            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu-parts" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">Home</span>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu-parts" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">Parts</span>
                        <span class="link-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="submenu-parts">
                        <ul class="nav flex-column dropdown-menu-end">
                            <li class="nav-item">
                                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu-on-cycle" role="button" aria-expanded="false" aria-controls="submenu-on-cycle">
                                    <span class="sidebar-text">On-Cycle</span>
                                    <span class="link-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="submenu-on-cycle">
                                    <ul class="nav flex-column dropdown-menu-end">
                                        <li class="nav-item-selected">
                                            <a class="nav-link-selected" href="{{ route('cycleA.index')}}">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cycleB.index')}}">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFC</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse" id="submenu-parts">
                        <ul class="nav flex-column dropdown-menu-end">
                            <li class="nav-item">
                                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu-hour" role="button" aria-expanded="false" aria-controls="submenu-hour">
                                    <span class="sidebar-text">Hour</span>
                                    <span class="link-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="submenu-hour">
                                    <ul class="nav flex-column dropdown-menu-end">
                                        <li class="nav-item" aria-current="true">
                                            <a class="nav-link"  href="">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFC</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item"></li>
                                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu-on-date" role="button" aria-expanded="false" aria-controls="submenu-on-date">
                                    <span class="sidebar-text">On-Date</span>
                                    <span class="link-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="submenu-on-date">
                                    <ul class="nav flex-column dropdown-menu-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="">AFC</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            <!-- Move the button to be outside the main list but within the sidebar-inner div -->
         <div>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Log Out
                </a>
                </form>

        </div>
    </nav>

    @yield('adminContent')

                        <footer class="d-flex pb-5 pt-6 pt-md-7  bg-primary">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                </div>
                                <hr class="my-5">
                                <div class="row">
                                    <div class="col">

                                        <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                                            <p class="font-weight-normal font-small mb-0">Copyright © QMMR
                                                <span class="current-year">2024</span>. All rights reserved.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>

    <!-- Scripts (optional, but recommended for dropdowns and interactivity) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
