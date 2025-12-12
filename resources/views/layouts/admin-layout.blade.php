<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #000000;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            min-height: 100vh;
            padding: 0;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            animation: slideInLeft 0.6s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar-header {
            padding: 40px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -1px;
        }

        .sidebar-logo span {
            color: #ff4444;
        }

        .sidebar-logo i {
            color: #ff4444;
            margin-right: 10px;
        }

        .sidebar-nav {
            padding: 30px 0;
        }

        .nav-item {
            margin: 0;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.6);
            padding: 16px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            text-decoration: none;
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 25px;
            text-align: center;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
            border-left-color: #ff4444;
        }

        .nav-link.active {
            color: #ffffff;
            background: rgba(255, 68, 68, 0.1);
            border-left-color: #ff4444;
        }

        .sidebar-footer {
            padding: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-logout {
            width: 100%;
            padding: 14px;
            background: rgba(255, 68, 68, 0.1);
            border: 1px solid rgba(255, 68, 68, 0.3);
            color: #ff4444;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-logout:hover {
            background: #ff4444;
            border-color: #ff4444;
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            padding: 40px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .content-wrapper {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 40px;
            min-height: 80vh;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 30px;
            letter-spacing: -1px;
        }

        /* Buttons */
        .btn-primary {
            background: #ff4444;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            color: #ffffff;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background: #ff5555;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
            color: #ffffff;
        }

        .btn-warning {
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            color: #ffc107;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .btn-warning:hover {
            background: #ffc107;
            border-color: #ffc107;
            color: #000000;
        }

        .btn-danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .btn-danger:hover {
            background: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }

        .btn-success {
            background: #ff4444;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: #ff5555;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 68, 68, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.8);
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }

        .btn-info {
            background: rgba(13, 202, 240, 0.1);
            border: 1px solid rgba(13, 202, 240, 0.3);
            color: #0dcaf0;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .btn-info:hover {
            background: #0dcaf0;
            border-color: #0dcaf0;
            color: #000000;
        }

        /* Tables */
        .table {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            overflow: hidden;
            margin-top: 20px;
        }

        .table thead {
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table thead th {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 18px;
            border: none;
        }

        .table tbody td {
            color: rgba(255, 255, 255, 0.9);
            padding: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .table img {
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Forms */
        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding: 14px 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #ff4444;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 68, 68, 0.15);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-select option {
            background: #1a1a1a;
            color: #ffffff;
        }

        textarea.form-control {
            min-height: 120px;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 16px 20px;
            font-weight: 500;
            border-left: 4px solid;
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.1);
            border-left-color: #198754;
            color: #75b798;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            border-left-color: #dc3545;
            color: #ea868f;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Cards */
        .card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 68, 68, 0.3);
            box-shadow: 0 10px 40px rgba(255, 68, 68, 0.2);
        }

        .card-body {
            padding: 30px;
        }

        /* Dashboard Stats */
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff4444, #ff6666);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 68, 68, 0.3);
            box-shadow: 0 10px 40px rgba(255, 68, 68, 0.2);
        }

        .stat-icon {
            font-size: 3rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                min-height: auto;
            }

            .main-content {
                padding: 20px;
            }

            .content-wrapper {
                padding: 25px;
            }

            .page-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-logo">
                        <i class="fas fa-utensils"></i> Admin<span>.</span>
                    </div>
                </div>
                
                <div class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                                <i class="fas fa-list"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('meals.index') }}" class="nav-link {{ request()->routeIs('meals.*') ? 'active' : '' }}">
                                <i class="fas fa-hamburger"></i>
                                <span>Meals</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                                <span>View Website</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 main-content">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>