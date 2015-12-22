<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content teal darken-5">
                    <p class="white-text flow-text" align='center'><strong>Pencarian yang ada</strong></p>
                </div>
            </div>
            
            <div class="row">
            	<?php if(count($cari)>0) { ?>
            	
                <div id="test1" class="col s12">
                	<?php foreach ($cari as $data) { ?>
                    <div class="col s12 m4">
                        <div class="card hoverable">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="<?php echo base_url(); ?>/assets/images/paralax4.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4"><?php echo $data->nm_pariwisata; ?><i class="material-icons right">more_vert</i></span>
                                <p><a href="#">This is a link</a></p>
                            </div>
                            <div class="card-reveal">
                               	<span class="card-title grey-text text-darken-4"><?php echo $data->nm_pariwisata; ?><i class="material-icons right">close</i></span>
                                <p><?php echo $data->deskripsi; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
				</div>
				
				<?php }else{
					echo"<div class='card'>
                <div class='card-content darken-5'>
                    <p class='card-title activator grey-text text-darken-4' align='center'><strong>Pencarian Tidak ada</strong></p>
                </div>
            </div>";
				} ?>
			</div>
        </div>
	</div>
</div>


		