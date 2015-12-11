<div class="panel panel-primary">
	<div class="panel-heading"><?php echo $heading1; ?></div>
	<div class="panel-body">
		<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $heading2; ?></div>
			<div class="panel-body">
				<div class="table-responsive">
					<div class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								
							</tr>
						</tbody>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $heading3; ?></div>
			<div class="panel-body">
				<table class="display table table-bordered" id="example">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Aktifitas</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($record->result() as $r){

						echo "<tr>
								<td>".$no."</td>
								<td><b>".$r->username."</b> ".$r->aktifitas."</td>
								<td>".$r->tanggal."</td>
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
