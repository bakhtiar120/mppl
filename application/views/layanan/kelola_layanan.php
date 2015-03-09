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
	                     	<h2>Kelola Layanan</h2>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
	                <hr />

                    <div class="row">
                        <div class="col-md-12">
                        	<form method="POST" action="<?php echo current_url()?>" role="form">
                        		<div class="form-group">
                        			<label>Nama Layanan</label>
                        			<input class="form-control" name="nama_layanan" value="<?php echo (isset($layanan)) ? $layanan['nama_layanan'] : ''; ?>">
                        		</div>
                        		<div class="form-group">
                        			<label>Tarif</label>
                        			<input class="form-control" name="tarif_layanan" value="<?php echo (isset($layanan)) ? $layanan['tarif_layanan'] : ''; ?>">
                        		</div>
                        		<div class="form-group pull-right" role="group">
	                        		<a class="btn btn-default" href="<?php echo base_url('layanan'); ?>">Kembali</a>
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