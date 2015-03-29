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
	                    <div class="col-md-6">
	                     	<h2>Daftar Pasien</h2>   
	                        <h5>Welcome, Love to see you back. </h5>
	                    </div>
	                    <br>
	                    <div class="col-md-6 center">
	                    	<?php if(!$this->ion_auth->in_group('dokter')) {?>
	                     	<a class="btn btn-lg pull-right red" href="<?php echo base_url('pasien/insert')?>"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Entri Pasien</a> 
	                    	<?php }?>
	                    </div>
	                </div>
	                 <!-- /. ROW  -->
	                 <hr />

	                  <div class="row">
	                <div class="col-md-12">
	                    <!-- Advanced Tables -->
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Daftar Pasien
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>No.</th>
	                                            <th>Nama</th>
	                                            <th>Alamat</th>
	                                            <th>Telp</th>
	                                            <th>Opsi</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $pasien): ?>
	                       
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                        <form action="<?php echo base_url('pasien/cetak_riwayat_pasien_layanan')?>" method="POST" role="form">
	                                        	
	                                            
	                                            <td> <?php if($this->ion_auth->in_group('dokter')) {?>
	                                        	<div class="form-group">
	                                            	<input class="form-control" name="id_pasien" value="<?php echo (isset($pasien)) ? $pasien['id_pasien'] : ''; ?>" type="hidden">
	                                            </div><?php } ?><?php echo $pasien['id_pasien']; ?></td>
	                                            <td><?php echo $pasien['nama_pasien'] ;?></td>
	                                            <td><?php echo $pasien['alamat_pasien'] ;?></td>
	                                            <td><?php echo $pasien['telp_pasien'] ;?></td>
	                                            <td class="center">
	                                            	<?php if($this->ion_auth->in_group('dokter')) {?>
	                                 	
	                                            <div class="col-md-3">
	                                            	<div class="form-group">
	                                            	<label>Pilih Layanan:</label>
	                    							<select name="layanan">
	                                   				<?php foreach($records1 as $pasien): ?>
	                                   					<option value="<?php echo $pasien['id_layanan'] ;?>"><?php echo $pasien['nama_layanan'] ;?></option>
	                                   				<?php endforeach; ?>
	                                   				</select>
	                                   				<div class="col-md-12 col-md-offset-12">
	                    							<button type="submit" class="btn btn-lg pull-right red"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Lihat Riwayat</button> 
	                    							</div>
	                    						</div>
	                    						
	                    						
	                    			
	                                            	<?php }
	                                            	?>
	                                            	
	                                            	
						       
	                                            </td>
	                                            </form>
	                                        </tr>
	                                        <?php endforeach; ?>
	                                    </tbody>
	                                </table>
	                            </div>
	                            
	                        </div>
	                    </div>
	                    <!--End Advanced Tables -->
	                </div>
	            </div>
	                <!-- /. ROW  -->

				</div>
			</div>
			
		</div>
		<?php $this->load->view('layout/general_js'); ?>
	</body>
</html>