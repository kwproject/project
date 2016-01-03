<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?> | Pariwisata Indonesia</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap3.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/mystyle.css" rel="stylesheet">
  </head>
  <body>
  <div id="wrap">
      <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('user/home') ?>">TripVisor</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('user/navPariwisata'); ?>"><strong>Pariwisata</strong></a></li>
            <li><a href="<?php echo base_url('maps'); ?>"><strong>Peta</strong></a></li>
            <li><a href="<?php echo base_url('blog'); ?>"><strong>Berita</strong></a></li>
            <?php if($this->session->userdata('Login')=='berhasil' && $this->session->userdata('level')==0  && $this->session->userdata('active')==1){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php if(!empty($pengguna->nama)){echo $pengguna->nama;} ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('user/setting_user') ?>"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
               <li><a href="<?php echo base_url('login/logout') ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>
              </ul>
            </li>
            <?php } elseif($this->session->userdata('level')==1) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php if(!empty($pengguna->nama)){echo $pengguna->nama;} ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li><a href="<?php echo base_url('home') ?>"><span class="glyphicon glyphicon-user"></span> Kembali Ke Admin</a></li>
               <li><a href="<?php echo base_url('login/logout') ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>
              </ul>
            </li>
            <?php } else { ?>
              <li><a href="<?php echo base_url('login'); ?>" class="white-text"><span class="glyphicon glyphicon-user"></span> <strong>Masuk | Daftar</strong></a></li>
           <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <?php echo $contents; ?>
    </div>
    </div><!-- wrap -->
     <footer id="footer">
       <div class="container-fluid">
         <div class="row">
          <div class="col-sm-2 col-md-offset-2">
          <div class="container">
           <h4>Wisata Indonesia</h4>
           <p>
              &copy; 2015 Wisata Indonesia<br>
              <br><br>
              Temukan tempat wisata di Indonesia
            </p>
          </div><!-- end container -->
          </div><!-- end col-sm-3 -->
          
          <div class="col-sm-2">
          <div class="container">
           <h4>Umum</h4>
           <ul class="unstyled">
              <li><a href="<?php echo base_url('user/navPariwisata') ?>">Pariwisata</a></li>
              <li><a href="<?php echo base_url('blog') ?>">Berita</a></li>
            </ul>
          </div><!-- end row -->
          </div><!-- end col-sm-3 -->
          <div class="col-sm-2">
          <div class="container">
           <h4>Cari</h4>
           <ul>
             <li><a href="#">Peta</a></li>
           </ul>
          </div>
          </div><!-- end col-sm-3 -->
          <div class="col-sm-2">
          <div class="container">
           <h4>Kontak</h4>
           <ul>
             <li><a href="<?php echo base_url('user/contact');?>">Kontak</a></li>
             <li><a href="<?php echo base_url('user/kritik_saran'); ?>">Kritik & Saran</a></li>
           </ul>
          </div>
          </div><!-- end col-sm-3 -->
         </div>
       </div>
     </footer>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#provinsi_id").change(function (){
                var url = "<?php echo site_url('user/navPariwisata/add_kota');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
        });

        function get_data(){

        }
    </script>
  </body>
</html>