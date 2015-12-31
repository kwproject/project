
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body no-padding">
    <a href="<?php echo base_url('admin/c_pariwisata/InputData'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
    <hr>
        <div class="table-responsive">
            <table class="display table table-bordered" id="example">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>Nama Pariwisata</center></th>
                        <th width="10px">
                            <center>Jenis Pariwisata</center>
                        </th>
                        <th><center>latitude lokasi</center></th>
                        <th><center>longitude lokasi</center></th>
                        <th><center>Provinsi</center></th>
                        <th><center>Kota</center></th>
                        <th><center>Gambar</center></th>
                        <th><center>Operasi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($record->result() as $r) {
                        echo "<tr>
                                <td><center>$no</center></td>
                                <td><center>$r->nm_pariwisata</center></td>
                                <td><center>$r->nama_jenis</center></td>";
                                if ($r->lat==0.000000 && $r->lng==0.000000) {
                                    echo " <td><center>$r->lat <span style='color:red;' class='glyphicon glyphicon-remove'></span></center></td>
                                            <td><center>$r->lng <span style='color:red;' class='glyphicon glyphicon-remove'></span></center></td>";
                    } else {

                        echo "<td><center>$r->lat</center></td>
                            <td><center>$r->lng</center></td>";
                    }

                        echo    "<td><center>$r->nm_prov</center></td>
                                <td><center>$r->nm_kota</center></td>
                                <td><center><a class='btn btn-primary' href='".base_url('admin/c_pariwisata/InputGambar/'.$r->id_pariwisata)."'><span class='glyphicon glyphicon-picture'></span> </a></center></td>
                                <td><center><a class='btn btn-primary' href='".base_url('admin/c_pariwisata/edit/'.$r->id_pariwisata)."'><span class='glyphicon glyphicon-pencil'></span> </a>
                                            <a class='btn btn-primary' href='".base_url('admin/c_pariwisata/delete/'.$r->id_pariwisata)."'><span class='glyphicon glyphicon-remove'></span></a></center></td>
                            </tr>";
                        
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>