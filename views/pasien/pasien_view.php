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
	                                            <td><?php echo $pasien['id_pasien'] ; ?></td>
	                                            <td><?php echo $pasien['nama_pasien'] ;?></td>
	                                            <td><?php echo $pasien['alamat_pasien'] ;?></td>
	                                            <td><?php echo $pasien['telp_pasien'] ;?></td>
	                                            <td class="center">
	                                            	<?php if($this->ion_auth->in_group('dokter')) {?>
	                                            	<a class="btn btn-default" href="<?php echo base_url('histori/index/'.$pasien['id_pasien']); ?>"><i class="fa fa-edit"></i> Lihat Riwayat</a>
	                                            	<?php }else{?>
	                                            	<a class="btn btn-default" href="<?php echo base_url('pasien/edit/'.$pasien['id_pasien']); ?>"><i class="fa fa-edit"></i> Edit</a>
	                                            	<a class="btn btn-default" data-target="#myModal-<?php echo $i?>" data-toggle="modal"><i class="fa fa-trash-o"></i> Hapus</a>
	                                            	<?php if(!$this->ion_auth->is_admin()) {?>
	                                            	<a class="btn btn-default" href="<?php echo base_url('pasien/cetak_kartu/'.$pasien['id_pasien']); ?>"><i class="fa fa-edit"></i> Cetak Kartu Pasien</a>
	                                            	<?php }?>
	                                            	<div style="display: none;" class="modal fade" id="myModal-<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						                                <div class="modal-dialog">
						                                    <div class="modal-content">
						                                        <div class="modal-header">
						                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						                                            <h4 class="modal-title" id="myModalLabel">Hapus Data Pasien</h4>
						                                        </div>
						                                        <div class="modal-body">
						                                            Apakah anda yakin akan menghapus data pasien ini?
						                                        </div>
						                                        <div class="modal-footer">
						                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						                                            <a class="btn btn-danger" href="<?php echo base_url('pasien/delete/'.$pasien['id_pasien']); ?>">Hapus</a>
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                            <?php }?>
	                                            </td>
	                                        </tr>
	                                        
	                                        <?php endforeach; ?>
	                                    </tbody>
	                                </table>
	                                <?php if($this->ion_auth->in_group('dokter')) {?>
	                                <h3>Filter:</h3>
	                                <a class="btn btn-default" href="<?php echo base_url('pasien/historibulan'); ?>"><i class="fa fa-edit"></i>Berdasarkan Bulan</a>
	                                <a class="btn btn-default" href="<?php echo base_url('pasien/historilayanan'); ?>"><i class="fa fa-edit"></i> Berdasarkan Layanan</a>
	                                <?php } ?>
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