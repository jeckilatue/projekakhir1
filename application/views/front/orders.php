<!DOCTYPE html>
<html lang="en">
   <div style="background-image: url('<?php echo base_url('public/front/img/bg2.jpg'); ?>'); width:100%; height:580px; background-size:cover; background-position:center; background-repeat: no-repeat;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f7f9fc; /* Light grey-blue background */
            color: #adb5bd; /* Dark grey for text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Ensure the body takes up the full height of the viewport */
            background-size: cover; /* Make the background cover the entire body */
            background-position: center; /* Center the background image or color */
        }

        .container {
            background-color: #adb5bd; /* drak background for the main content area */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 30px auto;
        }

        .scrollable-container {
            max-height: 600px; /* Adjust height as needed */
            overflow-y: auto; /* Adds vertical scroll bar if content overflows */
        }

        h2 {
            color: #343a40; /* Dark grey for headings */
            font-weight: bold;
            border-bottom: 2px solid #007bff; /* Blue border for headings */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            color: #495057;
            border-bottom: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa; /* Slightly off-grey for striped rows */
        }

        .table-hover tbody tr:hover {
            background-color: #e2e6ea; /* Light grey for row hover */
        }

        .alert {
            border-radius: 8px;
            color: #ffffff;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert.alert-success {
            background-color: #20c997; /* Green for success messages */
            border: 1px solid #c3e6cb;
        }

        .alert.alert-danger {
            background-color: #dc3545; /* Red for error messages */
            border: 1px solid #c82333;
        }

        .btn {
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            text-decoration: none;
            color: #ffffff;
            display: inline-block;
            margin: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .payment-info {
            background-color: #f8f9fa;
            color: #495057;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #343a40; /* grey for table headers */
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <?php if ($this->session->flashdata('success_msg')) : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success_msg'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_msg')) : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_msg'); ?>
            </div>
        <?php endif; ?>

        <div class="scrollable-container">
            <h2 class="text-center"><i class="fas fa-receipt"></i> Pesanan Terbaru</h2>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Menu Hidangan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Kontak Kami</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orders)) : ?>
                            <?php foreach ($orders as $order) : ?>
                                <?php $status = $order['status']; ?>
                                <?php if ($status == "" || $status == "NULL" || $status == "in process" || $status == "rejected") : ?>
                                    <tr>
                                        <td><?php echo $order['d_name']; ?></td>
                                        <td><?php echo $order['quantity']; ?></td>
                                        <td><?php echo 'Rp.' . $order['price']; ?>.000</td>
                                        <?php if ($status == "" || $status == "NULL") : ?>
                                            <td><button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-clock"></i> Dalam Antrian</button></td>
                                        <?php elseif ($status == "in process") : ?>
                                            <td><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Dalam perjalanan!</button></td>
                                        <?php elseif ($status == "rejected") : ?>
                                            <td><button type="button" class="btn btn-danger"><i class="fas fa-ban"></i> Dibatalkan</button></td>
                                        <?php endif; ?>
                                        <td><?php echo $order['date']; ?>.WIT</td>
                                        <td>
                                            <a href="https://wa.me/6282127084733?text=Hallo%20min,%20saya%20ingin%20menanyakan%20tentang%20pesanan%20saya%20dengan%20detail:%0A%0AMenu:%20<?php echo urlencode($order['d_name']); ?>%0AJumlah:%20<?php echo urlencode($order['quantity']); ?>%0AHarga:%20Rp.<?php echo urlencode($order['price']); ?>.000%0AStatus:%20<?php echo urlencode($status == "" || $status == "NULL" ? 'Dalam Antrian' : ($status == "in process" ? 'Dalam perjalanan' : 'Dibatalkan')); ?>%0ATanggal%20Pemesanan:%20<?php echo urlencode($order['date']); ?>. WIT " 
                                            target="_blank" class="btn btn-success">
                                            <i class="fas fa-comments"></i> Chat Kami
                                            </a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="deleteOrder(<?php echo $order['o_id']; ?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Batal</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Catatan tidak ditemukan!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <h2 class="text-center"><i class="fas fa-archive"></i> Semua Pesanan</h2>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Menu Hidangan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orders)) : ?>
                            <?php foreach ($orders as $order) : ?>
                                <?php $status = $order['status']; ?>
                                <?php if ($status == "closed") : ?>
                                    <tr>
                                        <?php $cDate = strtotime($order['date']); ?>
                                        <td><?php echo date('d-M-Y', $cDate); ?>.WIT</td>
                                        <td><?php echo $order['d_name']; ?></td>
                                        <td><?php echo $order['quantity']; ?></td>
                                        <td><?php echo 'Rp.' . $order['price']; ?>.000</td>
                                        <td><button type="button" class="btn btn-success"><i class="fas fa-check"></i> Sudah diterima</button></td>
                                        <td><a href="<?php echo base_url() . 'orders/invoice/' . $order['o_id']; ?>" class="btn btn-info"><i class="fas fa-file-invoice"></i> Invoice</a></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Catatan tidak ditemukan!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deleteOrder(id) {
            if (confirm("Apakah Anda yakin ingin membatalkan pesanan ini?")) {
                window.location.href = '<?php echo base_url() . 'orders/deleteOrder/'; ?>' + id;
            }
        }
    </script>
</body>

</html>
