  <div class="container">
    <div class="row">
      <div class="col s6 push-s3">
        
        <div class="row">
          <div class="col s12 teal-text center-align">
            <h3>Masuk</h3>
          </div>
          <div class="col s6 push-s3">
            <div class="divider"></div>
          </div>
        </div>

        <div class="card-panel">
          <?php echo form_open('login/login_form') ?>
            <div class="row">
              <div class="input-field col s10 push-s1">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" name="username" type="text" class="validate teal-text text-darken-5" required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('username');?>
                <label for="username">Nama Pengguna</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s10 push-s1">
                <i class="material-icons prefix">lock</i>
                <input id="password" name="password" type="password" class="validate teal-text text-darken-5" required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('password');?>
                <label for="password">Sandi</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 center-align">
                <button class="waves-effect waves-light btn">Masuk</button>
              </div>
            </div>
              <?php echo form_close(); ?>
            <div class="row">
              <div class="input-field col s6 push-s1">
                <p class="blue-text text-darken-2 left"><a href="<?php echo base_url('user/forgot'); ?>" class="teal-text text-darken-5">Lupa Sandi?</a></p>
              </div>
              <div class="input-field col s5">
                <p class="blue-text text-darken-2 right"><a href="<?php echo base_url('user/registrasi'); ?>" class="teal-text text-darken-5">Daftar</a></p>
              </div>
            </div>
 
        </div>

      </div>
    </div>
  </div>