
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body">
        <?php echo form_open('admin/c_pariwisata/InputData'); ?>
       <div class="col-md-offset-1 col-md-10">
       <div class="form-horizontal">
          <div class="form-group">
              <label class="col-md-2 control-label" >Nama Provinsi</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="nama_provinsi" id="provinsi" >
                      <option value="" >Pilih</option>
                        <?php foreach($prov as $prov){
                            echo '<option value='.$prov->id_prov.'>'.$prov->nm_prov.'</option>';
                        } ?>
                  </select>
                   <?php if (!empty(form_error('nama_provinsi'))) {
                      echo form_error('nama_provinsi');
                  } ?>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-2 control-label" >Nama Kota</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="nama_kota" id="kabupaten">
                      <option value="" >Pilih</option>
                        
                  </select>
                  <?php if (!empty(form_error('nama_kota'))) {
                      echo form_error('nama_kota');
                  } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" >Nama Pariwisata</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control1"  name="nama_pariwisata"  placeholder="Nama Pariwisata" >
                   <?php if (!empty(form_error('nama_pariwisata'))) {
                      echo form_error('nama_pariwisata');
                  } ?>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-2 control-label" >Jenis Pariwisata</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="jenis">
                      <option value="" >--Pilih--</option>
                        <?php foreach ($jenis->result() as $r): ?>
                                <option value="<?php echo $r->id_jenis_pariwisata; ?>"><?php echo ucfirst($r->nama_jenis); ?></option>
                        <?php endforeach ?>
                  </select>
                   <?php if (!empty(form_error('jenis'))) {
                      echo form_error('jenis');
                  } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" > latitude lokasi</label>
              <div class="col-sm-10">
                  <input type="text" name="lat" class="form-control1">
                   <?php if (!empty(form_error('lat'))) {
                      echo form_error('lat');
                  } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" > longitude lokasi</label>
              <div class="col-sm-10">
                  <input type="text" name="lng" class="form-control1">
                   <?php if (!empty(form_error('lng'))) {
                      echo form_error('lng');
                  } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-md-2 control-label">Deskripsi Pariwisata</label>
              <div class="col-sm-10">
                <?php echo form_textarea(array('name'=>'deskripsi','class'=>'form-control1','style'=>'height:100px;')); ?>
                 <?php if (!empty(form_error('deskripsi'))) {
                      echo form_error('deskripsi');
                  } ?>
              </div>
            </div>
              <?php 
              if (!empty($notif)) {
                  echo '<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                           '.$notif.'
                           </div>
                        </div>';
              } ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Input</button> <a href="<?php echo base_url('admin/c_pariwisata/LihatData'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
        </div>
    </form>
    </div>
</div>