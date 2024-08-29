<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/profile.css'); ?>">
    <style>
        body {
            background-color: #adb5bd; /* Warna gray */
            color: #f8f9fa; /* Warna teks yang terang */
            font-family: 'Arial', sans-serif;
        }

        .wrapper {
            background-color: #adb5bd; /* Background form warna gray */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            background-color: #000; /* Warna form container lebih gelap */
            padding: 20px;
            border-radius: 10px;
        }

        .form-control {
            background-color: white; /* Warna input field gelap */
            color: #f8f9fa; /* Warna teks input field terang */
            border: 1px solid #6c757d; /* Border dengan warna abu-abu */
        }

        .form-control:focus {
            background-color: white; /* Warna input saat focus */
            border-color: #000; /* Warna border saat focus (emas) */
            color: #000; /* Warna teks saat focus (emas) */
        }

        .btn-primary {
            background-color: #ffc107; /* Warna tombol emas */
            border-color: #ffc107;
            color: #343a40; /* Warna teks tombol gelap */
        }

        .btn-primary:hover {
            background-color: #d39e00; /* Warna tombol saat hover */
            border-color: #c69500;
        }

        .btn-secondary {
            background-color: #6c757d; /* Warna tombol sekunder (gray) */
            border-color: #6c757d;
            color: #000; /* Warna teks tombol sekunder */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Warna tombol sekunder saat hover */
            border-color: #545b62;
        }

        h1 {
            color: #ffc107; /* Warna judul emas */
        }

        .invalid-feedback {
            color: #ffc107; /* Warna pesan error emas */
        }

        .status {
            color: #000; /* Warna status teks */
        }

        a {
            color: #000; /* Warna link emas */
        }

        a:hover {
            color: #d39e00; /* Warna link saat hover */
        }
    </style>
</head>

<body>
    <div class="wrapper container">
        <h1 class="text-center my-3">Buat Akun Anda</h1>
        <form action="<?php echo base_url() . 'singup/create_user'; ?>" method="POST" name="myForm" id="myForm" class="form-container mx-auto shadow-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username" style="color:white;"> Username</label>
                        <input type="text" class="form-control <?php echo (form_error('username') != "") ? 'is-invalid' : ''; ?>" name="username" id="userName" placeholder="Masukkan Username" value="<?php echo set_value('username') ?>">
                        <?php echo form_error('username'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname" style="color:white;"> Nama belakang</label>
                        <input type="text" class="form-control <?php echo (form_error('lastname') != "") ? 'is-invalid' : ''; ?>" name="lastname" id="lastName" placeholder="Masukkan Nama belakang" value="<?php echo set_value('lastname') ?>">
                        <?php echo form_error('lastname'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="password" style="color:white;">Password</label>
                        <input type="password" class="form-control <?php echo (form_error('password') != "") ? 'is-invalid' : ''; ?>" name="password" id="pass" placeholder="Masukkan Password" value="<?php echo set_value('password') ?>">
                        <?php echo form_error('password'); ?>
                        <span></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname" style="color:white;"> Nama depan</label>
                        <input type="text" class="form-control <?php echo (form_error('firstname') != "") ? 'is-invalid' : ''; ?>" name="firstname" id="firstName" placeholder="Masukkan Nama depan" value="<?php echo set_value('firstname') ?>">
                        <?php echo form_error('firstname'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:white;">Email</label>
                        <input type="text" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : ''; ?>" name="email" placeholder="Masukkan Email" id="email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email'); ?>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="color:white;">No HP</label>
                        <input type="number" class="form-control <?php echo (form_error('phone') != "") ? 'is-invalid' : ''; ?>" name="phone" placeholder="Contoh: 08123456789" id="phone" value="<?php echo set_value('phone') ?>">
                        <?php echo form_error('phone'); ?>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="address" style="color:white;">Alamat</label>
                <textarea id="address" placeholder="Masukkan Alamat Lengkap Anda" name="address" type="text" style="height:70px;" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : ''; ?>" value="<?php echo set_value('address'); ?>"></textarea>
                <?php echo form_error('address'); ?>
                <span></span>
            </div>
            <div class="status text-center font-weight-bold my-2"></div>
            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
            <button type="button" class="btn btn-secondary btn-block" onclick="window.history.back();">Kembali</button>
            <p>Sudah terdaftar? <a href="<?php echo base_url() . 'login/index'; ?>">Login Sekarang!</a></p>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>

</html>
