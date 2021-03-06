<?php 
$feature = file_get_contents('data/packages.json');
$packages = json_decode($feature);
$data = $packages->data;

function _thousand_($data) {
  $thousand = "";
  $jml = strlen($data);
  while($jml > 3) {
    $thousand = "." . substr($data,-3) . $thousand;
    $l = strlen($data) - 3;
    $data = substr($data,0,$l);
    $jml = strlen($data);
  }
  $thousand = $data.$thousand;
  return $thousand;
}

function _rupiah_($data, $custom=false) {
  $rupiah = "";
  $jml = strlen($data);
  while($jml > 3) {
    $rupiah = "." . substr($data,-3) . $rupiah;
    $l = strlen($data) - 3;
    $data = substr($data,0,$l);
    $jml = strlen($data);
  }

  $rupiah = $custom ? "Rp <span class='price--strong'>".$data."</span>".$rupiah : "Rp " . $data . $rupiah;
  return $rupiah;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/styles/niagatest.css">
    <link rel="icon" type="image/png" href="assets/image/favicon.png" />

    <title>Niaga hoster</title>
  </head>
  <body>
    <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light nt-nav">
        <div class="container">
        <a class="navbar-brand" href="#">
          <img class="nt-nav__logo" src="assets/image/logo.jpg" src="Niagahoster" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="nt-nav__list navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Hosting <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Domain</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Server</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Website</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Afiliasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Promo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pembayaran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Review</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>
          </ul>
        </div>
        </div>
      </nav>
    </header>
    <div class="main-content">
      <section class="php-hosting">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1 class="php-hosting__title">PHP Hosting</h1>
              <h2 class="php-hosting__subtitle mb-4">Cepat, handal, penuh dengan modul PHP yang Anda butuhkan</h2>
              <ul class="php-hosting__list">
                <li class="php-hosting__list-item">Solusi PHP untuk performa query yang lebih cepat</li>
                <li class="php-hosting__list-item">Konsumsi memori yang lebih cepat</li>
                <li class="php-hosting__list-item">Support PHP 5.3, PHP 5.4, PHP 5.5, PHP 5.6, PHP 7</li>
                <li class="php-hosting__list-item">Fitur enkripsi IonCube dan Zend Guard Loaders</li>
              </ul>
            </div>
            <div class="col-md-6">
              <img class="img-fluid" src="assets/image/illustration banner PHP hosting-01.svg" alt="Illustration" />
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img class="img-fluid" src="assets/image/icon PHP Hosting_zendguard.svg" alt="PHP Hosting Zenguard" />
            </div>
          </div>
        </div>
      </section>
      <section class="hosting-package my-5 py-3">
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="hosting-package__title text-center">Paket Hosting Singapura yang Tepat</h2>
            <h3 class="hosting-package__subtitle text-center mb-3">Diskon 40% + Domain dan SSL Gratis untuk Anda</h3>
          </div>
          <?php foreach($data as $row => $val): ?>
          <div class="col-md-3 px-md-0 mb-3">
            <div class="hosting-package__card card text-center">
              <div class="card-header px-0 pt-2 pb-0 bg-white">
                <h5 class="hosting-package__title mb-0"><?php echo $val->name; ?></h5>
                <hr />
                <div class="hosting-package__price">
                  <p class="price--strike m-0"><?php echo _rupiah_($val->priceOld); ?></p>
                  <p class="price"><?php echo _rupiah_($val->price, true); ?></p>
                </div>
                <hr class="m-0" />
                <div class="hosting-package__users py-2">
                  <p class="m-0"><strong><?php echo _thousand_($val->registeredUsers); ?></strong> Pengguna Terdaftar</p>
                </div>
              </div>
              <div class="card-body">
                <div class="hosting-package__feature mt-3">
                  <?php echo $val->features; ?>
                </div>

                <button class="hosting-package__btn btn btn--pill btn-outline-dark">Pilih Sekarang</button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        </div>
      </section>
      <section class="php-limit my-5 py-3">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <h2 class="php-limit__title text-center mb-4">Powerful dengan Limit PHP yang Lebih Besar</h2>
            </div>
            <div class="col-md-6 col-lg-5 mb-5">
              <ul class="php-limit__list list-group">
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">max execution time 300s</span>
                </li>
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">max execution time 300s</span>
                </li>
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">php memory limit 1024 MB</span>
                </li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-5 mb-5">
              <ul class="php-limit__list list-group">
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">post max size 128 MB</span>
                </li>
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">upload max filesize 128 MB</span>
                </li>
                <li class="php-limit__list-item list-group-item">
                  <span class="m-auto">max input vars 2500</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="hosting-features my-5 py-3">
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="hosting-features__title text-center mb-4">Semua Paket Hosting Sudah Termasuk</h2>
          </div>
          <div class="col-md-4 mb-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_PHP Semua Versi.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">PHP Semua Versi</h5>
                <p class="hosting-features__card-text">Pilih mulai dari versi PHP 5.3 s/d PHP 7. <br /> Pilih sesuka Anda !</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_My SQL.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">MySQL Versi 5.6</h5>
                <p class="hosting-features__card-text">Nikmati MySQL versi terbaru, tercepat dan kaya akan fitur.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_CPanel.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">Paket Hosting cPanel</h5>
                <p class="hosting-features__card-text">Kelola website dengan panel canggih yang familiar di hati Anda.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_garansi uptime.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">Garansi Uptime 99.9%</h5>
                <p class="hosting-features__card-text">Data center yang mendukung kelangsungan website Anda 24/7.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_InnoDB.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">Database InnoDB Unlimited</h5>
                <p class="hosting-features__card-text">Jumlah dan ukuran database yang tumbuh sesuai dengan kebutuhan Anda.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 text-center">
              <img class="hosting-features__card-img m-auto" src="assets/image/icon PHP Hosting_My SQL remote.svg" alt="PHP Semua Versi" />
              <div class="card-body">
                <h5 class="hosting-features__card-title">Wilcard Remote MySQL</h5>
                <p class="hosting-features__card-text">Mendukung s/d 25 max_user_connections dan 100 max_connections.</p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
      <section class="support-laravel my-5 py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="support-laravel__title text-center mb-4">Mendukung Penuh Framework Laravel</h2>
            </div>
            <div class="col-md-6">
              <p class="support-laravel__text">
                Tak perlu menggunakan dedicated server ataupun VPS
                yang mahal. Layanan PHP hosting murah kami
                mendukung penuh framework favorit Anda
              </p>
              <ul class="support-laravel__list">
                <li class="support-laravel__list-item">Install laravel <b>1 klik</b> dengan Softaculous Installer</li>
                <li class="support-laravel__list-item">Mendukung ekstensi <b>PHP MCrypt, phar, mbstring, json</b> dan <b>fileinfo.</b></li>
                <li class="support-laravel__list-item">Tersedia <b>Composer</b> dan <b>SSH</b> untuk menginstall packages pilihan Anda.</li>
              </ul>
              <small>Nb. Composer dan SSH hanya tersedia pada paket Personal dan Bisnis</small>
              <button class="btn btn--pill btn-lg btn-primary mt-3">Pilih Hosting Anda</button>
            </div>
            <div class="col-md-6">
              <img class="img-fluid" src="assets/image/illustration banner support laravel hosting.svg" alt="Mendukung Penuh Framework Laravel" />
            </div>
          </div>
        </div>
      </section>
      <section class="complete-module my-5 py-3">
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="complete-module__title text-center mb-5">Modul Lengkap untuk Menjalankan Aplikasi PHP Anda</h2>
          </div>
          <div class="col-6 col-md-3">
            <ul class="complete-module__list">
              <li>IcePHP</li>
              <li>apc</li>
              <li>apcu</li>
              <li>apm</li>
              <li>ares</li>
              <li>bcmath</li>
              <li>bcompiler</li>
              <li>big_int</li>
              <li>bitset</li>
              <li>bloomy</li>
              <li>bz2_filter</li>
              <li>clamav</li>
              <li>coin_acceptor</li>
              <li>crack</li>
              <li>dba</li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <ul class="complete-module__list">
              <li>http</li>
              <li>huffman</li>
              <li>idn</li>
              <li>igbinary</li>
              <li>imagick</li>
              <li>imap</li>
              <li>included</li>
              <li>inotify</li>
              <li>interbase</li>
              <li>intl</li>
              <li>ioncube_loader</li>
              <li>ioncube_loader_4</li>
              <li>jsmin</li>
              <li>json</li>
              <li>ldap</li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <ul class="complete-module__list">
              <li>nd_pdo_mysql</li>
              <li>oauth</li>
              <li>oci8</li>
              <li>odbc</li>
              <li>opcache</li>
              <li>pdf</li>
              <li>pdo</li>
              <li>pdo_dblib</li>
              <li>pdo_firebird</li>
              <li>pdo_mysql</li>
              <li>pdo_odbc</li>
              <li>pdo_pgsql</li>
              <li>pdo_sqlite</li>
              <li>pgsql</li>
              <li>phalcon</li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <ul class="complete-module__list">
              <li>stats</li>
              <li>stem</li>
              <li>stomp</li>
              <li>suhosin</li>
              <li>syabse_ct</li>
              <li>sysvmsg</li>
              <li>sysvsem</li>
              <li>sysvshm</li>
              <li>tidy</li>
              <li>timezonedb</li>
              <li>trader</li>
              <li>translit</li>
              <li>uploadprogress</li>
              <li>uri_template</li>
              <li>uuid</li>
            </ul>
          </div>

          <a href="#" class="btn btn--pill btn-lg btn-outline-dark mx-auto mt-3">Selengkapnya</a>
        </div>
        </div>
      </section>
      <section class="stable-hosting mt-5 pt-3">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="stable-hosting__title mb-4">Linux Hosting yang Stabil dengan Teknologi LVE</h2>
              <p class="stable-hosting__text">
                SuperMicro <strong>Intel Xeon 24-Cores</strong> server dengan RAM <strong>128 GB</strong> dan
                teknologi <strong>Live CloudLinux</strong> untuk stabilitas server Anda. Dilengkapi
                dengan <strong>SSD</strong> untuk kecepatan <strong>MySQL</strong> dan caching. Apache load balancer
                berbasis LiteSpeed Technologies <strong>CageFS</strong> security.<strong>Raid-10</strong> protection
                dan auto backup untuk keamanan website PHP Anda.
              </p>
              <button class="btn btn--pill btn-lg btn-primary mt-4">Pilih Hosting Anda</button>
            </div>
            <div class="col-md-6">
              <img class="img-fluid mt-5" src="assets/image/Image support.png" alt="Linux Hosting yang Stabil dengan Teknologi LIVE" />
            </div>
          </div>
        </div>
      </section>
      <section class="share py-4">
        <div class="container">
          <div class="row">
            <div class="col-md-6 d-flex">
              <p class="my-auto mb-3">Bagikan jika Anda menyukai halaman ini</p>
            </div>
            <div class="col-md-6 d-flex">
              <div class="share__social-media d-flex">
                <i class="share__social-media-icon fab fa-facebook-square"></i>
                <div class="share__social-media-arrow"></div>
                <div class="share__social-media-body">
                  80k
                </div>
              </div>
              <div class="share__social-media d-flex ml-3">
                <i class="share__social-media-icon fab fa-twitter-square"></i>
                <div class="share__social-media-arrow"></div>
                <div class="share__social-media-body">
                  450
                </div>
              </div>
              <div class="share__social-media d-flex ml-3">
                <i class="share__social-media-icon fab fa-google-plus-square"></i>
                <div class="share__social-media-arrow"></div>
                <div class="share__social-media-body">
                  1900
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="need-help bg-info text-white py-5">
        <div class="container">
          <div class="row">
            <h3 class="need-help__title my-auto text-center text-md-left">Perlu <strong class="ft--strong">BANTUAN ?</strong> Hubungi Kami: <strong class="ft--strong">0274-5305505</strong></h3>
            <div class="need-help__separate d-none d-md-block"></div>
            <button class="btn btn--pill btn-lg btn-outline-light mx-auto my-3 px-4"><i class="far fa-lg fa-comment-alt mr-3 ml-2"></i> Live Chat</button>
          </div>
        </div>
      </section>
    </div>
    <footer class="nt-footer">
      <div class="container">
        <div class="row">
          <div class="col-6 col-md-3">
            <h3 class="nt-footer__title">HUBUNGI KAMI</h3>
            <p class="nt-footer__contact">
              <a href="tel:+62742885822">0274-2885822</a>
              <br />
              Senin - Minggu
              <br />
              24 Jam Non Stop
            </p>
            <p class="nt-footer__address">
              Jl. Selokan Mataram Monjali <br>
              Karangjati MT I/304 <br>
              Sinduadi, Mlati, Sleman <br>
              Yogyakarta 55284
            </p>
          </div>
          <div class="col-6 col-md-3">
            <h3 class="nt-footer__title">LAYANAN</h3>
            <ul class="nt-footer__menu-list">
              <li><a class="nt-footer__menu" href="javascript:0;">Domain</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Cloud VPS Hosting</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Shared Hosting</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Managed VPS Hosting</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Web Builder</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Kemananan SSL/HTTPS</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Jasa Pembuatan Website</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Program Afiliasi</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h3 class="nt-footer__title">SERVICE HOSTING</h3>
            <ul class="nt-footer__menu-list">
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting Murah</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting Indonesia</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting Singapura SG</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting PHP</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting Wordpress</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Hosting Laravel</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h6 class="nt-footer__title">TUTORIAL</h6>
            <ul class="nt-footer__menu-list">
              <li><a class="nt-footer__menu" href="javascript:0;">Knowledgebase</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Blog</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Cara Pembayaran</a></li>
            </ul>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-6 col-md-3">
            <h3 class="nt-footer__title">TENTANG KAMI</h3>
            <ul class="nt-footer__menu-list">
              <li><a class="nt-footer__menu" href="javascript:0;">Tim Niagahoster</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Karir</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Events</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Penawaran & Promo Spesial</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Kontak Kami</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h6 class="nt-footer__title">KENAPA PILIH NIAGAHOSTER</h6>
            <ul class="nt-footer__menu-list">
              <li><a class="nt-footer__menu" href="javascript:0;">Support Terbaik</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Garansi Harga Termurah</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Domain Gratis Selamanya</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Datacenter Hosting Terbaik</a></li>
              <li><a class="nt-footer__menu" href="javascript:0;">Review Pelanggan</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="nt-footer__title">NEWSLETTER</h3>
            <div class="input-group--custom input-group input-group-lg">
              <input type="text" class="form-control form-control--custom" placeholder="Email">
              <div class="input-group-append border-0">
                <button class="btn btn-sm btn-primary btn--custom-input">Berlangganan</button>
              </div>
            </div>
            <p class="mt-3 nt-footer__get-promo">
              Dapatkan promo dan konten menarik dari penyedia hosting terbaik anda.
            </p>
          </div>
          <div class="col-6 col-md-3 d-flex mt-4 pt-2">
            <div class="nt-footer__social-media nt-footer__fb mr-3">
              <i class="fab fa-facebook-f"></i>
            </div>
            <div class="nt-footer__social-media nt-footer__twitter mr-3">
              <i class="fab fa-twitter"></i>
            </div>
            <div class="nt-footer__social-media nt-footer__google mr-3">
              <i class="fab fa-google-plus-g"></i>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12">
            <h3 class="nt-footer__title">PEMBAYARAN</h3>
            <div class="d-inline-block">
              <img class="nt-footer__payment mb-3" src="assets/image/banks/bca.svg" alt="Pembayaran bca" />
              <img class="nt-footer__payment mb-3 ml-2" src="assets/image/banks/mandiri.svg" alt="Pembayaran mandiri" />
              <img class="nt-footer__payment mb-3 ml-2" src="assets/image/banks/bni.svg" alt="Pembayaran bni" />
              <img class="nt-footer__payment mb-3 ml-2" src="assets/image/banks/visa.svg" alt="Pembayaran visa" />
              <img class="nt-footer__payment mb-3 ml-2" src="assets/image/banks/master.svg" alt="Pembayaran mastercard" />
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <p>
              <small>
                Copyright 2016 Niagahoster | Hosting powered by PHP 7, CloudLinux, CloudFlare, BitNinja and Biznet Technovillage Jakarta <br />
                Cloud VPS Murah powered by Webuzo Softaculous, Intel SSD and cloud computing technology
              </small>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/niagatest.js"></script>
  </body>
</html>