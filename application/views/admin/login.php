<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url() . '/assets/css/dashboard.css'; ?>">
    <style>
        body {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay for better readability */
            z-index: 1;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
            max-width: 400px;
            width: 100%;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn {
            background-color: #007bff;
            border: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
        .form-control {
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <h1 class="text-center mb-4">Vira Admin</h1>
        <p class="text-center mb-4">Silahkan Login Untuk Melanjutkan</p>
        <?php
        if (!empty($this->session->flashdata('msg'))) {
            echo "<div class='alert alert-danger'>" . $this->session->flashdata('msg') . "</div>";
        }
        ?>
        <form action="<?php echo base_url() . 'admin/login/authenticate'; ?>" name="loginform" id="loginform" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                <span></span>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <span></span>
            </div>
            <?php echo form_error('password'); ?>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
    <script>
        const form = document.getElementById("loginform");
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            validate();
        });

        const sendData = (sRate, count) => {
            if (sRate === count) {
                event.currentTarget.submit();
            }
        };

        const successMsg = (usernameVal) => {
            let formCon = document.getElementsByClassName('form-control');
            var count = formCon.length - 1;
            for (var i = 0; i < formCon.length; i++) {
                if (formCon[i].className === "form-control success") {
                    var sRate = 0 + i;
                    sendData(sRate, count);
                } else {
                    return false;
                }
            }
        };

        const validate = () => {
            const usernameVal = username.value.trim();
            const passwordVal = password.value.trim();

            if (usernameVal === "") {
                setErrorMsg(username, 'Username cannot be blank');
            } else {
                setSuccessMsg(username);
            }
            if (passwordVal === "") {
                setErrorMsg(password, 'Password cannot be blank');
            } else {
                setSuccessMsg(password);
            }
            successMsg(usernameVal);
        };

        function setErrorMsg(ele, errormsgs) {
            const formGroup = ele.parentElement;
            const formInput = formGroup.querySelector('.form-control');
            const span = formGroup.querySelector('span');
            span.innerText = errormsgs;
            formInput.className = "form-control is-invalid";
            span.className = "invalid-feedback font-weight-bold";
        }

        function setSuccessMsg(ele) {
            const formGroup = ele.parentElement;
            const formInput = formGroup.querySelector('.form-control');
            formInput.className = "form-control success";
        }
    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
