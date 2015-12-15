  <div class="container">
      
        <div class="col s6 push-s3">
          <div class="card-panel">
              <div class="row">
                <div class=" push-s5">
                  <h5><center>Daftar</center></h5>
                  <div class="divider"></div>
                </div>
              </div>
            
            <?php echo form_open('user/registrasi/InputData') ?>
            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('nama','<p class="error">'); ?>
                <input name="nama" type="text" class="validate" value="<?php echo set_value('nama'); ?>">
                <label for="Nama Lengkap">Nama Lengkap</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('username','<p class="error">'); ?>
                <input name="username" type="text" class="validate" value="<?php echo set_value('username'); ?>">
                <label for="Username">Username</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('password','<p class="error">'); ?>
                <input name="password" type="password" class="validate" value="<?php echo set_value('password'); ?>">
                <label for="password">Password</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('con_password','<p class="error">'); ?>
                <input name="con_password" type="password" class="validate" value="<?php echo set_value('con_password'); ?>">
                <label for="password">Confirm Password</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('email','<p class="error">'); ?>
                <input name="email" type="email" class="validate" value="<?php echo set_value('email'); ?>">
                <label for="password">Email</label>
              </div>
            </div>
             <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('jenis_kel','<p class="error">'); ?>
                <select name="jenis_kel">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="L">Laki Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              <label>Jenis Kelamin</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s8 push-s2">&nbsp;<?php echo form_error('alamat','<p class="error">'); ?>
                <textarea id="icon_prefix2" name="alamat" class="materialize-textarea"></textarea>
                <label for="icon_prefix2">Alamat</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s8 push-s5">
                <button class="waves-effect waves-light btn">Daftar</button>
              </div>
            </div>
          <?php echo form_close(); ?>
          </div>

        </div>
      

  </div>
