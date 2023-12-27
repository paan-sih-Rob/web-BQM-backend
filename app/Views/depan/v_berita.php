
 <header>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog<?= isset($judul) ? " | " . $judul : ''; ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('depan') ?>/css/styles.css" rel="stylesheet" />
    <style>
        .container img {
            max-width: 100%;
        }
    </style>
</header>
<body>
<div class="container">
  <header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Berita</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">Kegiatan</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
      </div>
    </div>
  </header>
  <div class="container">
<nav class="navbar navbar-expand navbar-light text-center" id="">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo site_url() ?>"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url() ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo set_post_link('32') ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo set_post_link('33') ?>">Sample Post</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo site_url('contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?php echo site_url(isset($thumbnail) ? LOKASI_UPLOAD . "/" . $thumbnail : "default_thumbnail.jpg") ?>')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
            <?php
            $type = 'article';
            ?>    
            <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                    if ($type == 'article') {
                    ?>
                        <div class="post-heading">
                            <?php
                            $judul = 'judul';
                            ?>
                            <h1><?php echo $judul ?></h1>
                            <?php
                                $deskripsi = 'deskripsi';
                            ?>
                            <?php if ($deskripsi) { ?>
                                <h2 class="subheading">
                                    <?php echo $deskripsi ?>
                                </h2>
                            <?php } ?>
                            <span class="meta">
                            <?php
                            $penulis = 'penulis';
                            ?>
                            <?php
                            $tanggal = 'tanggal';
                            ?>
                                Posted by
                                <a href="#!"><?php echo post_penulis($penulis) ?></a>
                                on <?php echo tanggal_indonesia($tanggal) ?>
                            </span>
                        </div>
                    <?php
                    } elseif ($type == 'page') {
                    ?>
                        <div class="site-heading">
                            <h1><?php echo $judul ?></h1>
                            <?php if ($deskripsi) { ?>
                                <span class="subheading"><?php echo $deskripsi ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

<?php if (is_array($record) || is_object($record)) : ?>
<?php
foreach ($record as $key => $value) {
?>
    <div class="post-preview">
        <a href="<?php echo set_post_link($value['post_id']) ?>">
            <h2 class="post-title">
                <?php echo $value['post_title'] ?>
            </h2>
            <?php if ($value['post_description']) { ?>
                <h3 class="post-subtitle">
                    <?php echo $value['post_description'] ?>
                </h3>
            <?php } ?>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#!"><?php echo post_penulis($value['username']) ?></a>
            on <?php echo tanggal_indonesia($value['post_time']) ?>
        </p>
    </div>
    <!-- Divider-->
    <hr class="my-4" />
<?php } ?>
<?php endif; ?>
<?php echo $pager->simpleLinks('ft', 'depan') ?>

<!-- Footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php
                helper('global_fungsi_helper');

                $konfigurasi_name = "set_socials_twitter";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $twitter = isset($dataSocial['konfigurasi_value']) ? $dataSocial['konfigurasi_value'] : '';

                $konfigurasi_name = "set_socials_facebook";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $facebook = isset($dataSocial['konfigurasi_value']) ? $dataSocial['konfigurasi_value'] : '';

                $konfigurasi_name = "set_socials_github";
                $dataSocial = konfigurasi_get($konfigurasi_name);
                $github = isset($dataSocial['konfigurasi_value']) ? $dataSocial['konfigurasi_value'] : '';
                ?>
                <ul class="list-inline text-center">
                    <?php if ($twitter) { ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $twitter ?>" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($facebook) { ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $facebook ?>" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($github) { ?>
                        <li class="list-inline-item">
                            <a href="<?php echo $github ?>" target="blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2021</div>
            </div>
        </div>
    </div>
</footer>
</div>
