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

    <style>
        .notification-dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            width: 300px;
            max-height: 300px;
            overflow-y: auto;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
            border-radius: 5px;
        }
        .notification-dropdown h4 {
            padding: 10px;
            margin: 0;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }
        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .notification-item:last-child {
            border-bottom: none;
        }
        .notification-item p {
            margin: 0;
            color: #333;
            font-size: 14px;
        }
        .notification-item button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 13px;
            padding: 0;
        }
        .notification-item button:hover {
            text-decoration: underline;
        }
        .fa-square-check{
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: large;
        }

    </style>


</head>


<header class="header-global d-flex pt-6 pt-md-7 border-bottom border-light bg-primary">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary navbar-light">
        <div class="container position-relative">
            <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="../pages/On-Cycle.html">
                <img class="navbar-brand-dark" src="{{ asset('assets/img/yemenia-logo.png') }}" alt="Logo dark">
                <img class="navbar-brand-light" src="{{ asset('assets/img/yemenia-logo.png') }}" alt="Logo light">
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                            <span class="nav-link-inner-text">Pages</span>
                            <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../pages/Hour2.html">Hour</a></li>
                            <li><a class="dropdown-item" href="../pages/ADD.html">ADD</a></li>
                            <li><a class="dropdown-item" href="../pages/On-Cycle.html">On-Cycle</a></li>
                            <li><a class="dropdown-item" href="../pages/on-date.html">On-Date</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="align-items-lg-left">
            <div style="position: relative;">
                <!-- Bell icon -->
                <a href="#" onclick="toggleNotifications()" class="position-relative">
                    <i class="fa-regular fa-bell" type="button"></i>
                    @if($notifications->count() > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $notifications->count() }}
                        </span>
                    @endif
                </a>

                <!-- Notification Dropdown -->
                <div id="notificationDropdown" class="notification-dropdown">
                    <h4>Notifications</h4>
                    <ul>
                        @foreach($notifications as $notification)
                            <li class="notification-item" style="padding: 10px; border-bottom: 1px solid #ddd;">
                                <p style="margin: 0 0 5px; color: #333;">
                                    {{ $notification->message }}
                                </p>
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <label style="display: flex; align-items: center; cursor: pointer;">
                                        <input type="checkbox" style="margin-right: 5px;" onchange="this.form.submit()"> Mark as read
                                    </label>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</header>


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
                    <a class="nav-link d-flex justify-content-between align-items-center"  href="#submenu-parts" role="button" aria-expanded="false" aria-controls="submenu-parts">
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
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cycleA.index')}}">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cycleB.index')}}">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cycleC.index')}}">AFC</a>
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
                                            <a class="nav-link"  href="{{ route('hour.index')}}">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('hourb.index')}}">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('hourc.index')}}">AFC</a>
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
                                            <a class="nav-link" href="{{ route('dateA.index')}}">AFA</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('dateB.index')}}">AFB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('dateC.index')}}">AFC</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center"  href="{{ route('LogSheet.index')}}" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">LogSheets</span>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center"  href="{{ route('User.index')}}" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">Users</span>

                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center"  href="{{ route('notification.index')}}" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">Notifications</span>

                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center"  href="#submenu-parts" role="button" aria-expanded="false" aria-controls="submenu-parts">
                        <span class="sidebar-text">Reports</span>

                    </a>
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
    <script>
        function toggleNotifications() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('notificationDropdown');
            const bellIcon = event.target.closest('.fa-bell');

            if (!dropdown.contains(event.target) && !bellIcon) {
                dropdown.style.display = 'none';
            }
        });
    </script>
</body>

</html>
