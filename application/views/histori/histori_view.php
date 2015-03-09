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
	                    <div class="col-md-8">
	                     	<h2><?php echo $pasien['id_pasien'].' | '.$pasien['nama_pasien'];?></h2>   
	                        <h5>Welcome, Love to see you back. </h5>
	                        <?php //var_dump($records)?>
	                    </div>
	                    <br>
	                </div>
	                 <!-- /. ROW  -->
	                 <hr />

	                  <div class="row">
	                <div class="col-md-12">
	                    <!-- Advanced Tables -->
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Daftar Histori
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>Tanggal Transaksi</th>
	                                            <th>Catatan</th>
	                                            <th>Layanan</th>
	                      						<th>Resep</th>
	                                            <th>Opsi</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $histori): ?>
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                            <td><?php echo $histori['tanggal_transaksi']?></td>
	                                            <td><?php echo (!empty($histori['histori']['catatan'])) ? $histori['histori']['catatan'] : '' ?></td>
	                                            <td><?php 
	                                            	$j = 1;
	                                            	foreach ($histori['layanan'] as $layanan) {
	                                            		echo $j++.'. '.$layanan['nama_layanan'].'<br>';
	                                            	}
	                                            ?></td>
	                                            <td><?php echo (!empty($histori['histori']['resep'])) ? $histori['histori']['resep'] : '' ;?></td>
	                                            <td class="center">
	                                            	<?php if(empty($histori['id_histori'])) {?>
	                                            	<a class="btn btn-default red pull-right" href="<?php echo base_url('histori/insert/'.$histori['id_transaksi'].'/'.$pasien['id_pasien'])?>">Entri Histori</a>
	                                            	<?php }else{?>
	                                            	<a class="btn btn-default" href="<?php echo base_url('histori/edit/'.$histori['id_histori'].'/'.$pasien['id_pasien']); ?>"><i class="fa fa-edit"></i> Edit</a>
	                                            	<a class="btn btn-default" data-target="#myModal-<?php echo $i?>" data-toggle="modal"><i class="fa fa-trash-o"></i> Hapus</a>
	                                            	<a class="btn btn-default" href="<?php echo base_url('histori/cetak_resep/'.$histori['id_histori'].'/'.$pasien['id_pasien']); ?>" target="_blank"><i class="fa fa-edit"></i> Cetak Resep</a>
	                                            	<div style="display: none;" class="modal fade" id="myModal-<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						                                <div class="modal-dialog">
						                                    <div class="modal-content">
						                                        <div class="modal-header">
						                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						                                            <h4 class="modal-title" id="myModalLabel">Hapus Data histori</h4>
						                                        </div>
						                                        <div class="modal-body">
						                                            Apakah anda yakin akan menghapus data histori ini?
						                                        </div>
						                                        <div class="modal-footer">
						                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						                                            <a class="btn btn-danger" href="<?php echo base_url('histori/delete/'.$histori['id_histori']); ?>">Hapus</a>
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