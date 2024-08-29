<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #1e1e1e;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #2c2c2c;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 1200px;
            margin: 30px auto;
            color: #f5f5f5;
        }

        h2 {
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

        .table th,
        .table td {
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

        /* Notification Icon */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #d4af37;
            color: #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: background-color 0.3s ease;
        }

        .notification:hover {
            background-color: #b89c3e;
        }

        .notification-icon {
            font-size: 24px;
        }

        .notification-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #f44336;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div style="background-image: url('<?php echo base_url('public/front/img/bg2.jpg'); ?>'); width:100%; height:580px; background-size:cover; background-position:center; background-repeat: no-repeat;">
        <div class="container">
            <h2><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h2>
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10%"></th>
                            <th width="40%">Menu Hidangan</th>
                            <th width="15%">Harga</th>
                            <th width="15%">Jumlah</th>
                            <th width="15%">Harga Semua</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if ($this->cart->total_items() > 0) {
                            foreach ($cartItems as $item) { ?>
                                <tr>
                                    <td>
                                        <?php $image = $item['image']; ?>
                                        <img class="img-thumbnail" width="70" src="<?php echo base_url() . 'public/uploads/dishesh/thumb/' . $image; ?>">
                                    </td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo 'Rp.' . $item['price']; ?>.000</td>
                                    <td>
                                        <input type="number" class="form-control text-center" value="<?php echo $item['qty']; ?>" onChange="updateCartItem(this, '<?php echo $item['rowid'] ?>')">
                                    </td>
                                    <td><?php echo 'Rp.' . $item['subtotal']; ?>.000</td>
                                    <td>
                                        <a href="<?php echo base_url() . 'cart/removeItem/' . $item['rowid']; ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p>Tidak Ada Barang di Keranjang Anda !!</p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <a href="<?php echo base_url() . 'menu'; ?>" class="btn btn-warning">
                                            <i class="fas fa-angle-left"></i> Lanjutkan Pemesanan
                                        </a>
                                    </td>
                                    <td colspan="2"><?php if ($this->cart->total_items() > 0) { ?>
                                    <td class="text-left">Total Keseluruhan: <b><?php echo 'Rp.' . $this->cart->total(); ?>.000</b></td>
                                    <td><a href="<?php echo base_url() . 'checkout'; ?>" class="btn btn-success btn-block">Bayar <i class="fas fa-angle-right"></i></a></td>
                                <?php } ?></td>
                                <td colspan="3">
                                    <?php if ($this->cart->total_items() > 0) { ?>
                                </td>
                            <?php } ?>
                                </tr>
                            </tfoot>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Notification Icon -->
    <div class="notification" id="notificationIcon">
        <i class="fas fa-bell notification-icon"></i>
        <span class="notification-badge" id="notificationBadge">0</span>
    </div>

    <!-- JavaScript untuk memperbarui jumlah item di keranjang -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateCartItem(obj, rowid) {
            var qty = obj.value;

            $.get("<?php echo base_url('cart/updateCartItemQty'); ?>", {
                rowid: rowid,
                qty: qty
            }, function(resp) {
                if (resp == 'ok') {
                    location.reload(); // Muat ulang halaman jika berhasil
                    showNotification();
                } else {
                    alert('Gagal memperbarui keranjang, silakan coba lagi.');
                }
            });
        }

        function showNotification() {
            var badge = document.getElementById('notificationBadge');
            var count = parseInt(badge.innerText) || 0;
            badge.innerText = count + 1;

            // Optional: Set timeout to hide the notification after a few seconds
            setTimeout(function() {
                badge.innerText = '0';
            }, 3000);
        }
    </script>
</body>

</html>
