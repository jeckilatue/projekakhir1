<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid" style="
    background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100%;
">
    <div class="container bg-dark text-light rounded p-4 shadow-lg">
        <!-- Alert messages -->
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

        <!-- Page Title and Search Input -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold text-light">Semua Orderan</h2>
            <input class="form-control w-50" id="myInput" type="text" placeholder="Cari ..">
        </div>

        <!-- Orders Table -->
        <div class="table-responsive">
            <table class="table table-hover table-striped text-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Waktu Order</th>
                        <th>Chat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if (!empty($orders)) { ?>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['o_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($order['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($order['d_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($order['quantity'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo "Rp" . htmlspecialchars($order['price'], ENT_QUOTES, 'UTF-8'); ?>.000</td>
                                <td><?php echo htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8'); ?></td>

                                <?php
                                $status = htmlspecialchars($order['status'], ENT_QUOTES, 'UTF-8');
                                if (empty($status) || $status == "NULL") { ?>
                                    <td><button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-bars"></i> Dalam Antrian</button></td>
                                <?php } elseif ($status == "in process") { ?>
                                    <td><button type="button" class="btn btn-warning btn-sm"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Dalam perjalanan!</button></td>
                                <?php } elseif ($status == "closed") { ?>
                                    <td><button type="button" class="btn btn-success btn-sm"><span class="fa fa-check-circle" aria-hidden="true"></span> Disampaikan</button></td>
                                <?php } elseif ($status == "rejected") { ?>
                                    <td><button type="button" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> DiTolak</button></td>
                                <?php } ?>
                                <td><?php echo htmlspecialchars($order['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <a href="https://wa.me/?phone=62<?php echo urlencode(substr($order['phone'], 1)); ?>&text=Halo%20<?php echo urlencode($order['username']); ?>,%20kami%20dari%20Mami%20Vira%20Foods%20akan%20melakukan%20proses%20pesanan%20makanan%20COD%20dengan%20pesanan:%0A%0AMenu:%20<?php echo urlencode($order['d_name']); ?>%0AJumlah:%20<?php echo urlencode($order['quantity']); ?>%0AHarga:%20Rp.<?php echo urlencode($order['price']); ?>.000%0AAlamat:%20<?php echo urlencode($order['address']); ?>%0AStatus:%20<?php echo urlencode($status == "" || $status == "NULL" ? 'Dalam Antrian' : ($status == "in process" ? 'Dalam perjalanan' : ($status == "closed" ? 'Telah di Sampaikan' : ($status == "rejected" ? 'Dibatalkan' : 'Status Tidak Dikenal')))); ?>%0ATanggal%20Pemesanan:%20<?php echo urlencode($order['date']); ?>.WIT %0A%0A<?php echo ($status == "" || $status == "NULL" || $status == "in process") ? 'Mohon%20kesediaannya%20untuk%20memastikan%20apakah%20pesananan%20anda%20sesuai%20di%20atas%20untuk%20memesan%20makanan%20COD?' : ''; ?>%0A%0ASalam%20hangat%20dari%20kami%20%0A%0ATerima%20kasih" 
                                    target="_blank" class="btn btn-success btn-sm">
                                    <i class="fas fa-comments"></i> Chat
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/orders/processOrder/' . htmlspecialchars($order['o_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-info btn-sm mb-1"> <i class="fas fa-arrow-alt-circle-right"></i> Proses</a>
                                    <a href="<?php echo base_url() . 'admin/orders/deleteOrder/' . htmlspecialchars($order['o_id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="10" class="text-center">Catatan Tidak Ditemukan</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between mt-4">
            <button id="prev" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-left"></i> Previous</button>
            <button id="next" class="btn btn-secondary btn-sm">Next <i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Filter Pencarian
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Pagination
        var rowsPerPage = 3;
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
