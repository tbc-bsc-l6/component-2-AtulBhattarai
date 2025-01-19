<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Books')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Sidebar styles */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            background-color: #423eca;
            color: white;
            width: 250px;
            padding-top: 50px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #d63838;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Adjusts the body content for small screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="sidebar bg-gray-800">
        <h2 class="text-center text-white text-xl font-bold">Flexon Nepal</h2>
        <ul class="flex flex-col px-4">
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('category.index')}}">Category</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('brand.index')}}">Brands</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('product.index')}}">Products</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('profile.edit')}}">Profile</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('vieworders')}}">View Orders</a>
            </li>
            <li class="py-2">
                <a class="block px-3 py-2 rounded hover:bg-gray-600" href="{{route('admin.logout')}}">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <!-- Offcanvas Toggler for smaller screens -->
        <button class="bg-blue-500 text-white p-2 rounded-md d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>

    <!-- Offcanvas Sidebar for Small Screens -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
                </li>
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200" href="{{route('category.index')}}">Category</a>
                </li>
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200" href="{{route('brand.index')}}">Brands</a>
                </li>
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200" href="{{route('product.index')}}">Products</a>
                </li>
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200" href="{{route('profile.edit')}}">Profile</a>
                </li>
                <li class="py-2">
                    <a class="block px-3 py-2 rounded hover:bg-gray-200 disabled" href="#" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
