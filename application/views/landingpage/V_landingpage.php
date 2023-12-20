<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Remenkopi</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>lpasset/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>lpasset/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url() ?>lpasset/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url() ?>assets/img_remen/remenkopi.svg" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>lpasset/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html"><img src="<?= base_url() ?>assets/img_remen/remenkopi.svg"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <ul>
                                <li><a href="<?= base_url('auth') ?>"><span class="user_icon"><i class="fa fa-user" aria-hidden="true"></i></span>Login</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div id="banner_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="banner_img"><img src="<?= base_url() ?>lpasset/images/banner-img.png"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">kopi ?</h1>
                                        <h5 class="tasty_text">RemenKopi</h5>

                                        <div class="btn_main">
                                            <div class="about_bt"><a href="https://remen-kopi-gresik.business.site/#gallery">About Us</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- coffee section start -->
    <div class="coffee_section layout_padding">
        <div class="container">
            <div class="row">
                <h1 class="coffee_taital">OUR Coffee OFFER</h1>
                <div class="bulit_icon"><img src="<?= base_url() ?>lpasset/images/bulit-icon.png"></div>
            </div>
        </div>
        <div class="coffee_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <?php foreach ($data_produk_s as $dp) : ?>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="coffee_img"><img src="<?= base_url() ?>data/produk/<?= $dp->gambar ?>" style="height:20rem"></div>
                                        <h3 class="types_text"><?= $dp->nama_produk ?></h3>
                                        <p class="looking_text"><?= $dp->harga ?></p>
                                    </div>

                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container-fluid">
                            <div class="row">
                                <?php foreach ($data_produk_d as $dp) : ?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="coffee_img"><img src="<?= base_url() ?>data/produk/<?= $dp->gambar ?>" style="height:20rem"></div>
                                        <h3 class="types_text"><?= $dp->nama_produk ?></h3>
                                        <p class="looking_text"><?= $dp->harga ?></p>

                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- coffee section end -->
    <!-- about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">About Our shop</h1>
                    <div class="bulit_icon"><img src="<?= base_url() ?>lpasset/images/bulit-icon.png"></div>
                </div>
            </div>
            <div class="about_section_2 layout_padding">
                <div class="image_iman"><img src="<?= base_url() ?>lpasset/images/about-img.png" class="about_img"></div>
                <div class="about_taital_box">
                    <h1 class="about_taital_1">Our Remen</h1>
                    <p class=" about_text">Remenkopi lahir dari semangat untuk menyajikan pengalaman kopi yang unik di tengah kota Gresik. Pendirinya, seorang pecinta kopi sejati, ingin memberikan tempat di mana komunitas dapat berkumpul, berbagi cerita, dan tentu saja, menikmati secangkir kopi yang istimewa.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- about section end -->
    <!-- client section start -->
    <div class="client_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Who ?</h1>
                    <div class="bulit_icon"></div>
                </div>
            </div>
            <div class="client_section_2" style="display: flex;">
                <div>
                    <div class="client_taital_main">
                        <div class="client_left">
                            <div class="client_img"></div>
                        </div>
                        <div class="client_right">
                            <h3 class="moark_text">Joy Moark</h3>
                            <p class="client_text">"Jika kamu mencari dia, mungkin dia sedang duduk manis di pojok RemenKopi, menunggu seseorang yang bisa membuatnya semakin bermakna seperti secangkir kopi yang nikmat"</p>
                        </div>
                    </div>
                    <div class="client_taital_main">
                        <div class="client_left">
                            <div class="client_img"></div>
                        </div>
                        <div class="client_right">
                            <h3 class="moark_text">Nettown</h3>
                            <p class="client_text">"Jika lewat gravitasi apel itu jatuh, maka RemenKopi membuat pagi-pagi semakin menarik ke bawah wadah sebuah cangkir." </p>
                        </div>
                    </div>
                    <div class="client_taital_main">
                        <div class="client_left">
                            <div class="client_img"></div>
                        </div>
                        <div class="client_right">
                            <h3 class="moark_text">Eoon Mask</h3>
                            <p class="client_text">Jika Tesla membuat kopi, saya yakin itu akan menjadi sesuatu seperti RemenKopi - memberikan tenaga ekstra seperti roket Falcon 9, namun tanpa suara yang menggelegar.</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- client section end -->
    <!-- blog section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Our Blog</h1>
                    <div class="bulit_icon"><img src="<?= base_url() ?>lpasset/images/bulit-icon.png"></div>
                </div>
            </div>
            <div class="blog_section_2">
                <div class="row">
                    <?php foreach ($data_event as $de) : ?>
                        <div class="col-md-6">
                            <div class="blog_box">
                                <div class="blog_img"><img src="<?= base_url() ?>data/event/<?= $de->gambar ?>" style="max-height: 100rem;"></div>
                                <?php $tanggalObj = new DateTime($de->tanggal);
                                $tanggalFormat = $tanggalObj->format('d-m-Y') ?>
                                <h4 class="date_text"><?= $tanggalFormat ?></h4>
                                <h4 class="prep_text"><?= $de->nama_event ?></h4>
                                <p class="lorem_text"><?= $de->deskripsi ?></p>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- blog section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Get In Touch</h1>
                    <div class="bulit_icon"><img src="<?= base_url() ?>lpasset/images/bulit-icon.png"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail_section_1">
                            <form action="<?= base_url('landingpage/kirimkrisar') ?>" method="post">
                                <input type="text" class="mail_text" placeholder="Your Name" name="your_name">
                                <input type="text" class="mail_text" placeholder="Your Email" name="your_email">
                                <input type="text" class="mail_text" placeholder="Your Phone" name="your_phone">
                                <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="your_massage"></textarea>
                                <div class="send_bt"><button style="background-color: #B2533E; padding:0.5rem 1.5rem; border-radius:2rem; color:white">SEND</button></div>

                            </form>
                        </div>
                    </div>
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Remenkopi+Gresik+Indonesia" width="250" height="500" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="address_text">Address</h1>
                    <p class="footer_text">Suci, Manyar, Gresik Regency, East Java 61151</p>
                    <div class="location_text">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">0851-0310-1085</span>

                                </a>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->

    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="<?= base_url() ?>lpasset/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>lpasset/js/popper.min.js"></script>
    <script src="<?= base_url() ?>lpasset/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>lpasset/js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url() ?>lpasset/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url() ?>lpasset/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url() ?>lpasset/js/custom.js"></script>
</body>

</html>