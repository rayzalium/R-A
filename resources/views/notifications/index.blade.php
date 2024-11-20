<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <!-- Add CSS for styling -->
    <style>
        /* Notification dropdown styling */
        .notification-dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            display: none; /* Hidden by default */
            z-index: 1000;
            padding: 10px;
            border-radius: 5px;
        }
        .notification-dropdown li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .notification-dropdown li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <!-- Bell Icon with notification badge -->
    <div style="position: relative;">
        <a href="javascript:void(0)" onclick="toggleNotifications()" class="position-relative">
            <i class="fa-regular fa-bell" type="button"></i>
            @if(App\Models\Notification::where('is_read', false)->count() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ App\Models\Notification::where('is_read', false)->count() }}
                </span>
            @endif
        </a>

        <!-- Notification Dropdown -->
        <div id="notificationDropdown" class="notification-dropdown">
            <h4>Notifications</h4>
            <ul>
                @foreach(App\Models\Notification::where('is_read', false)->get() as $notification)
                    <li>
                        {{ $notification->message }}
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit">Mark as Read</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- JavaScript to toggle the dropdown -->
    <script>
        function toggleNotifications() {
            var dropdown = document.getElementById("notificationDropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }

        // Close the dropdown if clicked outside
        window.onclick = function(event) {
            var dropdown = document.getElementById("notificationDropdown");
            if (!event.target.matches('.fa-bell') && dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    </script>
</body>
</html>
