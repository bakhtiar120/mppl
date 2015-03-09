<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <!--<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>-->
				
					<?php if($this->ion_auth->in_group('resepsionis') || $this->ion_auth->is_admin()) {?>
                    <li style="margin-top:20px;">
                        <a href="<?php echo base_url('transaksi')?>"><i class="fa fa-desktop fa-3x"></i> Transaksi Konsultasi</a>
                    </li><?php }?>
                    <li>
                        <a  href="<?php echo base_url('pasien')?>"><i class="fa fa-wheelchair fa-3x"></i> Pasien</a>
                    </li>
                    <?php if($this->ion_auth->is_admin()) {?>
                    <li>
                        <a  href="<?php echo base_url('layanan')?>"><i class="fa fa-plus-circle fa-3x"></i> Layanan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('dokter')?>"><i class="fa fa-user-md fa-3x"></i> Dokter</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-bar-chart-o fa-3x"></i> Laporan<span class="fa fa-chevron-circle-down pull-right"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('transaksi/laporan')?>">Transaksi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pasien/laporan')?>">Data Pasien</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('dokter/laporan')?>">Data Dokter</a>
                            </li>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->