<div class="slider">
      <ul class="slides">
        <li>
          <img src="<?php echo base_url();?>assets/images/Ragunan.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3>Ragunan Indonesia</h3>
            <h5 class="light grey-text text-lighten-3">Wisata Indonesia</h5>
          </div>
        </li>
        <li>
          <img src="<?php echo base_url();?>assets/images/tamanmini.JPG"> <!-- random image -->
          <div class="caption left-align">
            <h3>Taman Mini Indonesia Indah</h3>
            <h5 class="light grey-text text-lighten-3">Wisata Indonesia</h5>
          </div>
        </li>
        <li>
          <img src="<?php echo base_url();?>assets/images/museummonument.JPG"> <!-- random image -->
          <div class="caption right-align">
            <h3>Museum Nasional Indonesia</h3>
            <h5 class="light grey-text text-lighten-3">Wisata Indonesi</h5>
          </div>
        </li>
      </ul>
  </div>
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
          
        <div class="col s12 m4">
          <div class="card">
            <div class="card-content teal darken-5">
              <p class="white-text flow-text"><strong>Taman Mini Indonesia</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">merupakan suatu kawasan taman wisata bertema budaya Indonesia di Jakarta Timur. Area seluas kurang lebih 150 hektare[1] atau 1,5 kilometer persegi man ini merupakan rangkuman kebudayaan bangsa Indonesia, yang mencakup berbagai aspek kehidupan sehari-hari masyarakat 26 provinsi Indonesia (pada tahun 1975) yang ditampilkan dalam anjungan daerah berarsitektur tradisional, serta menampilkan aneka busana, tarian, dan tradisi daerah.</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
            <div class="card-content teal darken-5">
              <p class="white-text flow-text"><strong>Ancol</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">merupakan sebuah objek wisata di Jakarta Utara. Sebagai komunitas pembaharuan kehidupan masyarakat yang menjadi kebanggaan bangsa. Senantiasa menciptakan lingkungan sosial yang lebih baik melalui sajian hiburan berkualitas yang berunsur seni, budaya dan pengetahuan, dalam rangka mewujudkan komunitas 'Life Re-Creation' yang menjadi kebanggaan bangsa..</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
            <div class="card-content teal darken-5">
              <p class="white-text flow-text"><strong>Kebun Binatang Ragunan</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">Kebun Binatang Ragunan adalah sebuah kebun binatang yang terletak di daerah Ragunan, Pasar Minggu, Jakarta Selatan, Indonesia. Kebun binatang seluas 140 hektare ini didirikan pada tahun 1864. Di dalamnya, terdapat berbagai koleksi yang terdiri dari 295 spesies dan 4040 spesimen.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        
        <div class="col s12">
          <h4 class="teal-text darken-4">Berita Terkini</h4>
        </div>
        <?php foreach ($berita->result() as $b) { ?>
        <div class="col s12 m4">
          <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="<?php echo base_url('uploads/berita/'.$b->foto_berita);?>">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><?php echo $b->judul_berita ?><i class="material-icons right">more_vert</i></span>
              <p><a href="<?php echo base_url('home/berLengkap/'.$b->id_berita) ?>">Read More.....</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><?php echo $b->judul_berita ?><i class="material-icons right">close</i></span>
              <p><?php echo substr($b->isi_berita,0,20); ?></p>
            </div>
          </div>
        </div>
        <?php } ?>

        <ul class="pagination right">
          <li class="active waves-effect"><a href='<?php echo base_url('blog') ?>'>Lihat Selengkapnya..</a></li>
        </ul>
      
      </div>

    </div>
  </div>

 