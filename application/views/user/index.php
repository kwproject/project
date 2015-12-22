<div class="slider">
      <ul class="slides">
        <li>
          <img src="<?php echo base_url();?>assets/images/paralax1.png"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="<?php echo base_url();?>assets/images/paralax2.png"> <!-- random image -->
          <div class="caption left-align">
            <h3>Left Aligned Caption</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="<?php echo base_url();?>assets/images/paralax3.png"> <!-- random image -->
          <div class="caption right-align">
            <h3>Right Aligned Caption</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
          </div>
        </li>
        <li>
          <img src="<?php echo base_url();?>assets/images/paralax4.png"> <!-- random image -->
          <div class="caption center-align">
            <h3>This is our big Tagline!</h3>
            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
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
              <p class="white-text flow-text"><strong>Tahukah Kamu?</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">Indonesia mempunyai 1200 tempat wisata yang terletak dimasing-masing pulau Indonesia.</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
            <div class="card-content teal darken-5">
              <p class="white-text flow-text"><strong>Tahukah Kamu?</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">Indonesia mempunyai 1200 tempat wisata yang terletak dimasing-masing pulau Indonesia.</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card">
            <div class="card-content teal darken-5">
              <p class="white-text flow-text"><strong>Tahukah Kamu?</strong></p>
            </div>
            <div class="card-content">
              <p class="teal-text darken-5">Indonesia mempunyai 1200 tempat wisata yang terletak dimasing-masing pulau Indonesia.</p>
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
          <li class="active waves-effect"><a href='wisata.html'>Lihat Selengkapnya..</a></li>
        </ul>
      
      </div>

    </div>
  </div>

 