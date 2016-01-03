<div class="container">
	<div class="row">
      <div class="col s6 push-s3">

        <div class="row">
          <div class="col s12 teal-text center-align">
            <h3>Kritik & Saran</h3>
          </div>
          <div class="col s12">
            <div class="divider"></div>
          </div>
        </div>

        <div class="row">
          <div class="card-panel">
            <span class="thin grey-text text-darken-1">
              Terimakasih anda telah peduli membantu kami dalam memajukan website. Kritik dan Saran yang anda berikan sangat berguna bagi kami dalam memperbaharui website ini.
            </span>
                <?php echo form_open('user/kritik_saran/InputData') ?>
                  <div class="row">
                    <div class="input-field col s12 m6 push-s1">
                      <input id="last_name" type="text" name="judul" class="validate teal-text text-darken-5" required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('judul');?>
                      <label for="last_name">Judul</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12 m10 push-s1">
                      <textarea id="textarea1" name="deskripsi" class="materialize-textarea teal-text text-darken-5" required="true"></textarea>
                      <label for="textarea1">Deskripsi Kritik dan saran</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12 pull-s1 right-align">
                      <button class="waves-effect waves-light btn"><i class="material-icons right">send</i>kirim</button>
                    </div>
                  </div>

                <?php form_close(); ?>

            </div>
          </div>
        </div>
    </div>
  </div>
</div>


              