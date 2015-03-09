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
	                     	<h2>Kelola Pasien</h2>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                        	<form method="POST" action="<?php echo current_url()?>" role="form">
                        		<div class="form-group">
                        			<label>Nama</label>
                        			<input class="form-control" name="nama_pasien" value="<?php echo (isset($pasien)) ? $pasien['nama_pasien'] : ''; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Jenis Kelamin</label>
                        			<select class="form-control" name="jk_pasien">
                        				<option value="L" <?php echo (isset($pasien) && $pasien['jk_pasien']=='L') ? 'selected' : '' ?>>Laki-Laki</option>
                        				<option value="P" <?php echo (isset($pasien) && $pasien['jk_pasien']=='P') ? 'selected' : '' ?>>Perempuan</option>
                        			</select>
                        		</div>
                        		<div class="form-group">
                        			<label>Alamat</label>
                        			<input class="form-control" name="alamat_pasien" value="<?php echo (isset($pasien)) ? $pasien['alamat_pasien'] : ''; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Telp</label>
                        			<input class="form-control" name="telp_pasien" value="<?php echo (isset($pasien)) ? $pasien['telp_pasien'] : ''; ?>">
                        		</div>
                        		<div class="form-group pull-right" role="group">
	                        		<a class="btn btn-default" href="<?php echo base_url('pasien'); ?>">Kembali</a>
	                        		<button class="btn btn-success" type="submit" name="update"><i class="fa fa-refresh fa-lg"></i> Simpan</button>                   			
                        		</div>
                        	</form>
                       	</div>
                    </div>
                    <!-- /. ROW  -->

				</div>
			</div>
			
		</div>
		<?php $this->load->view('layout/general_js'); ?>
	</body>
</html>