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
	                     	<h2>Laporan Data Dokter</h2>   
	                        <h5>Welcome, Love to see you back. </h5>
	                    </div>
	                    <br>
	                    <div class="col-md-6 center">
	                     	<a class="btn btn-lg pull-right red" href="<?php echo base_url('dokter/cetak_laporan');?>" target="_blank"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cetak Laporan Dokter</a> 
	                    </div>
	                </div>
	                 <!-- /. ROW  -->
	                 <hr />

	                  <div class="row">
	                <div class="col-md-12">
	                    <!-- Advanced Tables -->
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Daftar Dokter
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>ID</th>
	                                            <th>Nama</th>
	                                            <th>Alamat</th>
	                                            <th>Telp</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $dokter): ?>
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                            <td><?php echo $dokter['id_dokter']; ?></td>
	                                            <td><?php echo $dokter['nama_dokter'] ;?></td>
	                                            <td><?php echo $dokter['alamat_dokter'] ;?></td>
	                                            <td><?php echo $dokter['telp_dokter'] ;?></td>
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