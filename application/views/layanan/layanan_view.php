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
	                     	<h2>Daftar Layanan</h2>   
	                        <h5>Welcome , Love to see you back. </h5>
	                    </div>
	                    <br>
	                    <div class="col-md-6 center">
	                     	<a class="btn btn-lg pull-right red" href="<?php echo base_url('layanan/insert')?>"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Entri layanan</a> 
	                    </div>
	                </div>
	                 <!-- /. ROW  -->
	                 <hr />

	                  <div class="row">
	                <div class="col-md-12">
	                    <!-- Advanced Tables -->
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Daftar Layanan
	                        </div>
	                        <div class="panel-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>No.</th>
	                                            <th>Nama</th>
	                                            <th>Tarif</th>
	                                            <th>Opsi</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	<?php 
	                                    	$i = 1;
	                                    	foreach($records as $layanan): ?>
	                                        <tr class="<?php echo ($i%2==0) ? 'even' : 'odd'; ?> gradeX">
	                                            <td><?php echo $layanan['id_layanan'] ; ?></td>
	                                            <td><?php echo $layanan['nama_layanan'] ;?></td>
	                                            <td><?php echo $layanan['tarif_layanan'] ;?></td>
	                                            <td class="center">
	                                            	<a class="btn btn-default" href="<?php echo base_url('layanan/edit/'.$layanan['id_layanan']); ?>"><i class="fa fa-edit"></i> Edit</a>
	                                            	<a class="btn btn-default" data-target="#myModal-<?php echo $i?>" data-toggle="modal"><i class="fa fa-trash-o"></i> Hapus</a>
	                                            	<div style="display: none;" class="modal fade" id="myModal-<?php echo $i++?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						                                <div class="modal-dialog">
						                                    <div class="modal-content">
						                                        <div class="modal-header">
						                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						                                            <h4 class="modal-title" id="myModalLabel">Hapus Data layanan</h4>
						                                        </div>
						                                        <div class="modal-body">
						                                            Apakah anda yakin akan menghapus data layanan ini?
						                                        </div>
						                                        <div class="modal-footer">
						                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						                                            <a class="btn btn-danger" href="<?php echo base_url('layanan/delete/'.$layanan['id_layanan']); ?>">Hapus</a>
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
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