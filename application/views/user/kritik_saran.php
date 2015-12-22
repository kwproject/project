<div class="container">
	<div class="row">

          <div class="col s12">
            
          </div>
          <div class="col s12">
            
          </div>

        </div>

        <div class="row">
          <div class="card-panel">
            <div class="container">

              <div class="row">
              	<h5 class="teal=">Kritik & Saran</h5>
              	<span class="thin">
              Untuk kritik 
            </span>
                <?php echo form_open('user/kritik_saran/InputData') ?>

                  <div class="row">
                    <div class="input-field col s12 m5">
                      <input id="last_name" type="text" name="judul" class="validate" required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('judul');?>
                      <label for="last_name">Judul</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea id="textarea1" name="deskripsi" class="materialize-textarea" required="true"></textarea>
                      <label for="textarea1">Deskripsi Kritik dan saran</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12 push-s0">
                      <button class="waves-effect waves-light btn"><i class="material-icons right">send</i>kirim</button>
                    </div>
                  </div>

                <?php form_close(); ?>
              </div>

            </div>
          </div>
        </div>
</div>


              