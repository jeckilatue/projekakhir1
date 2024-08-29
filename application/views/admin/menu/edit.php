<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .background-container {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh; /* Cover the whole viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .form-container {
            background-color: #adb5bd;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background-color: #f8d7da;
        }

        .form-control.success {
            border-color: #28a745;
            background-color: #d4edda;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-weight: bold;
        }

        .btn {
            border-radius: 6px;
            padding: 10px 20px;
            font-size: 16px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-container img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }

        .form-group span {
            display: block;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="background-container">
        <form id="myForm" action="<?php echo base_url() . 'admin/menu/edit/' . $dish['d_id']; ?>" method="POST" class="form-container shadow-container" enctype="multipart/form-data">
            <h3 class="mb-3 text-center">Edit Menu "<?php echo $dish['name']; ?>"</h3>
            <div class="form-group">
                <label for="resname">Select Restaurant</label>
                <select name="rname" id="resname" class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : ''; ?>" style="height:40px;">
                    <option>--Select Restaurant--</option>
                    <?php if (!empty($stores)) {
                        foreach ($stores as $store) { ?>
                            <option value="<?php echo $store['r_id']; ?>" <?php echo set_select('rname', $store['r_id'], $store['r_id'] == $dish['r_id']); ?>>
                                <?php echo $store['name']; ?>
                            </option>
                    <?php } } ?>
                </select>
                <span><?php echo form_error('rname'); ?></span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Menu Hidangan</label>
                        <input type="text" class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Enter dish name" value="<?php echo set_value('name', $dish['name']); ?>" style="height:40px;">
                        <span><?php echo form_error('name'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="text" class="form-control <?php echo (form_error('price') != "") ? 'is-invalid' : ''; ?>" id="price" name="price" placeholder="Enter Price" value="<?php echo set_value('price', $dish['price']); ?>" style="height:40px;">
                        <span><?php echo form_error('price'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="about">Tentang</label>
                        <input type="text" class="form-control <?php echo (form_error('about') != "") ? 'is-invalid' : ''; ?>" id="about" name="about" placeholder="About" value="<?php echo set_value('about', $dish['about']); ?>" style="height:40px;">
                        <span><?php echo form_error('about'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control <?php echo (form_error('kategori') != "") ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" style="height:40px;">
                            <option value="makanan" <?php echo set_select('kategori', 'makanan', $dish['kategori'] == 'makanan'); ?>>Makanan</option>
                            <option value="minuman" <?php echo set_select('kategori', 'minuman', $dish['kategori'] == 'minuman'); ?>>Minuman</option>
                            <option value="snack" <?php echo set_select('kategori', 'snack', $dish['kategori'] == 'snack'); ?>>Snack</option>
                        </select>
                        <span><?php echo form_error('kategori'); ?></span>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Gambar Makanan</label>
                        <input type="file" id="image" name="image" class="form-control <?php echo (!empty($errorImageUpload)) ? 'is-invalid' : ''; ?>">
                        <span><?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?></span>
                        <?php if ($dish['img'] != "" && file_exists('./public/uploads/dishesh/thumb/' . $dish['img'])) { ?>
                            <img src="<?php echo base_url() . 'public/uploads/dishesh/thumb/' . $dish['img']; ?>" alt="Dish Image">
                        <?php } else { ?>
                            <img src="<?php echo base_url() . 'public/uploads/no-image.png'; ?>" alt="No Image Available" width="300">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Make Changes</button>
                <a href="<?php echo base_url() . 'admin/menu/index'; ?>" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('myForm');
        const resname = document.getElementById("resname");
        const dishname = document.getElementById("name");
        const price = document.getElementById("price");
        const about = document.getElementById("about");
        const kategori = document.getElementById("kategori");
        const image = document.getElementById("image");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            validate();
        });

        const sendData = (sRate, count) => {
            if (sRate === count) {
                event.currentTarget.submit();
            }
        }

        const successMsg = () => {
            let formCon = document.getElementsByClassName('form-control');
            var count = formCon.length - 2;
            for (var i = 0; i < formCon.length; i++) {
                if (formCon[i].className === "form-control my-2 success") {
                    var sRate = 0 + i;
                    sendData(sRate, count);
                } else {
                    return false;
                }
            }
        }

        const validate = () => {
            const resnameVal = resname.value.trim();
            const dishnameVal = dishname.value.trim();
            const priceVal = price.value.trim();
            const aboutVal = about.value.trim();
            const kategoriVal = kategori.value.trim();
            const imageVal = image.value.trim();

            if (resnameVal === "--Select Restaurant--") {
                setErrorMsg(resname, 'Please select a restaurant');
            } else {
                setSuccessMsg(resname);
            }
            if (dishnameVal === "") {
                setErrorMsg(dishname, 'Menu Hidangan Tidak Boleh Kosong');
            } else {
                setSuccessMsg(dishname);
            }
            if (priceVal === "") {
                setErrorMsg(price, 'Harga Tidak Boleh Kosong');
            } else {
                setSuccessMsg(price);
            }
            if (aboutVal === "") {
                setErrorMsg(about, 'Tentang Tidak Boleh Kosong');
            } else {
                setSuccessMsg(about);
            }
            if (kategoriVal === "") {
                setErrorMsg(kategori, 'Kategori Tidak Boleh Kosong');
            } else {
                setSuccessMsg(kategori);
            }

            successMsg();
        }

        function setErrorMsg(ele, errormsgs) {
            const formCon = ele.parentElement;
            const formInput = formCon.querySelector('.form-control');
            const span = formCon.querySelector('span');
            span.innerText = errormsgs;
            formInput.className = "form-control my-2 is-invalid";
            span.className = "invalid-feedback font-weight-bold";
        }

        function setSuccessMsg(ele) {
            const formGroup = ele.parentElement;
            const formInput = formGroup.querySelector('.form-control');
            formInput.className = "form-control my-2 success";
        }
    </script>
</body>
</html>
