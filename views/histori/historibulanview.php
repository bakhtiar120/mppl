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
	                     	<h2>Daftar Riwayat Pasien Berdasarkan Waktu</h2>   
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
	                        	<?php foreach($records as $riwayat)
								
  									$namapasien=$riwayat["nama_pasien"];
								?>
	                            Daftar Riwayat Pasien <?php echo $namapasien;?>
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                            	<form action="<?php echo base_url('pasien/cetak_riwayat_pasien_bulanview')?>" method="POST" role="form">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>No.</th>
	                                            <th>Tanggal Histori</th>
	                                            <th>Nama Layanan</th>
	                                            <th>Resep</th>
	                                            <th>Catatan</th>
	                                            
	                                           
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $pasien): ?>
	                                    	<div class="form-group">
	                                            	<input class="form-control" name="id_pasien" value="<?php echo (isset($pasien)) ? $pasien['id_pasien'] : ''; ?>" type="hidden">
	                                         </div>
	                                         <div class="form-group">
	                                            	<input class="form-control" name="bulan" value="<?php echo (isset($pasien)) ? $pasien['tanggal_histori'] : ''; ?>" type="hidden">
	                                         </div>
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                        	<td><?php echo $i++ ; ?></td>
	                                            <td><?php echo $pasien['tanggal_histori'] ; ?></td>
	                                            <td><?php echo $pasien['nama_layanan'] ;?></td>
	                                             <td><?php echo $pasien['resep'] ;?></td>
	                                            <td><?php echo $pasien['catatan'] ;?></td>
	                                            
	                                        </tr>
	                                        
	                                        <?php endforeach; ?>
	                                    </tbody>
	                                </table>
	                                <div class="col-md-3">
		                     						<button type="submit" class="btn btn-lg pull-right red"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cetak Riwayat</button> 
		                    					</div>
	                               </form>
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