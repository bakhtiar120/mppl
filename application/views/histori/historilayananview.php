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
					<form action="<?php echo base_url('pasien/cetak_riwayat_pasien_layananview')?>" method="POST" role="form">         
					<div class="row">
	                    <div class="col-md-9">
	                     	<h2>Daftar Riwayat Pasien Berdasarkan Layanan</h2>   
	                        <h5>Welcome, Love to see you back. </h5>
	                    </div>
                        <?php if(isset($records) && !empty($records)) {?>
                        <div class="col-md-3">
     						<button type="submit" class="btn btn-lg pull-right red"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cetak Riwayat</button> 
    					</div>
    					<?php }?>
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
	                            Daftar Riwayat Pasien <?php echo (isset($namapasien)) ? $namapasien : '' ;?>
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
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
	                                            	<input class="form-control" name="layanan" value="<?php echo (isset($pasien)) ? $pasien['id_layanan'] : ''; ?>" type="hidden">
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
	                            </div>
	                            
	                        </div>
	                    </div>
	                    <!--End Advanced Tables -->
	                </div>
	            </div>
	                <!-- /. ROW  -->

	            </form>
				</div>
			</div>
			
		</div>
		<?php $this->load->view('layout/general_js'); ?>
	</body>
</html>