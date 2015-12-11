 <div class="container">
    <div class="row">
        <div class="col s6 push-s3">
            <div class="row">
                <div class="col s12 teal-text center-align">
                    <h4>Konfirmasi Password</h4>
                </div>
            <div class="col s4 push-s4">
                <div class="divider"></div>
            </div>
        </div>
        <?php echo form_open('user/forgot/v_password') ?>
        <div class="card-panel">
            <div class="row">
                <div class="input-field col s8 push-s2">
                    <input id="email" name="email" type="email" class="validate teal-text text-darken-5">
                    <label for="email">Masukan E-mail</label>
                </div>
            </div>

            <div class="row">
              <div class="input-field col s8 push-s4">
                <button class="waves-effect waves-light btn">Submit</button>
            </div>
        </div>  
        <?php echo form_close();?>
        </div>
        </div>
    </div>
</div>