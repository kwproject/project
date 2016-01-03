<div class="container">
	<div class="row">

      <div class="col s8 push-s2">

        <div class="row">
          <div class="col s12 teal-text center-align">
            <h3>Kontak</h3>
          </div>
          <div class="col s6 push-s3">
            <div class="divider"></div>
          </div>
        </div>

        <div class="row">
            <div class="card-panel">
              <div class="container">

              <div class="row">
              	<span class="thin grey-text text-darken-1">
                  Silahkan hubungi kami melalui channel media sosial atau mengisi form dibawah ini. 
                </span>
              </div>
                <?php echo form_open('user/contact/InputData') ?>

                  <div class="row">
                    <div class="input-field col s12 m8">
                      <input type="text" name="nama" class="validate teal-text text-darken-5" required="true">
                      <label for="nama">Nama</label>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="input-field col s12 m8">
                      <input type="text" name="email" class="validate teal-text text-darken-5" required="true">
                      <label for="email">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea name="message" class="materialize-textarea teal-text text-darken-5" required="true"></textarea>
                      <label for="message">Pesan</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12 right-align">
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