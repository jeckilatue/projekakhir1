<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .background {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: #adb5bd;
            color: #333;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px;
            width: 100%;
            border: 1px solid #adb5bd;
            position: relative;
        }
        .form-container h3 {
            color: dark;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-group .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
            background-color: #f8f9fa;
            transition: border-color 0.3s;
            padding-right: 40px; /* Make room for the icon */
        }
        .form-group .form-control:focus {
            border-color: #000;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }
        .form-group .form-control.is-invalid {
            border-color: #e74c3c;
        }
        .form-group .form-control.success {
            border-color: #27ae60;
        }
        .form-group .invalid-feedback {
            color: #e74c3c;
            font-size: 14px;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 5px;
        }
        .form-group .icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #000; /* Gold color */
            font-size: 20px;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-primary:hover {
            background-color: #e1b32e;
            border-color: #e1b32e;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: dark;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="background">
        <form action="<?php echo base_url().'admin/user/edit/'.$user['u_id']; ?>" method="POST"
            class="form-container" id="myForm">
            <h3>Edit User "<?php echo $user['username']; ?>"</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <i class="fas fa-user icon"></i>
                        <input type="text" id="userName" class="form-control
                        <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username"
                            value="<?php echo set_value('username', $user['username'])?>">
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <i class="fas fa-user-tie icon"></i>
                        <input type="text" id="firstName" class="form-control
                        <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>" name="firstname"
                            value="<?php echo set_value('firstname', $user['f_name'])?>">
                        <?php echo form_error('firstname'); ?>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <i class="fas fa-user-tag icon"></i>
                        <input type="text" id="lastName" class="form-control
                        <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>" name="lastname"
                            value="<?php echo set_value('lastname', $user['l_name'])?>">
                        <?php echo form_error('lastname'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" class="form-control
                        <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email"
                            value="<?php echo set_value('email', $user['email'])?>">
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <i class="fas fa-phone icon"></i>
                        <input type="number" id="phone" class="form-control
                        <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" name="phone"
                            value="<?php echo set_value('phone', $user['phone'])?>">
                        <?php echo form_error('phone'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="pass" class="form-control
                        <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password"
                            value="<?php echo set_value('password', $user['password'])?>">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <i class="fas fa-map-marker-alt icon"></i>
                <textarea name="address" id="address" type="text" class="form-control" style="height: 70px;"
                <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>><?php echo set_value('address', $user['address']);?></textarea>
                <?php echo form_error('address'); ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg font-weight-bold px-4">Save Changes</button>
                <a href="<?php echo base_url().'admin/user/index'; ?>" class="btn btn-secondary btn-lg font-weight-bold px-4 ml-2">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
