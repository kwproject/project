<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title><?php echo $title; ?></title>
    <script type="application/x-javascript"> addEventListener("load", 
          function() { setTimeout(hideURLbar, 0); }, false); 
          function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <link href="<?php echo base_url();?>assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/family.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>assets/css/style_dashboard.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet"> 
    
    <script src="<?php echo base_url();?>assets/js/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>assets/js/ckeditor/style.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('user/c_pariwisata/add_kota');?>/"+$(this).val();
                $('#kota').load(url);
                return false;
            })
        });
    </script>
</head>

<body>

    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="<?php echo base_url('user/home'); ?>" class="brand-logo darken-1"><h5>TripVisor</h5></a></h1>
                </div>
            </nav>
        </div>
    </header>
    <div id="main">
        <div class="wrapper">
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation" style="width: 340px;">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?php echo base_url('uploads/user/'.$pengguna->foto);?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li>
                                        <a href="<?php echo base_url('user/login/logout'); ?>"><i class="large material-icons">trending_flat</i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $pengguna->nama; ?><i class="large material-icons right right">more_vert</i></a>
                                <p class="user-roal"><?php echo $pengguna->username; ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="<?php echo base_url('user/home'); ?>" class="waves-effect waves-cyan"><i class="large material-icons left">home</i> Dashboard</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="large material-icons left">location_on</i> PARIWISATA</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url('user/c_pariwisata/InputData'); ?>">Input Data</a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                        </ul> 
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <section id="content">
                    <div class="container">
                        <?php echo $contents;?>
                    </div>
            </section>
            
            <aside id="right-sidebar-nav">
               
            </aside>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    <!--<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>-->
        <script type="text/javascript   ">
            $(document).ready( function () {
                $('#example').DataTable();
                $( 'a' ).imageLightbox();
            } );

        </script>
</body>

</html>