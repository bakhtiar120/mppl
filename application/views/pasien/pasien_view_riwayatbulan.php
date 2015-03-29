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
	                                        	<form action="<?php echo base_url('pasien/cetak_riwayat_pasien_bulan')?>" method="POST" role="form">
		                                            <?php if($this->ion_auth->in_group('dokter')) {?>
		                                            	<input class="form-control" name="id_pasien" value="<?php echo (isset($pasien)) ? $pasien['id_pasien'] : ''; ?>" type="hidden">
		                                            <?php } ?>
		                                            <td><?php echo $pasien['id_pasien']; ?></td>
		                                            <td><?php echo $pasien['nama_pasien'] ;?></td>
		                                            <td><?php echo $pasien['alamat_pasien'] ;?></td>
		                                            <td><?php echo $pasien['telp_pasien'] ;?></td>
		                                            <td class="center">
		                                            	<?php if($this->ion_auth->in_group('dokter')) {?>
				                                            <div class="col-md-6">
				                                            	<div class="form-group">
				                                            		<select name="bulan">
				                                            			<option value="01-2015">Januari&#09;2015</option>
				                                            			<option value="02-2015">Februari&#09;2015</option>
				                                            			<option value="03-2015">Maret&#09;2015</option>
				                                            			<option value="04-2015">April&#09;2015</option>
				                                            			<option value="05-2015">Mei&#09;2015</option>
				                                            			<option value="06-2015">Juni&#09;2015</option>
				                                            			<option value="07-2015">Juli&#09;2015</option>
				                                            			<option value="08-2015">Agustus&#09;2015</option>
				                                            			<option value="09-2015">September&#09;2015</option>
				                                            			<option value="10-2015">Oktober&#09;2015</option>
				                                            			<option value="11-2015">November&#09;2015</option>
				                                            			<option value="12-2015">Desember&#09;2015</option>
				                                            			<option value="01-2016">Januari&#09;2016</option>
				                                            			<option value="02-2016">Februari&#09;2016</option>
				                                            			<option value="03-2016">Maret&#09;2016</option>
				                                            			<option value="04-2016">April&#09;2016</option>
				                                            			<option value="05-2016">Mei&#09;2016</option>
				                                            			<option value="06-2016">Juni&#09;2016</option>
				                                            			<option value="07-2016">Juli&#09;2016</option>
				                                            			<option value="08-2016">Agustus&#09;2016</option>
				                                            			<option value="09-2016">September&#09;2016</option>
				                                            			<option value="10-2016">Oktober&#09;2016</option>
				                                            			<option value="11-2016">November&#09;2016</option>
				                                            			<option value="12-2016">Desember&#09;2016</option>
				                                            		</select>
				                                            	</div>
				                                            </div>
				                    						<div class="col-md-6">
					                     						<button type="submit" class="btn btn-sm pull-right red"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Lihat Riwayat</button> 
					                    					</div>	                    			
		                                            	<?php }?>
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