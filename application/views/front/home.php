<div id="slides" class="carousel slide carousel-cus" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url() . 'public/front/img/bg1.jpg'; ?>" alt="bg1">
            <div class="carousel-caption text-left">
                <h1 style="font-size: 60px;" class="display-2">Anda membutuhkan makanan minuman yang lezat dan terjangkau?!</h1>
                <h3>kami di sini untuk melayani Anda</h3>
                <a href="<?php echo base_url() . 'menu/index'; ?>" class="btn btn-primary btn-lg">Pesan Sekarang</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url() . 'public/front/img/bg2.jpg'; ?>" alt="bg2">
            <div class="carousel-caption text-right">
                <h1 style="font-size: 60px;" class="display-2">Anda membutuhkan makanan minuman yang lezat dan terjangkau?!</h1>
                <h3>kami di sini untuk melayani Anda</h3>
                <a href="<?php echo base_url() . 'menu/index'; ?>" class="btn btn-primary btn-lg">Pesan Sekarang</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url() . 'public/front/img/bg3.jpg'; ?>" alt="bg3">
            <div class="carousel-caption text-right">
                <h1 style="font-size: 60px;" class="display-2">Anda membutuhkan makanan minuman yang lezat dan terjangkau?!</h1>
                <h3>kami di sini untuk melayani Anda</h3>
                <a href="<?php echo base_url() . 'menu/index'; ?>" class="btn btn-primary btn-lg">Pesan Sekarang</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center welcome">
        <div class="col-12">
            <h1 class="display-4">3 Langkah Mudah Untuk Diikuti</h1>
        </div>
        <hr>
        <div class="col-12">
            <p class="lead">Cara termudah untuk makanan Anda. Sistem Pemesanan makanan & minuman menyediakan pengiriman segar
                dengan maximal dalam waktu 30 menit dan menyediakan makanan gratis jika pesanan tidak tepat waktu. Jadi jangan menunggu dan mulai memesan sekarang juga!</p>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-bullseye"></i>
            <h3>Pilih hidangan lezat</h3> 
            <p>Kami membantu Anda dengan menu makanan & minuman yang lezat dan terjangkau kualitas kentang paling terbaik</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fab fa-first-order fa-4x"></i>
            <h3>Order sepuasnya</h3>
            <p>Rasakan kemudahan dalam memesan dengan menu pilihan yang ada di bawah, dan nikmati pengalaman makanan yang memuaskan setiap saat.</p>
        </div>
        <div class="col-sm-12 col-md-4">
            <i class="fas fa-clipboard-check"></i>
            <h3>Penjemputan atau Pengiriman</h3>
            <p>Bagaimanapun, makanan akan dikirim atau Anda dapat mengambilnya sesuai pilihan Anda!</p>
        </div>
    </div>
    <hr class="my-4">
</div>

<div id="menu-section" class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Welcome Mami Mira Food</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid padding dish-card">
    <div class="row">
        <?php if (!empty($dishesh)) {
            // Batasi jumlah item yang ditampilkan
            $dishes_to_show = array_slice($dishesh, 0, 3); // Ambil 3 item pertama
            foreach ($dishes_to_show as $dish) { ?>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card mb-4 shadow-sm">
                        <?php $image = $dish['img']; ?>
                        <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/dishesh/thumb/' . $image; ?>" alt="Dish Image">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><?php echo $dish['name']; ?></h4>
                                <h4 class="text-muted"><b>Rp.<?php echo $dish['price']; ?>.000</b></h4>
                            </div>
                            <p class="card-text"><?php echo $dish['about']; ?></p>
                            <a href="<?php echo base_url() . 'Dish/addToCart/' . $dish['d_id']; ?>" class="btn btn-primary">
                                <i class="fas fa-cart-plus"></i> Tambahkan ke Keranjang
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="jumbotron">
                <h1>Tidak ada catatan yang ditemukan</h1>
            </div>
        <?php } ?>
    </div>
    <hr class="my-4">
</div>

<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-12">
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="sidebar">
                                <!-- widget -->
                                <section class="widget">
                                    <!-- sec-title -->
                                    <div class="sec-title">
                                        <h2 class="sec-title__title">Jam Buka</h2><span class="sec-title__divider"></span></br>
                                    </div><!-- End / sec-title -->

                                    <p class="mb-30">Makanan & Minuman selalu siap melayani Anda setiap hari dengan berbagai pilihan sajian makanan yang lezat. Kunjungi kami dan nikmati sensasi kelezatan makanan yang tak terlupakan!</p>
                                    
                                        <div class="widget-contact__item">
                                            <span class="widget-contact__title">Jam Buka</span>
                                            <p class="widget-contact__text">Senin - Minggu: 9:00 - 22:00 WIT</p>
                                        </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6  col-lg-pull-3">
                <div class="contact-gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5188093521324!2d128.1762470111528!3d-3.696261042995245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce8454347818b%3A0xd507f40415dcaa71!2sKampus%20STIKOM%20Ambon!5e0!3m2!1sen!2sid!4v1705970908169!5m2!1sen!2sid" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>
</div>
<hr class="my-10">
<section id="contact-us" class="container shadow my-8 p-8">
    <!--Section heading-->
    <?php if ($this->session->flashdata('msg') != "") : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    <?php endif ?>

    </div>

<script>
    const form = document.getElementById('myForm');
    const userName = document.getElementById('name');
    const email = document.getElementById('email');
    const subject = document.getElementById('subject');
    const message = document.getElementById('message');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validate();
    })

    const isEmail = (emailVal) => {
        var re =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(emailVal)) {
            return "fail";
        }
    }

    const sendData = (sRate, count) => {
        if (sRate === count) {
            event.currentTarget.submit();
        }
    }

    const successMsg = () => {
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
    }

    const validate = () => {
        const userNameVal = userName.value.trim();
        const emailVal = email.value.trim();
        const subjectVal = subject.value.trim();
        const messageVal = message.value.trim();

        //username validation
        if (userNameVal === "") {
            setErrorMsg(userName, 'name cannot be blank');
        } else if (!isNaN(userNameVal)) {
            setErrorMsg(userName, 'only characters are allowed');
        } else {
            setSuccessMsg(userName);
        }

        //email validation
        if (emailVal === "") {
            setErrorMsg(email, 'email cannot be blank');
        } else if (isEmail(emailVal) === "fail") {
            setErrorMsg(email, 'enter valid email only');
        } else {
            setSuccessMsg(email);
        }

        //subject can not
        if (subjectVal === "") {
            setErrorMsg(subject, 'subject cannot be blank');
        } else {
            setSuccessMsg(subject);
        }

        //message validation
        if (messageVal === "") {
            setErrorMsg(message, 'message cannot be blank');
        } else {
            setSuccessMsg(message);
        }

        successMsg();
    }

    function setErrorMsg(ele, msg) {

        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        const span = formCon.querySelector('span');
        span.innerText = msg;
        formInput.className = "form-control is-invalid";
        span.className = "invalid-feedback font-weight-bold"
    }

    function setSuccessMsg(ele) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        formInput.className = "form-control success";
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah terdapat identifier #continueOrder di URL
        if (window.location.hash === '#continueOrder') {
            // Pindahkan fokus ke elemen dengan ID 'menu-section'
            var menuSection = document.getElementById('menu-section');
            if (menuSection) {
                menuSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });
</script>