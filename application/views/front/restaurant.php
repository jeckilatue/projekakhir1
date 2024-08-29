<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah makan</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/styles.css'; ?>">
    <style>
        body {
            background: linear-gradient(to right, #1c1c1c, #434343);
            color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .welcome {
            text-align: center;
            padding: 80px 20px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url('<?php echo base_url('public/front/img/bg3.jpg'); ?>') no-repeat center center/cover;
            color: #f0f0f0;
            margin-bottom: 40px;
        }

        .welcome h1 {
            font-size: 3.5rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);
        }

        .container-fluid {
            padding: 0 30px;
        }

        .dish-card {
            background-color: #2b2b2b;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .card {
            background-color: #333;
            color: #f0f0f0;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-bottom: 3px solid #fd7e14;
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .card-text {
            margin-bottom: 15px;
            color: #ddd;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #fd7e14;
            border-color: #fd7e14;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #e06600;
            border-color: #e06600;
        }

        hr {
            border-top: 1px solid #444;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .no-records {
            color: #f0f0f0;
            text-align: center;
            padding: 60px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
        }

        .footer {
            background-color: #222;
            color: #f0f0f0;
            padding: 20px 0;
            text-align: center;
            font-size: 0.9rem;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="welcome">
        <h1 class="display-4">Rumah ,makan </h1>
    </div>

    <div class="container-fluid padding">
        <div class="row dish-card">
            <?php if (!empty($stores)) { ?>
                <?php foreach ($stores as $store) { ?>
                    <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                        <div class="card mb-4">
                            <?php $image = $store['img']; ?>
                            <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/restaurant/thumb/bg2' . $image; ?>" alt="Restaurant Image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $store['name']; ?></h4>
                                <p class="card-text mb-0"><?php echo $store['c_name'] . " Restaurant"; ?></p>
                                <p class="card-text mb-0"><?php echo $store['address']; ?></p>
                                <hr>
                                <p class="card-text mb-0">OPENING HOURS</p>
                                <p class="card-text mb-0"><?php echo $store['o_days']; ?></p>
                                <p class="card-text"><?php echo $store['o_hr']; ?> - <?php echo $store['c_hr']; ?></p>
                                <hr>
                                <a href="<?php echo base_url() . 'dish/list/' . $store['r_id']; ?>" class="btn btn-primary">View Menu</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="no-records">
                    <h1>No records found</h1>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> rumah makan. All Rights Reserved.
    </div>
</body>

</html>
