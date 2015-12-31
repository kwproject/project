<!DOCTYPE html>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title><?php echo $title ?> | Wisata Indonesia - Jejalah Indonesia</title>

  <!-- CSS  -->
  <link href="<?php echo base_url();?>assets/css/family.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url();?>assets/css/style_user.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css" type="text/css" media="screen" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script type="text/javascript">

</script>
</head>
<body>

  <div id="loader-wrapper">
    <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>

  <div class="navbar-fixed">
    <nav class="teal darken-5" role="navigation">
      <div class="nav-wrapper container">
      <a href="<?php echo base_url(); ?>" class="brand-logo white-text"><strong>Wisata Indonesia</strong></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?php echo base_url('user/navPariwisata'); ?>" class="white-text active"><strong>Pariwisata</strong></a></li>
          <li><a href="<?php echo base_url('maps'); ?>" class="white-text"><strong>Peta</strong></a></li>
          <li><a href="<?php echo base_url('blog'); ?>" class="white-text"><strong>Berita</strong></a></li>

          <?php if($this->session->userdata('Login')=='berhasil' && $this->session->userdata('level')==0  && $this->session->userdata('active')==1){ ?>
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="<?php echo base_url('user/setting_user') ?>">Profil</a></li>
              <li><a href="<?php echo base_url('login/logout') ?>">Keluar</a></li>
            </ul>
            <li><a href="#" class="dropdown-button white-text" data-activates="dropdown1"><i class="material-icons left">person</i><strong><?php if(!empty($pengguna->nama)){echo $pengguna->nama;} ?></strong><i class="material-icons right">arrow_drop_down</i></a></li>

          <?php } elseif($this->session->userdata('level')==1) { ?>
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="<?php echo base_url('login/logout') ?>">Keluar</a></li>
                <li><a href="<?php echo base_url('home') ?>">Kembali ke Admin</a></li>
              </ul>
              <li><a href="#" class="dropdown-button white-text" data-activates="dropdown1"><i class="material-icons left">person</i><strong><?php if(!empty($pengguna->nama)){echo $pengguna->nama;} ?></strong><i class="material-icons right">arrow_drop_down</i></a></li>
              
          <?php } else { ?>
              <li><a href="<?php echo base_url('login'); ?>" class="white-text"><i class="material-icons left">person</i><strong>Masuk | Daftar</strong></a></li>
           <?php } ?>
          
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="<?php echo base_url('user/navPariwisata'); ?>" class="white-text active"><strong>Pariwisata</strong></a></li>
          <li><a href="<?php echo base_url('maps'); ?>" class="white-text"><strong>Peta</strong></a></li>
          <li><a href="<?php echo base_url('blog'); ?>" class="white-text"><strong>Berita</strong></a></li>
          <li><a href="<?php echo base_url('user/login'); ?>" class="white-text"><strong>Masuk | Daftar</strong></a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
   <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">search</i>
    </a>
    <ul>
    <nav>
      <div class="nav-wrapper">
        <form action="<?php echo base_url(); ?>search" method="get">
          <div class="input-field red">
            <input id="search" name ="q" type="search" required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
    </ul>
  </div>
  <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 100px; right: 24px;">
    <img src="http://www.e-zeeinternet.com/count.php?page=1132215&style=default&nbdigits=7" alt="HTML Hit Counter" border="0" >
  </div>
  
      <?php echo $contents;?>

      
    <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Wisata Indonesia</h5>
          <p class="white-text">
            &copy; 2015 Wisata Indonesia<br>
            <br><br>
            Temukan tempat wisata di Indonesia
          </p>
        </div>
      
        <div class="col l2 s12">
          <h5 class="white-text">Umum</h5>
          <ul>
            <li><a class="white-text" href="<?php echo base_url('user/navPariwisata') ?>">Pariwisata</a></li>
            <li><a class="white-text" href="<?php echo base_url('blog') ?>">Berita</a></li>
          </ul>
        </div>
        <div class="col l2 s12">
          <h5 class="white-text">Cari</h5>
          <ul>
            <li><a class="white-text" href="#">Peta</a></li>
          </ul>
        </div>
        <div class="col l2 s12">
          <h5 class="white-text">Kontak</h5>
          <ul>
            <li><a class="white-text" href="<?php echo base_url('user/contact');?>">Kontak</a></li>
            <li><a class="white-text" href="<?php echo base_url('user/kritik_saran'); ?>">Kritik & Saran</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        By KWproject IT Team
      </div>
    </div>
  </footer>

<!--  Scripts-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js><\/script>')</script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fancybox.pack.js"></script>
  <script type="javascript">
      $(".fancybox").fancybox();
  </script>
  </body>
</html>