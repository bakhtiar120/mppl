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
	                    <div class="col-md-5">
	                     	<h2>Laporan Transaksi</h2>   
	                        <h5>Welcome , Love to see you back. </h5>
	                    </div>
	                    <br>
	                    <form action="<?php echo base_url('transaksi/cetak_laporan')?>" method="POST">
		                    <div class="col-md-3">
		                    	<div class="form-group">
		                    		<label>Pilih Bulan</label>
		                    		<input type="text" name="bulan" class="form-control datepicker-month">
		                    	</div>	
		                    </div>
		                    <br>
		                    <div class="col-md-3 col-md-offset-1">
		                     	<button type="submit" class="btn btn-lg pull-right red"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Cetak Laporan Transaksi</button> 
		                    </div>
		                </form>
	                </div>
	                 <!-- /. ROW  -->
	                 <hr />

	                  <div class="row">
	                <div class="col-md-12">
	                    <!-- Advanced Tables -->
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Daftar Transaksi
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>No.</th>
	                                            <th>Tanggal</th>
	                                            <th>Nama Pasien</th>
	                                            <th>Dokter</th>
	                                            <th>Layanan</th>
	                                            <th>Total</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $transaksi): ?>
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                            <td><?php echo $transaksi['id_transaksi']; ?></td>
	                                            <td><?php echo $transaksi['tanggal_transaksi']; ?></td>
	                                            <td><?php echo $transaksi['nama_pasien'] ;?></td>
	                                            <td><?php echo $transaksi['nama_dokter'] ;?></td>
	                                            <td><?php 
	                                            	$j = 1;
	                                            	foreach ($transaksi['layanan'] as $layanan) {
	                                            		echo $j++.'. '.$layanan['nama_layanan'].'<br>';
	                                            	}
	                                            ?>
	                                            </td>
	                                            <td><?php echo $transaksi['total_pembayaran']['total_pembayaran']?></td>
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