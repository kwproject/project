<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body">
        <div class="col-md-offset-1 col-md-10">
            <?php echo form_open('admin/c_aktifitas/eksekusi'); ?>
            <?php foreach ($record as $r) { ?>
            <div class="form-horizontal">
                <input type="hidden" name="id_user" value="<?php echo $r->id_user; ?>">
                <input type="hidden" name="id" value="<?php echo $r->id_rekomendasi; ?>">
                <input type="hidden" name="nama_img" value="<?php echo $r->nama_img; ?>">
                <input type="hidden" name="full_path" value="<?php echo $r->full_path; ?>">
                <div class="form-group">
                    <label class="col-md-2 " >Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control1" readonly="readonly" value="<?php echo $r->username ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Pariwisata</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_paris" class="form-control1" readonly="readonly" value="<?php echo $r->nama_pariwisata ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Jenis</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis" class="form-control1" disabled="disabled" value="<?php echo $r->nama_jenis ?>">
                        <input type="hidden" name="id_jenis" value="<?php echo $r->id_jenis_pariwisata; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Provinsi</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id_prov" value="<?php echo $r->id_prov; ?>">
                        <input type="text" name="nama_provinsi" class="form-control1" disabled="disabled" value="<?php echo $r->nm_prov ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Kota</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id_kota" value="<?php echo $r->id_kota; ?>">
                        <input type="text" name="nama_kota" class="form-control1" disabled="disabled" value="<?php echo $r->nm_kota ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Deskripsi</label>
                    <div class="col-sm-10 container">
                        <?php echo form_textarea(array('name'=>'deskripsi','class'=>'form-control1 ckeditor','value'=>$r->deskripsi,'style'=>'height:200px;','readonly'=>'readonly')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Tanggal</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->tanggal ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Foto</label>
                    <div class="col-sm-10">
                        <a  href="<?php echo base_url('uploads/'.$r->nama_img) ?>">
                            <img src="<?php echo base_url('uploads/thumbs/'.$r->nama_img) ?>" >
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                    <?php if ($r->status==0) {
                        echo "
                                <input type='submit' name='terima' value='Terima' class='btn btn-primary'> 
                                <input type='submit' value='Tolak' name='tolak' class='btn btn-danger'> 
                                <a href='".base_url('home')."' class='btn btn-warning'>Kembali</a>
                            ";
                    } elseif ($r->status==1 || $r->status==2) {
                        
                        echo "
                                <a href='".base_url('home')."' class='btn btn-warning'>Kembali</a>
                            ";
                    }?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php }   ?>
    </div>
</div>

