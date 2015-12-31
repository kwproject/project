
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body">
        <?php echo form_open('admin/c_pariwisata/edit'); ?>
       <div class="col-md-offset-1 col-md-10">
       <div class="form-horizontal">
          <div class="form-group">
              <label class="col-md-2 control-label" >Nama Provinsi</label>
              <div class="col-sm-10">
                  <select class="form-control1" id="disabledInput" name="nama_provinsi" id="provinsi" disabled="false">        
                        <?php foreach($record->result() as $r){
                            echo '<option value="'.$r->id_prov.'">'.$r->nm_prov.'</option>';
                            echo '<input type="hidden" value="'.$r->id_pariwisata.'" name="id">';
                        } ?>
                  </select>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-2 control-label" >Nama Kota</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="nama_kota" id="kabupaten" disabled>
                       <?php foreach($record->result() as $r){
                          echo '<option value="'.$r->id_kota.'">'.$r->nm_kota.'</option>';
                      } ?>
                  </select>
                  <?php if (!empty(form_error('nama_kota'))) {
                      echo form_error('nama_kota');
                  } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label" >Nama Pariwisata</label>
              <div class="col-sm-10">
              <?php foreach($record->result() as $r){

                echo "<input type='text' class='form-control1' value='$r->nm_pariwisata'  name='nama_pariwisata' placeholder='Nama Pariwisata'>";

                } ?>
                   <?php if (!empty(form_error('nama_pariwisata'))) {
                      echo form_error('nama_pariwisata');
                  } ?>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-2 control-label" >Jenis Pariwisata</label>
              <div class="col-sm-10">
                  <select class="form-control1" name="jenis" disabled>
                        <?php foreach ($record->result() as $r): ?>
                                <option value="<?php echo $r->id_jenis_pariwisata; ?>"><?php echo $r->nama_jenis; ?></option>
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
                <?php foreach($record->result() as $r){

                  echo "<input type='text' name='lat' value='".$r->lat."' class='form-control1'>";  
                } ?>
              </div>
            </div>
             <?php if (!empty(form_error('lat'))) {
                 echo "<div class='form-group'>
                  <div class='col-sm-offset-2 col-sm-10'>
                      <div class='alert alert-danger' role='alert'>
                          ".form_error('lat')."
                      </div>
                  </div>
                </div>";
            } ?>
            <div class="form-group">
              <label class="col-md-2 control-label" > longitude lokasi</label>
              <div class="col-sm-10">
               <?php foreach ($record->result() as $r): ?>
                  <input type="text" name="lng" value="<?php echo $r->lng; ?>" class="form-control1">
                <?php endforeach ?>
              </div>
            </div>
            <?php if (!empty(form_error('lng'))) {
                 echo "<div class='form-group'>
                  <div class='col-sm-offset-2 col-sm-10'>
                      <div class='alert alert-danger' role='alert'>
                          ".form_error('lng')."
                      </div>
                  </div>
                </div>";
            } ?>
            <div class="form-group">
              <label for="" class="col-md-2 control-label">Deskripsi Pariwisata</label>
              <div class="col-sm-10">
              <?php foreach($record->result() as $r){ ?>
                <?php echo form_textarea(array('name'=>'deskripsi','class'=>'form-control1 ckeditor','style'=>'height:100px;','value'=>$r->deskripsi)); ?>
              <?php } ?>
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