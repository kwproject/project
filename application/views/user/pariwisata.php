 <div class="container">
 <div class="panel panel-primary">
  <div class="panel-heading">
    <?php echo $heading ?>
  </div>
  <div class="panel-body">
    <div class="container">
      <div class="row">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-4"><center>Provinsi</center></label>
            <div class="col-sm-6">
            <?php echo form_open('user/navPariwisata') ?>
              <select style="width:300px;" name="provinsi" class="form-control" id="provinsi_id" required="true">
              <option value="">--pilih provinsi --</option>
                <?php foreach($prov as $p){
                  echo "<option value='".$p->id_prov."'>".$p->nm_prov."</option>";
                }  ?>
              </select>
            </div><!-- end col-sm-3 col-sm-offset-1 -->
          </div><!-- end form-group -->
          <div class="form-group">
            <label class="col-sm-4"><center>Kota</center></label>
            <div class="col-sm-6">
              <select style="width:300px;" name="kota" class="form-control" id="kabupaten" required="true">
                <option value="" disabled="">--pilih kota--</option>
              </select>
            </div><!-- end col-sm-3 col-sm-offset-1 -->
          </div><!-- end form-group -->
          <div class="form-group">
            <label class="col-sm-4"><center>Jenis</center></label>
            <div class="col-sm-6">
              <select style="width:300px;" name="jenis" class="form-control" id="jenisId" required="true">
                <option value="">--pilih jenis--</option>
                <?php foreach($jenis->result() as $j){
                  echo "<option value='$j->id_jenis_pariwisata'>".ucfirst($j->nama_jenis)."</option>";
                } ?>
              </select>
            </div><!-- end col-sm-3 col-sm-offset-1 -->
          </div><!-- end form-group -->
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-4">
              <input type="submit" value="Cari" name="submit" class="btn btn-primary">
            </div><!-- end col-sm-3 col-sm-offset-1 -->
          </div><!-- end form-group -->
        </div><!-- end form-horizontal -->
      </div><!-- end row -->
    </div>
  </div>
</div>
</div>
<br>
<?php if (isset($record)): ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <?php echo $heading1; ?>
  </div>
  <div class="panel-body">
      <?php foreach ($record as $r): ?>
        <?php if (!empty($r->nama_img)): ?>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="<?php echo base_url('uploads/'.$r->nama_img);?>" alt="...">
            <div class="container" style="background-color:#79bd9a;">
            <div class="caption" style="color:#fff;">
              <h2><?php echo strtoupper($r->nm_pariwisata) ?></h2>
              <br>
              <div class="well well-sm" style="color:#333">
                <?php echo "$r->nm_prov, $r->nm_kota"; ?>
                <hr>
                <p><?php echo substr($r->deskripsi, 0, 50) ?></p>
              </div>
              <p><a href="<?php echo base_url('user/navPariwisata/lihat_pariw/'.md5($r->id_pariwisata)) ?>" class="btn btn-danger" role="button">Lihat</a></p>
            </div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
          <div class="container" style="background-color:#79bd9a;" style="word-wrap: break-word;">
            <div class="caption" style="color:#fff;" >   
              <h2><?php echo strtoupper($r->nm_pariwisata) ?></h2>
              <br>
              <div class="well well-sm" style="color:#333" >
                <?php echo "$r->nm_prov, $r->nm_kota"; ?>
                <hr>
                <p><?php echo substr($r->deskripsi, 0, 50) ?></p>
              </div>
              <p><a href="<?php echo base_url('user/navPariwisata/lihat_pariw/'.md5($r->id_pariwisata)) ?>" class="btn btn-danger" role="button">Lihat</a></p>
            </div>
          </div>
          </div>
        </div>
        <?php endif ?>
      <?php endforeach ?>
    <?php elseif(isset($notif)): ?>
       <div class="container">
        <div class="alert alert-info" role="alert">
          <p><center><?php echo 'Data tidak ada'; ?></center></p>
        </div>
      </div>
    <?php else: ?> 
      <div class="container">
        <div class="alert alert-info" role="alert">
          <p><center><?php echo 'Pilih Kota'; ?></center></p>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
