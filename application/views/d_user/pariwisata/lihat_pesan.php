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
                        <th><center>Pesan</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($record->result() as $r) {
                        echo "<tr>
                                <td><center>$no</center></td>
                                <td><center>$r->isi_pesan</center></td>
                            </tr>";
                        
                        $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>