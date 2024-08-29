<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau Pesanan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #1e1e1e;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>'); /* Ganti dengan path gambar latar belakang Anda */
            background-size: cover; /* Pastikan gambar menutupi seluruh halaman */
            background-position: center; /* Posisi gambar di tengah */
            background-attachment: fixed; /* Agar gambar latar belakang tetap saat scroll */
        }

        .container {
            background-color: rgba(44, 44, 44, 0.9); /* Warna latar belakang dengan transparansi */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 1200px;
            margin: 30px auto;
        }

        h2, h3 {
            color: #d4af37;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .table {
            background-color: #3a3a3a;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            color: #f5f5f5;
            border-bottom: 1px solid #555;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #2c2c2c;
        }

        .table-hover tbody tr:hover {
            background-color: #444;
        }

        .form-control {
            background-color: #3a3a3a;
            color: #f5f5f5;
            border: 1px solid #555;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #d4af37;
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
        }

        .alert {
            color: #fff;
            background-color: #4caf50;
            border: 1px solid #388e3c;
            border-radius: 4px;
        }

        .btn {
            border-radius: 4px;
            padding: 10px 15px;
            font-size: 14px;
            text-decoration: none;
            color: #f5f5f5;
        }

        .btn-primary {
            background-color: #d4af37;
            border: none;
        }

        .btn-primary:hover {
            background-color: #b89c3e;
        }

        .btn-danger {
            background-color: #f44336;
            border: none;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-warning {
            background-color: #ff9800;
            border: none;
        }

        .btn-warning:hover {
            background-color: #f57c00;
        }

        .btn-success {
            background-color: #4caf50;
            border: none;
        }

        .btn-success:hover {
            background-color: #388e3c;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .form-container {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 8px;
        }

        .form-container hr {
            border: 1px solid #d4af37;
        }

        .payment-info {
            background-color: #333;
            color: #f5f5f5;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="cart-notification" class="alert alert-success" style="display:none; position:fixed; top:10px; right:10px; z-index:1000;">
            Pesanan berhasil ditambahkan ke keranjang!
        </div>

        <div class="row">
            <div class="col-md-8">
                <h2 class="mt-3"><i class="fas fa-receipt"></i> Pratinjau Pesanan</h2>
                <div class="table-responsive-sm">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Gambar Hidangan</th>
                                <th>Menu Hidangan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Harga Semua</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php if ($this->cart->total_items() > 0) {
                                foreach ($cartItems as $item) { ?>
                                    <tr>
                                        <td>
                                            <?php $image = $item['image']; ?>
                                            <img class="img-thumbnail" width="100" src="<?php echo base_url('public/uploads/dishesh/thumb/' . $image); ?>">
                                        </td>
                                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                                        <td><?php echo 'Rp.' . number_format($item['price'], 0, ',', '.'); ?>.000</td>
                                        <td><?php echo htmlspecialchars($item['qty']); ?></td>
                                        <td><?php echo 'Rp.' . number_format($item['subtotal'], 0, ',', '.'); ?>.000</td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p>Tidak Ada Barang di Keranjang Anda !!</p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <?php if ($this->cart->total_items() > 0) { ?>
                                    <td class="text-left">Total: <b><?php echo 'Rp.' . number_format($this->cart->total(), 0, ',', '.'); ?>.000</b></td>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <form id="checkoutForm" action="<?php echo base_url('checkout/index'); ?>" method="POST" class="form-container shadow-container" style="width:100%">
                    <h3 class="mt-3"><i class="fas fa-info-circle"></i> Rincian Pengiriman</h3>
                    <hr>
                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <textarea name="address" id="address" type="text" style="height:70px;" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : ''; ?>"><?php echo set_value('address', htmlspecialchars($user['address'])); ?></textarea>
                        <?php echo form_error('address'); ?>
                    </div>
                    <p class="lead mb-0">Pembayaran Tunai Saat Pengiriman</p>
                    <div class="payment-info">
                        Bayar dengan Uang Tunai saat Pengiriman Tiba
                    </div>
                    <div>
                        <a href="<?php echo base_url('cart'); ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i> Kembali</a>
                        <button type="submit" name="placeOrder" class="btn btn-success">Pesan <i class="fas fa-angle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Show notification if the item was added to the cart using SweetAlert
            <?php if ($this->session->flashdata('cart_success')) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Item berhasil ditambahkan ke keranjang!',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php } ?>

            // Confirmation dialog on form submission using SweetAlert
            $('#checkoutForm').on('submit', function(event) {
                event.preventDefault(); // Prevent form from submitting

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Ingin melanjutkan dengan pesanan ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Pesan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Submit the form if confirmed
                    }
                });
            });

            // Handle the click on the "Via Transfer" button
            $('#pay-button').on('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior

                Swal.fire({
                    title: 'Transfer Bank',
                    text: 'Anda akan diarahkan ke halaman pembayaran via transfer bank. Apakah Anda ingin melanjutkan?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?php echo base_url("payment/transfer"); ?>'; // Redirect to the transfer page
                    }
                });
            });
        });
    </script>
</body>

</html>
