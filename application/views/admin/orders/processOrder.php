<div style="background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>'); width:100%; height:100%; background-size:cover; background-position:center; background-repeat: no-repeat;">
    <div class="container" style="background-color:#adb5bd; border-radius: 10px; padding: 20px;">
        <div class="container table-responsive m-t-20">
            <h2 class="py-3 text-center" style="color: #343a40;"><i class="fas fa-eye" style="color: #adb5bd;"></i> Melihat Orderan User</h2>
            <table id="myTable" class="table table-bordered table-hover table-striped dataTable">
                <tbody>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-user" style="color: #ffc107;"></i> DiPesan Oleh:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo $order['username'] ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-hamburger" style="color: #ffc107;"></i> Item Makanan:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo $order['d_name'] ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-sort-numeric-up" style="color: #ffc107;"></i> Jumlah:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo $order['quantity'] ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-money-bill-wave" style="color: #ffc107;"></i> Harga:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo "Rp" . $order['price'] ?>.000</td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-map-marker-alt" style="color: #ffc107;"></i> Alamat:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo $order['address'] ?></td>
                    </tr>
                    <tr>
                        <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-clock" style="color: #ffc107;"></i> Waktu Orderan:</strong></td>
                        <td style="background-color: #ffffff; color: #343a40;"><?php echo $order['date'] ?></td>
                    </tr>
                    <form method="post" action="<?php echo base_url() . 'admin/orders/updateOrder/' . $order['o_id']; ?>">
                        <tr>
                            <td style="background-color: #343a40; color: #ffc107;"><strong><i class="fas fa-tasks" style="color: #ffc107;"></i> Pilih Status Orderan:</strong></td>
                            <td>
                                <select class="form-control" name="status" class="<?php echo (form_error('status') != "") ? 'is-invalid' : ''; ?>" style="background-color: #ffffff; color: #343a40;">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="in process" style="color: #343a40;">Dalam Perjalanan</option>
                                    <option value="closed" style="color: #343a40;">Ditutup/DiSampaikan</option>
                                    <option value="rejected" style="color: #343a40;">DiTolak</option>
                                </select>
                                <?php echo form_error('status'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-primary btn-block" type="submit" style="background-color: #ffc107; color: #343a40;"><i class="fas fa-paper-plane"></i> Kirim</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
