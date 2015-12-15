  <div class="container">
        <div class="col s6 push-s3">

            <div class="row">
              <div class="col s12 teal-text center-align">
              <h4>Masuk</h4>
              </div>
              <div class="col s4 push-s4">
              <div class="divider"></div>
              </div>
            </div>

          <div class="card-panel">
            <?php echo form_open('login/login_form') ?>
            <div class="row">
              <div class="input-field col s8 push-s2">
                <input name="username" type="text" class="validate teal-text text-darken-5"required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('username');?>
                <label for="username">Nama Pengguna</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s2">
                <input name="password" type="password" class="validate teal-text text-darken-5" required="true" onfocus="this.value = '';" 
          onblur="if (this.value == '')"><?php echo form_error('password');?>
                <label for="password">Sandi</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s5">
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
  
  