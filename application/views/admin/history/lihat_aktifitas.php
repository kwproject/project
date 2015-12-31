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
                                <th><center>Nama User Pengirim</center></th>
                                <th><center>Nama Pariwisata</center></th>
                                <th><center>Operasi</center></th>
                                <th><center>status</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($rekomendasi->result() as $r){
                                
                                echo "<tr>
                                        <td><center>".$no."</center></td>
                                        <td><center>".$r->username."</center></td>
                                        <td><center>".$r->nama_pariwisata."</center></td>
                                        <td><center>   
                                            <a class='btn btn-primary' href='".base_url('admin/c_aktifitas/lihat_rekomendasi/'.$r->id_rekomendasi)."'>Lihat</a>  
                                        </center></td>";
                                        if ($r->status==0) {
                                            echo "<td><center>
                                                    <span style='color:black;' class='glyphicon glyphicon-minus'></span>
                                                </center></td>";
                                        } elseif($r->status==1){
                                            echo "<td><center>
                                                    <span style='color:green;' class='glyphicon glyphicon-check'></span>
                                                </center></td>";
                                        } elseif($r->status==2){
                                            echo "<td><center>
                                                    <span style='color:red;' class='glyphicon glyphicon-remove'></span>
                                                </center></td>";
                                        }
                                 echo   "</tr>";
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
                                <th><center>Aktifitas</center></th>
                                <th><center>Tanggal</center></th>
                            </tr>
                    </thead>
                    <tbody>
                            <?php $no=1; foreach($aktifitas->result() as $r){

                                echo "<tr>
                                        <td><center>".$no."</center></td>
                                        <td><center><b>".$r->username."</b> ".$r->aktifitas."</center></td>
                                        <td><center>".$r->tanggal."</center></td>
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
