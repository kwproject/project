<div class="panel panel-primary">
    <div class="panel-heading"><?php echo $heading1; ?></div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $heading2; ?></div>
                <div class="panel-body">
                    <table class=" display table table-bordered" id="example1">
                        <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Judul</center></th>
                                <th><center>Deskripsi</center></th>
                                <th><center>Operasi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($kritik->result() as $r){
                                
                                echo "<tr>
                                        <td><center>".$no."</center></td>
                                        <td><center>".$r->judul."</center></td>
                                        <td><center>".$r->deskripsi."</center></td>
                                        <td><center>   
                                            <a class='btn btn-primary' href='".base_url('admin/c_kritik_saran/deleteKritik/'.$r->id)."'>Hapus</a>  
                                        </center></td>
                                    </tr>";
                                $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $heading3; ?></div>
                <div class="panel-body">
                    <table class="display table table-bordered" id="example">
                    <thead>
                            <tr>
                                <th width="10px"><center>No</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Email</center></th>
                                <th><center>Pesan</center></th>
                                <th><center>Operasi</center></th>
                            </tr>
                    </thead>
                    <tbody>
                            <?php $no=1; foreach($contact->result() as $r){

                                echo "<tr>
                                        <td><center>".$no."</center></td>
                                        <td><center>".$r->nama."</center></td>
                                        <td><center>".$r->email."</center></td>
                                        <td><center>".$r->message."</center></td>
                                        <td><center>   
                                            <a class='btn btn-primary' href='".base_url('admin/c_kritik_saran/deleteKontak/'.$r->id_contact)."'>Hapus</a>  
                                        </center></td>
                                    </tr>";

                                $no++;
                            }?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
