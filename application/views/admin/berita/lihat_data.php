
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body no-padding">
    <a href="<?php echo base_url('admin/c_berita/inputData'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
    <hr>
        <div class="table-responsive">
            <table class="display table table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="10px"><center>No</center></th>
                        <th><center>Judul Berita</center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>Operasi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($record->result() as $r) {
                        
                        echo "<tr>
                                <td><center>$no</center></td>
                                <td><center>$r->judul_berita</center></td>
                                <td><center>$r->tanggal</center></td>
                                <td><center><a class='btn btn-primary' href='".base_url('admin/c_berita/edit/'.$r->id_berita)."'><span class='glyphicon glyphicon-pencil'></span> </a>
                                            <a class='btn btn-primary' href='".base_url('admin/c_berita/delete/'.$r->id_berita)."'><span class='glyphicon glyphicon-remove'></span></a></center></td>
                            </tr>";
                        
                        $no++;
                        
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>