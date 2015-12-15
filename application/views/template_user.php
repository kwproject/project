<!DOCTYPE html>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Wisata Indonesia - Jejalah Indonesia</title>

  <!-- CSS  -->
  <link href="<?php echo base_url();?>assets/css/family.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url();?>assets/css/style_user.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript">
$(document).ready(function(){
    $("#provinsi").change(function (){
        var url = "<?php echo site_url('user/c_pariwisata/add_kota');?>/"+$(this).val();
        $('#kabupaten').load(url);
        return false;
    })
});
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
      <a href="<?php echo base_url('user/home'); ?>" class="brand-logo white-text"><strong>TripVisor</strong></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="<?php echo base_url('pariwisata'); ?>" class="white-text active"><strong>Pariwisata</strong></a></li>
          <li><a href="<?php echo base_url('maps'); ?>" class="white-text"><strong>Peta</strong></a></li>
          <li><a href="<?php echo base_url('user/app/news'); ?>" class="white-text"><strong>Blog</strong></a></li>

          <?php if($this->session->userdata('Login')=='berhasil'){ ?>
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="<?php echo base_url('user/setting_user') ?>">Profile</a></li>
              <li><a href="<?php echo base_url('user/login/logout') ?>">Logout</a></li>
            </ul>
            <li><a href="<?php echo base_url('user/login'); ?>" class="dropdown-button white-text" data-activates="dropdown1"><i class="material-icons left">person</i><strong><?php if(!empty($pengguna->nama)){echo $pengguna->nama;} ?></strong><i class="material-icons right">arrow_drop_down</i></a></li>

          <?php } else { ?>
              <li><a href="<?php echo base_url('user/login'); ?>" class="white-text"><i class="material-icons left">person</i><strong>Masuk | Gabung</strong></a></li>
          <?php } ?>
          
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="<?php echo base_url('pariwisata'); ?>" class="white-text active"><strong>Pariwisata</strong></a></li>
          <li><a href="<?php echo base_url('maps'); ?>" class="white-text"><strong>Peta</strong></a></li>
          <li><a href="<?php echo base_url('news'); ?>" class="white-text"><strong>Blog</strong></a></li>
          <li><a href="<?php echo base_url('user/login'); ?>" class="white-text"><strong>Masuk | Gabung</strong></a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>
    <div class="row">  
      <?php echo $contents;?>
    </div>  
      
    <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Wisata Indonesia</h5>
          <p class="white-text">
            &copy; 2015 Wisata Indonesia Society and Partners.<br>
            All Right Reserved.
            <br><br>
            Find location of your tour with Wisata Indonesia.
          </p>
        </div>
      
        <div class="col l2 s12">
          <h5 class="white-text">General</h5>
          <ul>
            <li><a class="white-text" href="#!">Pariwisata</a></li>
            <li><a class="white-text" href="#!">Blog</a></li>
            <li><a class="white-text" href="#!">Members</a></li>
          </ul>
        </div>
        <div class="col l2 s12">
          <h5 class="white-text">Find</h5>
          <ul>
            <li><a class="white-text" href="#!">Location</a></li>
            <li><a class="white-text" href="#!">Maps</a></li>
          </ul>
        </div>
        <div class="col l2 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
            <li><a class="white-text" href="#!">Contact</a></li>
            <li><a class="white-text" href="#!">Kritik & Saran</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Made By Wisata Indonesia IT Team.
      </div>
    </div>
  </footer>

<!--  Scripts-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js><\/script>')</script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
  <script type="javascript">
    $(".dropdown-button").dropdown();
  </script>
  </body>
</html>