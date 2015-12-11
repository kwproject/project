
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $heading ?></div>
    </div>
    <div class="panel-body no-padding">
        <div class="table-responsive">
            <table class="display table table-bordered" id="example">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th><center>Nama Pariwisata</center></th>
                        <th>
                            <center>Jenis Pariwisata</center>
                        </th>
                        <th><center>Deskripsi Pariwisata</center></th>
                        <th><center>Provinsi</center></th>
                        <th><center>Kota</center></th>
                        <th><center>Operasi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($record->result() as $r) {
                        echo "<tr>
                                <td><center>$no</center></td>
                                <td><center>$r->nm_prov</center></td>
                                <td><center><a class='btn btn-primary' href='".base_url('user/pariwisata/c_provinsi/edit/'.$r->id_prov)."'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
                                            <a class='btn btn-primary' href='".base_url('user/pariwisata/c_provinsi/delete/'.$r->id_prov)."'><span class='glyphicon glyphicon-remove'></span> Delete</a></center></td>
                            </tr>";
                        
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>