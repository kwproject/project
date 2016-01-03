 <div class="row">
  <div class="col s8">
  <?php foreach ($data as $d): ?>
  	<div class="row">
       <div class="col s12">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo base_url('uploads/'.$d->nama_img); ?>">
              <span class="card-title">
              	<h3><?php echo $d->nm_pariwisata; ?><h3>
              	<h5><?php echo "$d->nm_kota, $d->nm_prov" ?></h5>
              </span>
            </div>
            <div class="card-content">
              <h4>Deskripsi</h4>
              <p><?php echo $d->deskripsi; ?></p>
            </div>
            <div class="card-action">
              <a href="<?php echo base_url('user/navPariwisata') ?>">Kembali Pilih pariwisata</a>
            </div>
          </div>
        </div>
      </div>
  <?php endforeach ?>
  <?php if (isset($image)): ?>
  	
  	<div class="row">
    <div class="col s12">
	  	<div class="card">
	  		<div class="card-content">
	  		<span class="card-title">Foto</span>
  		  	<hr>	
	  		<?php foreach ($image as $i): ?>
              <a class="fancybox" href="<?php echo base_url('uploads/'.$i->nama_img) ?>">
				<img src="<?php echo base_url('uploads/thumbs/'.$i->nama_img) ?>" alt="">
              </a>
	  		<?php endforeach ?>
	  		</div>
	  	</div>
      </div>
	</div>
	<?php else:  ?>
	<div class="row">
  <div class="col s12">
	  	<div class="card">
	  		<div class="card-content">
	  		<span class="card-title">Foto</span>
  		  	<hr>	
	  			<p><center>Tidak ada Foto</center></p>
	  		</div>
	  	</div>
	</div>
  </div>
  	<?php endif ?>
  </div><!-- end col s8 push-s2-->
  <div class="row">
  <div class="col s4">
    <div class="card">
    <div class="card-panel teal lighten-2" style="color:#fff;"> 
      <center><h5>Suggest Pariwisata</h5></center>
    </div>
    <div class="row">
      <div class="col s12">
      <?php foreach ($suggest as $s) {
        echo 
        "
          <div class='card' >
            <div class='card-image'>
                <img src='".base_url('uploads/'.$s->nama_img)."' alt=''>
            </div>
            <a href='".base_url('user/navPariwisata/lihat_pariw/'.md5($s->id_pariwisata))."'>
            <div class='card-content'>
                <p>$s->nm_pariwisata</p>
                <p style='font-size:12px;'>$s->nm_prov, $s->nm_kota</p>
            </div>
            </a>
        </div>
        ";
      } ?>
      </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div><!-- end row-->