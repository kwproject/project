&nbsp;
<div class="card">
    <div class="panel panel-primary">
        <div class="card-content teal darken-5">
            <div class="white-text flow-text"><?php echo $heading ?></div>
        </div>
        <div class="container">
            <div class="panel-body no-padding">
                <div class="col-md-offset-1 col-md-12">
                	<?php echo form_open_multipart('user/setting_user/updateProfile') ?>
                    <?php foreach ($record->result() as $r) { ?>
                    <div class="form-horizontal">
                        <?php if(!empty($notif)){
                        echo "<div class='form-group'>
                                <div class='col-md-6 col-md-offset-3'>
                                <div class='alert alert-success' role='alert'>
                                    <center>".$notif."</center>
                                </div>
                                </div>
                            </div>";
                        }  ?>
                        <div class="form-group">
                            <label class="col-md-2">Nama</label>
                            <div class="col-md-10">
                                <input type="text" name="nama" value="<?php echo $r->nama; ?>" class="form-control1" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Username</label>
                            <div class="col-md-10">
                                <input type="text"  value="<?php echo $r->username; ?>" class="form-control1" readonly="readonly" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="text" name="email" value="<?php echo $r->email; ?>" class="form-control1" required="true">
                            </div>  
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-2">foto</label>
                            <div class="col-md-10" style="width:171px;">
                                <div class="thumbnail">
                                    <img src="<?php echo base_url('uploads/user/'.$r->foto);?>"> 
                                </div>
                                <input type="file" name="userfile" required="TRUE">
                            </div>
                        </div>
                        &nbsp;
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button name="submit" class="btn btn-primary"> Simpan</button> <a href="<?php echo base_url('home'); ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                        <?php } ?>
                    	<?php echo form_close(); ?>
                        &nbsp;
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>



        