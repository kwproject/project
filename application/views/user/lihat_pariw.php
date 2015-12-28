 <div class="row">
  <div class="col s8 push-s2">
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
	<?php else:  ?>
	<div class="row">
	  	<div class="card">
	  		<div class="card-content">
	  		<span class="card-title">Foto</span>
  		  	<hr>	
	  			<p><center>Tidak ada Foto</center></p>
	  		</div>
	  	</div>
	</div>
  	<?php endif ?>
  </div><!-- end col s8 push-s2-->
</div><!-- end row-->