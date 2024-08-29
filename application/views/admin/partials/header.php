<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard Mami Vira Foods</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dashboard.css'); ?>">
    <link rel="icon" href="<?php echo base_url() . 'public/front/img/ikon1.png'; ?>" type="image">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40; /* Dark color for navbar */
            border-bottom: 1px solid #ffc107; /* Gold bottom border */
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #ffc107 !important; /* Gold color for brand */
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            margin-left: 20px;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important; /* Gold color on hover */
            transition: color 0.3s ease;
        }

        .dropdown-menu {
            background-color: #343a40; /* Dark color for dropdown */
            border: 0;
        }

        .dropdown-item {
            color: #fff;
            font-size: 1rem;
        }

        .dropdown-item:hover {
            background-color: #ffc107; /* Gold color on hover */
            color: #343a40; /* Dark text color on hover */
        }

        .container-fluid {
            padding-left: 5%;
            padding-right: 5%;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() . 'admin/home'; ?>"><i class="fas fa-utensils"></i> Admin Mami Vira</a>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-users"></i> User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/user/'; ?>"><i class="fas fa-user-cog"></i> Kelola User</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list-alt"></i> Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/menu/'; ?>"><i class="fas fa-clipboard-list"></i> Kelola Menu</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/menu/create_menu'; ?>"><i class="fas fa-plus-square"></i> Buat Menu</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart"></i> Orders
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url() . 'admin/orders/'; ?>"><i class="fas fa-shopping-basket"></i> All Orders</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url() . 'admin/login/logout'; ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
