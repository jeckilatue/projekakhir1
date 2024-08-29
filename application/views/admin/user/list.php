<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Background dan Kontainer */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .background {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            width: 100%;
            height: 750px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 30px 0;
        }

        .container {
            background-color: #adb5bd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 1200px;
        }

        .shadow-container {
            background-color: #adb5bd;
            padding: 20px;
        }

        /* Alert Success dan Error */
        .alert-success {
            background-color: #adb5bd;
            color:#adb5bd;
            border: 1px solid #adb5bd;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        /* Judul dan Tombol */
        h2 {
            color: dark; /* Gold */
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-control {
            width: 50%;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
        }

        /* Tabel */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            margin-bottom: 20px;
        }

        .table thead th {
            background-color: #333333; /* Gray Gelap */
            color: #adb5bd; /* Gold */
            padding: 15px;
            text-align: left;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9; /* Gray Terang */
        }

        .table tbody tr:hover {
            background-color: #e9ecef; /* Gray Terang untuk Hover */
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        /* Tombol Edit dan Hapus */
        .btn-info {
            background-color: #17a2b8; /* Biru */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545; /* Merah */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="container">
            <div class="shadow-container">
                <?php if ($this->session->flashdata('success') != "") : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif ?>
                <?php if ($this->session->flashdata('error') != "") : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif ?>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="btn-group">
                        <h2>Users Yang Tersedia</h2>
                    </div>
                    <input class="form-control" id="myInput" type="text" placeholder="Search ..">
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php if (!empty($users)) { ?>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?php echo $user['u_id']; ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['f_name']; ?></td>
                                        <td><?php echo $user['l_name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['phone']; ?></td>
                                        <td><?php echo $user['address']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/user/edit/' . $user['u_id']; ?>" class="btn btn-info mb-1"><i class="fas fa-edit mr-1"></i>Edit</a>
                                            <a href="javascript:void(0);" onclick="deleteUser(<?php echo $user['u_id']; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="8">Catatan Tidak DiTemukan</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function deleteUser(id) {
            if (confirm("Are you sure you want to delete user?")) {
                window.location.href = '<?php echo base_url() . 'admin/user/delete/'; ?>' + id;
            }
        }

        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>
