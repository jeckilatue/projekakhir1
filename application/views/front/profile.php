<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/profile.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            color: #495057; /* Dark grey text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .wrapper {
            background: #ffffff; /* White background for forms */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .wrapper h4 {
            color: #004085; /* Dark blue for headings */
            font-weight: 600;
            border-bottom: 2px solid #004085; /* Dark blue border for headings */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #004085; /* Dark blue background */
            border-color: #004085;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #002752; /* Darker blue on hover */
            border-color: #001a40;
        }

        .btn-border {
            border: 2px solid #004085; /* Dark blue border */
            color: #004085;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-border:hover {
            background-color: #004085;
            color: #ffffff;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da; /* Light grey border */
            background-color: #ffffff; /* White background for form controls */
            color: #495057; /* Dark grey text color */
            padding: 10px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #004085; /* Dark blue border on focus */
            box-shadow: 0 0 0 0.2rem rgba(0, 64, 133, 0.25); /* Subtle shadow on focus */
        }

        .form-control.is-invalid {
            border-color: #dc3545; /* Red border for invalid inputs */
        }

        .invalid-feedback {
            color: #dc3545; /* Red text for invalid feedback */
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
        }

        .alert-success {
            background-color: #d4edda; /* Light green background */
            color: #155724; /* Dark green text */
            border-color: #c3e6cb; /* Green border */
        }

        .alert-danger {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            border-color: #f5c6cb; /* Red border */
        }

        label {
            font-weight: 500;
        }

        .row .col-md-6 {
            padding: 15px;
        }
        
        .navbar {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="wrapper">
                    <?php if ($this->session->flashdata('success') != "") : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif ?>
                    <?php $loggedUser = $this->session->userdata('user'); ?>
                    <form action="<?php echo base_url() . 'profile/edit/' . $loggedUser['user_id'] ?>" method="POST">
                        <h4>Pengaturan Akun</h4>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control <?php echo (form_error('username') != "") ? 'is-invalid' : ''; ?>" value="<?php echo set_value('username', $user['username']); ?>">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" class="form-control <?php echo (form_error('firstname') != "") ? 'is-invalid' : ''; ?>" name="firstname" value="<?php echo set_value('firstname', $user['f_name']) ?>">
                                <?php echo form_error('firstname'); ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" class="form-control <?php echo (form_error('lastname') != "") ? 'is-invalid' : ''; ?>" name="lastname" value="<?php echo set_value('lastname', $user['l_name']) ?>">
                                <?php echo form_error('lastname'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?php echo (form_error('email') != "") ? 'is-invalid' : ''; ?>" name="email" value="<?php echo set_value('email', $user['email']) ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">No HP</label>
                                <input type="tel" class="form-control <?php echo (form_error('phone') != "") ? 'is-invalid' : ''; ?>" name="phone" value="<?php echo set_value('phone', $user['phone']) ?>">
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : ''; ?>" style="height:70px;"><?php echo set_value('address', $user['address']); ?></textarea>
                            <?php echo form_error('address'); ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?php echo base_url() . 'home' ?>" class="btn btn-border">Batal</a>
                            <!-- Back button -->
                            <a href="<?php echo base_url(); ?>" class="btn btn-border"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wrapper">
                    <?php if ($this->session->flashdata('pwd_success') != "") : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('pwd_success'); ?>
                        </div>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('pwd_error') != "") : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('pwd_error'); ?>
                        </div>
                    <?php endif ?>
                    <?php $loggedUser = $this->session->userdata('user'); ?>
                    <form action="<?php echo base_url() . 'profile/editPassword/' . $loggedUser['user_id'] ?>" method="POST">
                        <h4>Ubah Password</h4>
                        <div class="form-group">
                            <input type="password" class="form-control <?php echo (form_error('cPassword') != "") ? 'is-invalid' : ''; ?>" name="cPassword" placeholder="Password Saat Ini">
                            <?php echo form_error('cPassword'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control <?php echo (form_error('nPassword') != "") ? 'is-invalid' : ''; ?>" name="nPassword" placeholder="Password Baru">
                            <?php echo form_error('nPassword'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control <?php echo (form_error('nRPassword') != "") ? 'is-invalid' : ''; ?>" name="nRPassword" placeholder="Konfirmasi Password">
                            <?php echo form_error('nRPassword'); ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?php echo base_url() . 'home' ?>" class="btn btn-border">Batal</a>
                            <!-- Back button -->
                            <a href="<?php echo base_url(); ?>" class="btn btn-border"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
