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
              	<h5 class="teal=">Kontak</h5>
              	<span class="thin">
              Silahkan hubungi kami melalui channel media sosial atau mengisi form dibawah ini. 
            </span>
                <?php echo form_open('user/contact/InputData') ?>

                  <div class="row">
                    <div class="input-field col s12 m5">
                      <input type="text" name="nama" class="validate" required="true">
                      <label for="nama">Nama</label>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="input-field col s12 m5">
                      <input type="text" name="email" class="validate" required="true">
                      <label for="email">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <textarea name="message" class="materialize-textarea" required="true"></textarea>
                      <label for="message">Pesan</label>
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


              