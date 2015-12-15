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