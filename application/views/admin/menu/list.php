<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            background-color: #adb5bd;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
        }
        .table thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .alert {
            border-radius: 4px;
        }
        .search-input {
            width: 50%;
            margin-bottom: 15px;
        }
        .pagination-buttons {
            margin-top: 20px;
        }
        .pagination-buttons .btn {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="container shadow-container">
        <?php if ($this->session->flashdata('dish_success') != "") : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('dish_success'); ?>
            </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('error') != "") : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <h2>Semua Detail Menu</h2>
            <input class="form-control search-input" id="myInput" type="text" placeholder="Cari ..">
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu Hidangan</th>
                        <th>Tentang</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if (!empty($dishesh)) { ?>
                        <?php foreach ($dishesh as $dish) { ?>
                            <tr>
                                <td><?php echo $dish['d_id']; ?></td>
                                <td><?php echo $dish['name']; ?></td>
                                <td><?php echo $dish['about']; ?></td>
                                <td><?php echo "Rp" . $dish['price']; ?>.000</td>
                                <td><?php echo $dish['kategori']; ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/menu/edit/' . $dish['d_id']; ?>" class="btn btn-info mb-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="javascript:void(0);" onclick="deleteMenu(<?php echo $dish['d_id']; ?>)" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5">Catatan Tidak Ditemukan</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between pagination-buttons">
            <button id="prev" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Previous</button>
            <button id="next" class="btn btn-secondary">Next <i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deleteMenu(id) {
            if (confirm("Are you sure you want to delete this dish?")) {
                window.location.href = '<?php echo base_url() . 'admin/menu/delete/'; ?>' + id;
            }
        }

        $(document).ready(function() {
            // Search filter
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Pagination
            var rowsPerPage = 4;
            var rows = $('#myTable tr');
            var rowsCount = rows.length;
            var pageCount = Math.ceil(rowsCount / rowsPerPage);
            var currentPage = 1;

            rows.hide();
            rows.slice(0, rowsPerPage).show();

            $('#next').click(function() {
                if (currentPage < pageCount) {
                    currentPage++;
                    var start = (currentPage - 1) * rowsPerPage;
                    var end = start + rowsPerPage;
                    rows.hide();
                    rows.slice(start, end).show();
                }
            });

            $('#prev').click(function() {
                if (currentPage > 1) {
                    currentPage--;
                    var start = (currentPage - 1) * rowsPerPage;
                    var end = start + rowsPerPage;
                    rows.hide();
                    rows.slice(start, end).show();
                }
            });
        });
    </script>
</body>
</html>
