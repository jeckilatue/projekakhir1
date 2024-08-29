<div style="background-image: url('<?php echo base_url('public/front/img/bg3.jpg'); ?>'); width:100%; height:580px; background-size:cover; background-position:center; background-repeat:no-repeat; display:flex; align-items:center; justify-content:center;">
    <form action="<?php echo base_url() . 'admin/menu/create_menu'; ?>" method="POST" id="myForm" name="myForm" enctype="multipart/form-data" class="form-container">
        <h3 class="form-title">Tambahkan Item Makanan</h3>
        <div class="form-group">
            <label class="form-label" for="resname">Pilih Restoran</label>
            <select name="rname" id="resname" class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : ''; ?>">
                <?php if (!empty($stores)) { foreach ($stores as $store) { ?>
                    <option value="<?php echo $store['r_id']; ?>">
                        <?php echo set_select('resname'); ?>
                        <?php echo $store['name']; ?>
                    </option>
                <?php } } ?>
            </select>
            <?php echo form_error('rname'); ?>
            <span></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label">Menu Hidangan</label>
                    <input type="text" class="form-control my-2 <?php echo (form_error('name') != "") ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Masukkan Nama Hidangan" value="<?php echo set_value('name'); ?>">
                    <?php echo form_error('name'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control my-2 <?php echo (form_error('price') != "") ? 'is-invalid' : ''; ?>" id="price" name="price" placeholder="Masukkan Harga" value="<?php echo set_value('price'); ?>">
                    <?php echo form_error('price'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="about" class="form-label">Tentang</label>
                    <input type="text" class="form-control my-2 <?php echo (form_error('about') != "") ? 'is-invalid' : ''; ?>" id="about" name="about" placeholder="Tentang Hidangan" value="<?php echo set_value('about'); ?>">
                    <?php echo form_error('about'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-control my-2 <?php echo (form_error('kategori') != "") ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" style="height:45px">
                        <option value="makanan" <?php echo set_select('kategori', 'makanan'); ?>>Makanan</option>
                        <option value="minuman" <?php echo set_select('kategori', 'minuman'); ?>>Minuman</option>
                        <option value="snack" <?php echo set_select('kategori', 'snack'); ?>>Snack</option>
                    </select>
                    <?php echo form_error('kategori'); ?>
                    <span></span>
                </div>
            </div>
            
        </div>
        <div class="form-group">
                    <label for="img" class="form-label">Gambar Makanan</label>
                    <input type="file" id="image" name="image" class="form-control my-2 <?php echo (!empty($errorImageUpload))  ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
                    <span></span>
        </div>
        <div class="button-group">
            <button type="submit" class="btn-submit">Kirim</button>
            <a href="<?php echo base_url() . 'admin/menu/index' ?>" class="btn-back">Kembali</a>
        </div>
    </form>
</div>

<style>
    .form-container {
        width: 70%;
        background-color: #adb5bd;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .form-title {
        margin-bottom: 30px;
        text-align: center;
        color: #777;
        font-weight: bold;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-control.is-invalid {
        border-color: #e3342f;
        background-color: #f8d7da;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-submit, .btn-back {
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s;
    }

    .btn-submit {
        background-color: #D4AF37;
        color: #fff;
        border: none;
    }

    .btn-submit:hover {
        background-color: #b8952d;
    }

    .btn-back {
        background-color: #555;
        color: #fff;
    }

    .btn-back:hover {
        background-color: #333;
    }

    @media (max-width: 768px) {
        .form-container {
            width: 90%;
        }
    }
</style>
