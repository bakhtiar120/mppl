<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('layout/general_css'); ?>
	</head>
	<body>
		<div id="wrapper">
			<?php $this->load->view('layout/nav_top'); ?>
			<?php $this->load->view('layout/nav_side'); ?>
			<div id="page-wrapper">
				<div id="page-inner">

					<div class="row">
	                    <div class="col-md-12">
	                     	<h2><?php echo (isset($transaksi)) ? 'Kelola Transaksi' : 'Entri transaksi' ; ?></h2>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
	                <hr />

                    <div class="row">
                        <div class="col-md-12">
                        	<form method="POST" action="<?php echo base_url('transaksi/insert')?>" role="form">
                        		
                        		<?php if(isset($transaksi)) {?>
                        		<div class="row">
                        			<div class="col-md-2">
		                        		<div class="form-group">
		                        			<label>ID Transaksi</label>
		                        			<p class="form-control-static"><?php echo $transaksi['id_transaksi'] ;?></p>
		                        		</div>
                        			</div>
                        			<div class="col-md-4 col-md-offset-2">
		                        		<div class="form-group">
		                        			<label>Tanggal</label><br>
		                        			<br>
		                        			<input class="form-control" name="tanggal_transaksi" value="<?php echo $transaksi['tanggal_transaksi']; ?>">
		                        		</div>
                        			</div>
                        		</div>
                        		<hr>
                        		<?php }?>
                        		<div class="row">
                        			<div class="col-md-8">
		                        		<div class="form-group">
		                        			<label>Pasien</label>
		                        			<select class="form-control basic-select2" name="id_pasien">
		                        				<option></option>
		                        				<?php foreach ($pasien as $value): ?>
		                        					<option value="<?php echo $value['id_pasien']?>" <?php echo (isset($transaksi) && $transaksi['id_pasien']==$value['id_pasien']) ? 'selected' : '' ; ?> ><?php echo $value['id_pasien'].' | '.$value['nama_pasien']?></option>
		                        				<?php endforeach; ?>
		                        			</select>
		                        		</div>
                        			</div>
                        			<div class="col-md-1">
                        				<br>
                        				<a href="#" data-toggle="modal" data-target="#insertPasienModal">Pasien Baru?</a>
                        			</div>
                        		</div>
                        		<hr>
                        		<div class="row">
                        			<div class="col-md-8">
		                        		<div class="form-group">
		                        			<label>Dokter</label>
		                        			<select class="form-control basic-select2" name="id_dokter">
		                        				<option></option>
		                        				<?php foreach ($dokter as $value): ?>
		                        					<option value="<?php echo $value['id_dokter']?>" <?php echo (isset($transaksi) && $transaksi['id_dokter']==$value['id_dokter']) ? 'selected' : '' ; ?> ><?php echo $value['id_dokter'].' | '.$value['nama_dokter']?></option>
		                        				<?php endforeach; ?>
		                        			</select>
		                        		</div>
                        			</div>
                        		</div>
                        		<hr>

                        		<?php if(isset($transaksi)) {?>
                        		<div class="row">
                        			<div class="col-md-2">
		                        		<div class="form-group">
		                        			<label>Layanan</label>
		                        			<?php
                                        		echo '<ol style="margin-top:20px">';
                                        		foreach ($transaksi['layanan'] as $value) 
                                        		{
                                        			echo '<li>'.$value['nama_layanan'].'</li>';
                                        		}
                                        		echo '</ol>';
                                        	?>
		                        		</div>
                        			</div>
                        			<div class="col-md-4 col-md-offset-2">
		                        		<div class="form-group">
		                        			<label>Total Pembayaran</label>
		                        			<p class="form-control-static"><?php echo $transaksi['total_pembayaran'] ;?></p>
		                        		</div>
                        			</div>
                        		</div>
                        		<hr>
                        		<?php }?>

                        		<div class="form-group pull-right" role="group">
	                        		<a class="btn btn-default" href="<?php echo base_url('transaksi'); ?>">Kembali</a>
	                        		<button class="btn btn-success" type="submit" name="update"><i class="fa fa-refresh fa-lg"></i> Simpan</button>                   			
                        		</div>
                        	</form>
                       	</div>
                    </div>
                    <!-- /. ROW  -->


					<!-- Modal -->
					<div class="modal fade" id="insertPasienModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  	<div class="modal-dialog">
						    <div class="modal-content">
						      	<div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Entri Pasien</h4>
						      	</div>
				                <form method="POST" action="<?php echo base_url('pasien/insert')?>" role="form">
							      	<div class="modal-body">
							        	<div class="row">
					                        <div class="col-md-12">
				                        		<div class="form-group">
				                        			<label>Nama</label>
				                        			<input class="form-control" name="nama_pasien">
				                        		</div>
				                        		<div class="form-group">
				                        			<label>Jenis Kelamin</label>
				                        			<select class="form-control" name="jk_pasien">
				                        				<option value="L">Laki-Laki</option>
				                        				<option value="P">Perempuan</option>
				                        			</select>
				                        		</div>
				                        		<div class="form-group">
				                        			<label>Alamat</label>
				                        			<input class="form-control" name="alamat_pasien">
				                        		</div>
				                        		<div class="form-group">
				                        			<label>Telp</label>
				                        			<input class="form-control" name="telp_pasien">
				                        		</div>
					                       	</div>
					                    </div>
					                    <!-- /. ROW  -->
								    </div>
								    <div class="modal-footer">
		                        		<div class="form-group pull-right" role="group">
			                        		<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
			                        		<button class="btn btn-success" type="submit" name="update"><i class="fa fa-refresh fa-lg"></i> Simpan</button>                   			
		                        		</div>
							      	</div>
						    	</form>
						    </div>
					  	</div>
					</div>

				</div>
			</div>
			
		</div>
		<?php $this->load->view('layout/general_js'); ?>
	</body>
</html>