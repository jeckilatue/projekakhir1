<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Masuk</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/profile.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }

        .wrapper {
            background: rgba(0, 0, 0, 0.6); /* Dark overlay for better readability */
            border-radius: 10px;
            max-width: 600px;
            margin: 5% auto;
            padding: 20px;
            color: #fff;
        }

        .form-container {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container h4 {
            color: #333;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-control.bg-light {
            background-color: #f8f9fa;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
        }

        .btn {
            border-radius: 5px;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="form-container mx-auto">
            <?php
            if (!empty($this->session->flashdata('success'))) {
                echo "<div class='alert alert-success m-3'>" . $this->session->flashdata('success') . "</div>";
            }
            ?>
            <?php
            if (!empty($this->session->flashdata('msg'))) {
                echo "<div class='alert alert-danger m-3'>" . $this->session->flashdata('msg') . "</div>";
            }
            ?>
            <h4 class="pb-4 border-bottom text-center">Masuk ke Akun Anda</h4>
            <form action="<?php echo base_url() . 'login/authenticate'; ?>" name="loginform" id="loginform" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control bg-light" name="username" id="username" placeholder="Masukkan Username Anda">
                    <span></span>
                </div>
                <?php echo form_error('username'); ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control bg-light" name="password" id="password" placeholder="Masukkan Password Anda">
                    <span></span>
                </div>
                <?php echo form_error('password'); ?>
                <div class="py-3 border-top text-center">
                    <button type="submit" class="btn btn-success mr-3">Masuk</button>
                    <a href="<?php echo base_url() . 'singup/index' ?>" class="btn btn-danger">Daftar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <script>
        const form = document.getElementById('loginform');
        const username = document.getElementById('username');
        const password = document.getElementById('password');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            validate();
        })

        const sendData = (sRate, count) => {
            if (sRate === count) {
                form.submit();
            }
        }

        const successMsg = () => {
            let formCon = document.getElementsByClassName('form-control');
            var count = formCon.length;
            var sRate = 0;
            for (var i = 0; i < formCon.length; i++) {
                if (formCon[i].classList.contains('success')) {
                    sRate++;
                }
            }
            sendData(sRate, count);
        }

        const validate = () => {
            const usernameVal = username.value.trim();
            const passwordVal = password.value.trim();

            if (usernameVal === "") {
                setErrorMsg(username, 'Username tidak boleh kosong!');
            } else {
                setSuccessMsg(username);
            }

            if (passwordVal === "") {
                setErrorMsg(password, 'Password tidak boleh kosong!');
            } else {
                setSuccessMsg(password);
            }

            successMsg();
        }

        function setErrorMsg(ele, msg) {
            const formCon = ele.parentElement;
            const formInput = formCon.querySelector('.form-control');
            const span = formCon.querySelector('span');
            span.innerText = msg;
            formInput.classList.add("is-invalid");
            span.classList.add("invalid-feedback", "font-weight-bold");
        }

        function setSuccessMsg(ele) {
            const formCon = ele.parentElement;
            const formInput = formCon.querySelector('.form-control');
            formInput.classList.add("success");
        }
    </script>
</body>

</html>
