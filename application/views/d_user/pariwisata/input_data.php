&nbsp;
<div class="card">
  <div class="panel panel-primary">
    <div class="card-content teal darken-5">
      <div class="white-text flow-text"><?php echo $heading ?></div>
    </div>
      <div class="container">
        <div class="panel-body">
            <?php echo form_open('user/c_pariwisata/InputData'); ?>
       <div class="col-md-offset-1 col-md-10">
       <div class="form-horizontal">
          <div class="form-group">
              <label class="col-md-2 control-label" >Nama Provinsi</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="nama_provinsi" id="provinsi" >
                      <option value="" >Pilih</option>
                        <?php foreach($prov->result() as $prov){
                            echo '<option value="'.$prov->id_prov.'">'.$prov->nm_prov.'</option>';
                        } ?>
                  </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-2 control-label" >Nama Kota</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="nama_kota" id="kota">
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
                                <option value="<?php echo $r->id_jenis_pariwisata; ?>"><?php echo $r->nama_jenis; ?></option>
                        <?php endforeach ?>
                  </select>
                   <?php if (!empty(form_error('jenis'))) {
                      echo form_error('jenis');
                  } ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label">Deskripsi Pariwisata</label>
              <div class="col-sm-10">
                <?php echo form_textarea(array('name'=>'deskripsi','class'=>'form-control1 ckeditor','style'=>'height:100px;')); ?>
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
              } ?>&nbsp;
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Input</button>
                    </div>
                    &nbsp;
                </div>
            </div>
            </div>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>