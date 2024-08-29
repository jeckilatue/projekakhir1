<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Mami Vira Foods</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css'; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Ex3Ab-fiTqFTeleu"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #eaeaea;
            /* Ganti dengan warna abu-abu kehitaman */
        }

        .navbar {
            background-color: #343a40;
            /* Warna gelap untuk kesan elegan */
            border-bottom: 3px solid #ffc107;
            /* Garis bawah emas */
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #ffc107 !important;
            /* Warna emas untuk brand */
            font-weight: bold;
        }

        .navbar-text {
            color: #ffc107;
            font-size: 1rem;
            margin-left: 15px;
        }

        .nav-link {
            color: #fff !important;
            font-size: 1.1rem;
            margin-left: 20px;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffc107 !important;
            /* Warna emas saat hover */
            transition: color 0.3s ease;
        }

        .dropdown-menu {
            background-color: #343a40;
            /* Warna dropdown gelap */
            border: 0;
        }

        .dropdown-item {
            color: #fff;
            font-size: 1rem;
        }

        .dropdown-item:hover {
            background-color: #ffc107;
            /* Warna emas saat hover */
            color: #343a40;
            /* Teks hitam saat hover */
        }

        .fab,
        .fas {
            color: #ffc107;
            font-size: 1.3rem;
            margin-left: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .fab:hover,
        .fas:hover {
            color: #fff;
            /* Teks putih saat hover */
            transition: color 0.3s ease;
        }

        .navbar-toggler {
            border-color: #ffc107;
            /* Warna border toggler */
        }

        .navbar-toggler-icon {
            background-image: linear-gradient(#ffc107, #ffc107);
            /* Warna emas untuk ikon toggler */
        }

        .container-fluid {
            padding-left: 5%;
            padding-right: 5%;
        }

        /* Tambahan efek hover untuk navbar */
        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow lembut untuk navbar */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .navbar:hover {
            background-color: #495057;
            /* Warna sedikit lebih terang saat hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* Shadow lebih kuat saat hover */
        }

        .dropdown-item i {
            margin-right: 8px;
            /* Spasi sedikit antara ikon dan teks */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() . 'home/index'; ?>">
                Mami Vira Foods
            </a>
            <span class="navbar-text">08114796879</span>
            <div class="d-flex justify-content-end align-items-center" style="margin-right:100px;">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() . 'home/index'; ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'menu/index'; ?>">Menu</a>
                    </li>
                    <?php $user = $this->session->userdata('user');
                    if (empty($user)) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . 'login'; ?>">Masuk</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo ucfirst($user['username']); ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url() . 'profile'; ?>"><i class="fas fa-user-circle"></i> Profil Saya</a>
                                <a class="dropdown-item" href="<?php echo base_url() . 'orders/'; ?>"><i class="fas fa-shopping-bag"></i> Pesanan</a>
                                <a class="dropdown-item" href="<?php echo base_url() . 'login/logout'; ?>"><i class="fas fa-power-off"></i> Keluar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . 'cart'; ?>"><i class="fas fa-cart-arrow-down"></i> Keranjangku</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        $(document).ready(function() {
            $(".dropdown").hover(function() {
                var dropdownMenu = $(this).children(".dropdown-menu");
                if (dropdownMenu.is(":visible")) {
                    dropdownMenu.parent().toggleClass("open");
                }
            })
        });
    </script>
    <script src="<?php echo base_url() . 'assets/js/main.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/input.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/search.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/slider.js'; ?>"></script>
</body>