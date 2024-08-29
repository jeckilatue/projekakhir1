<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Mami Vira Food</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        body {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover; /* Ensures the background covers the entire page */
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Fixes the background image in place */
        }

        .header {
            text-align: center;
            margin: 20px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #f4c542;
            margin-bottom: 10px;
        }

        .header hr {
            border: 1px solid #f4c542;
            width: 50px;
            margin: 10px auto;
        }

        .nav {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .nav li {
            margin: 0 10px; /* Increased margin for better spacing */
        }

        .nav a {
            border: none;
            border-radius: 12px; /* Increased border-radius for a more rounded button */
            padding: 15px 30px; /* Increased padding for a larger button */
            font-size: 16px; /* Increased font size for better readability */
            text-decoration: none;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            display: inline-block;
            text-align: center; /* Center text within button */
        }

        .nav .makanan {
            background-color:#fd7e14; /* Background color for Makanan */
            color: #fff; /* Text color for Makanan */
        }

        .nav .makanan:hover {
            background-color: #fd7e14; /* Background color on hover for Makanan */
            color: #fff;
        }

        .nav .minuman {
            background-color: #6610f2; /* Background color for Minuman */
            color: #fff; /* Text color for Minuman */
        }

        .nav .minuman:hover {
            background-color: #6610f2; /* Background color on hover for Minuman */
            color: #fff;
        }

        .nav .snack {
            background-color: #0dcaf0; /* Background color for Snack */
            color: #fff; /* Text color for Snack */
        }

        .nav .snack:hover {
            background-color:#0dcaf0 ; /* Background color on hover for Snack */
            color: #fff;
        }

        .nav .semua {
            background-color: #6610f2; /* Background color for Semua */
            color: #fff; /* Text color for Semua */
        }

        .nav .semua:hover {
            background-color: #5a09b1; /* Background color on hover for Semua */
            color: #fff;
        }

        .container {
            max-width: 750px; /* Reduced the max-width for a smaller container */
            margin: 20px auto;
            padding: 15px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .dish-card {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
            flex: 1 1 calc(50% - 15px);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            width: 100%;
            height: 200px; /* Set a fixed height */
            object-fit: cover; /* Ensure the image covers the container */
            display: block; /* Ensure the image is treated as a block-level element */
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #333;
        }

        .text-muted {
            color: #666;
        }

        .btn-primary {
            background-color: #180479;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            color: #fff;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #180479;
        }

        .footer {
            background-color: #1a1a1a;
            color: #f5f5f5;
            text-align: center;
            padding: 20px;
            font-size: 0.8rem;
            margin-top: 20px;
        }

        .footer a {
            color: #f4c542;
            text-decoration: none;
        }

        .jumbotron {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <nav>
        <ul class="nav">
            <li><a href="?category=makanan" class="makanan">Makanan</a></li>
            <li><a href="?category=minuman" class="minuman">Minuman</a></li>
            <li><a href="?category=snack" class="snack">Snack</a></li>
        </ul>
    </nav>

    <div class="container dish-card">
        <?php
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        if ($category) {
            $this->db->where('kategori', $category);
        }
        $query = $this->db->get('dishesh');
        $dishesh = $query->result_array();
        ?>

        <?php if (!empty($dishesh)) { ?>
            <?php foreach ($dishesh as $dish) { ?>
                <div class="card mb-4">
                    <?php $image = $dish['img']; ?>
                    <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/dishesh/thumb/' . $image; ?>" alt="<?php echo $dish['name']; ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?php echo $dish['name']; ?></h4>
                            <h4 class="text-muted"><b>Rp.<?php echo $dish['price']; ?>.000</b></h4>
                        </div>
                        <p class="card-text" style="color:black;"><?php echo $dish['about']; ?></p>
                        <a href="<?php echo base_url() . 'Dish/addToCart/' . $dish['d_id']; ?>" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Tambahkan ke Keranjang</a>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="jumbotron">
                <h1>Tidak ada catatan yang ditemukan</h1>
            </div>
        <?php } ?>
    </div>
    <input palch>

</body>

</html>
