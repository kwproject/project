<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body">
       
        <div class="col-md-offset-1 col-md-10">
        <div class="form-horizontal">

        <?php foreach ($record->result() as $r) { ?>
        
        <?php echo form_open_multipart('admin/c_berita/edit'); ?>
            <input type="hidden" name="id" value="<?php echo $r->id_berita; ?>">
            <?php if(!empty(validation_errors())){
             echo " <div class='col-sm-10 col-sm-offset-2 alert alert-danger'>
                        ".validation_errors()."
                    </div>  
                   ";
                } ?>
            <div class="form-group">
                <label class="col-md-2 control-label" >Judul Berita</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $r->judul_berita; ?>" name="judul" class="form-control1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Isi Berita</label>
                <div class="col-sm-10">
                    <?php echo form_textarea(array('name'=>'isi','class'=>'form-control1 ckeditor','value'=>$r->isi_berita,'style'=>'height:200px;')); ?>
                </div>
            </div>
             
            <div class="form-group">
                <label class="col-md-2 control-label" >Foto</label>
                 <div class="col-md-10" style="width:171px;">
                    <div class="thumbnail">
                        <img src="<?php echo base_url('uploads/berita/'.$r->foto_berita);?>"> 
                    </div>
                    <input type="file" name="userfile">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <input type="submit" name="submit" class="btn btn-primary"/> <a href="<?php echo base_url('admin/c_berita'); ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
        </div>
        <?php echo form_close(); ?>
        <?php } ?>
    </div>
</div>
                  