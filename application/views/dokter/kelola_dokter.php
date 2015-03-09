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
	                     	<h2>Kelola Dokter</h2>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
	                <hr />

                    <div class="row">
                        <div class="col-md-12">
                        	<form method="POST" action="<?php echo current_url()?>" role="form">
                        		<div class="form-group">
                        			<label>Nama</label>
                        			<input class="form-control" name="nama_dokter" value="<?php echo (isset($dokter)) ? $dokter['nama_dokter'] : ''; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Alamat</label>
                        			<input class="form-control" name="alamat_dokter" value="<?php echo (isset($dokter)) ? $dokter['alamat_dokter'] : ''; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Telp</label>
                        			<input class="form-control" name="telp_dokter" value="<?php echo (isset($dokter)) ? $dokter['telp_dokter'] : ''; ?>">
                        		</div>
                        		<div class="form-group pull-right" role="group">
	                        		<a class="btn btn-default" href="<?php echo base_url('dokter'); ?>">Kembali</a>
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