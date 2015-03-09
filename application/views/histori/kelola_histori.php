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
	                     	<h2>Kelola Histori</h2>
	                    </div>
	                </div>
	                <!-- /. ROW  -->
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                        	<form method="POST" action="<?php echo current_url()?>" role="form">
                        		<div class="form-group">
                        			<label>Nama Pasien</label>
                        			<p class="form-control-static"><?php echo $pasien['nama_pasien'] ;?></p>
                        		</div>
                        		<div class="form-group">
                        			<label>Catatan</label>
                        			<textarea class="form-control" name="catatan"><?php echo (isset($histori)) ? $histori['catatan'] : '' ?></textarea>
                        		</div>
                        		<div class="form-group">
                        			<label>Layanan</label>
                        			<select class="form-control catatan-select2" multiple="multiple" name="layanan[]">
                                        <?php foreach ($layanan as $value):?>
                                            <option value="<?php echo $value['id_layanan']?>" <?php if(isset($histori)) 
                                                    {
                                                        foreach($histori['layanan'] as $selected_layanan) 
                                                        { 
                                                            if( $selected_layanan['id_layanan']== $value['id_layanan'])
                                                            {
                                                                echo 'selected';
                                                            } else {
                                                                '';
                                                            } 
                                                        }
                                                    } ?> ><?php echo $value['nama_layanan']?></option>
                                        <?php endforeach;?>
                                    </select>
                        		</div>
                        		<div class="form-group">
                        			<label>Resep</label>
                        			<textarea class="form-control" name="resep"><?php echo (isset($histori)) ? $histori['resep'] : ''; ?></textarea>
                        		</div>
                        		<div class="form-group pull-right" role="group">
	                        		<a class="btn btn-default" href="<?php echo base_url('histori/index/'.$pasien['id_pasien']); ?>">Kembali</a>
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