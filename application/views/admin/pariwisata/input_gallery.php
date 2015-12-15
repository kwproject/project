<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body">
        <div class="col-md-offset-1 col-md-10">
            <div class="form-horizontal">
            <?php foreach ($record->result() as $r) { ?>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Pariwisata</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->nm_pariwisata ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Deskripsi</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->deskripsi ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Jenis</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->nama_jenis ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Provinsi</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->nm_prov ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 " >Nama Kota</label>
                    <div class="col-sm-10">
                        <p class="text-capitalize"><?php echo $r->nm_kota ?></p>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $r->id_pariwisata ?>" name="id">
            </div>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Gambar</div>
    </div>
    <?php echo form_open_multipart('admin/c_pariwisata/InputGambar'); ?>
    <input type="hidden" name="id" value="<?php echo $r->id_pariwisata ?>">
    <?php } ?>
    <div class="panel-body">
        <label class="col-md-2">Input Gambar</label>
        <div class="col-md-10">
            <input type="file" name="userfile"  required="TRUE"><br><input type="submit" class="btn btn-primary" name="submit">
        </div>
    
    <div class="container">
        <hr>
    </div>
        <div class="table-responsive">
        <table class="display table table-bordered" id="example">
            <thead>
                <tr>
                    <th width="10px"><center>No</center></th>
                    <th><center>Gambar</center></th>
                    <th width="10px"><center>Operasi</center></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($gambar->result() as $g) { ?>
                        <tr>
                            <td><center><?php echo $no; ?></center></td>
                            <td><center><a href="<?php echo base_url('uploads/'.$g->nama_img); ?>"><img src="<?php echo base_url('uploads/thumbs/'.$g->nama_img);?>"></a></center></td>
                            <td><center><a class='btn btn-primary' href='<?php echo base_url('admin/c_pariwisata/deleteGambar/'.$g->id_img) ?>'><span class='glyphicon glyphicon-remove'></span> </a></center></td>
                        </tr>   
                    
             <?php $no++; } ?>
                    
            </tbody>
        </table>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
