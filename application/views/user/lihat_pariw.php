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
              <a href="<?php echo base_url('') ?>">Kembali Pilih pariwisata</a>
            </div>
          </div>
        </div>
      </div>
  <?php endforeach ?>
  	
  </div><!-- end col s8 push-s2-->
</div><!-- end row-->