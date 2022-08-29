<div class="col-md-3 left_col menu_fixed">
	<div class="left_col scroll-view">
		<div class="clearfix"></div>
		<br>
		<!-- Sidebar Menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3></h3>
				<ul class="nav side-menu">

					<li><a href="<?php echo base_url('') ?>"><i class="fa fa-home"></i> Beranda </a></li>
					<li><a><i class="fa fa-medkit"></i> Obat <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('example/form_med') ?>">Tambah Obat</a></li>
							<li><a href="<?php echo base_url('example/table_med') ?>">Lihat Obat</a></li>
							<li><a href="<?php echo base_url('example/table_exp') ?>">Obat Kedaluwarsa</a></li>
							<li><a href="<?php echo base_url('example/table_stock') ?>">Obat Habis</a></li>
							
						</ul>
					</li>
					<li><a><i class="fa fa-hospital-o"></i> Kategori & Unit <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('example/form_cat') ?>">Tambah Kategori</a></li>
							<li><a href="<?php echo base_url('example/table_cat') ?>">Lihat Kategori</a></li>
							<li><a href="<?php echo base_url('example/form_unit') ?>">Tambah Unit</a></li>
							<li><a href="<?php echo base_url('example/table_unit') ?>">Lihat Unit</a></li>
							
						</ul>
					</li>

					<li><a><i class="fa fa-users"></i> Pemasok <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('example/form_sup') ?>">Tambah Pemasok</a></li>
                    		<li><a href="<?php echo base_url('example/table_sup') ?>">Lihat Pemasok</a></li>
						</ul>
					</li>

				
					<li><a><i class="fa fa-edit"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    	<li><a href="<?php echo base_url('example/form_invoice') ?>">Tambah Penjualan</a></li>
                    	<li><a href="<?php echo base_url('example/table_invoice') ?>">Lihat Penjualan</a></li>
                    	<li><a href="<?php echo base_url('example/invoice_report') ?>">Grafik Penjualan</a></li>
                    </ul>
                  </li>


                  <li><a><i class="fa fa-shopping-cart"></i> Pembelian <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('example/form_purchase') ?>">Tambah Pembelian</a></li>
							<li><a href="<?php echo base_url('example/table_purchase') ?>">Lihat Pembelian</a></li>
							<li><a href="<?php echo base_url('example/purchase_report') ?>">Grafik Pembelian</a></li>
							
							
						</ul>
					</li>


					<li><a href="<?php echo base_url('example/report') ?>"><i class="fa fa-bar-chart"></i> Laporan </a></li>

				</ul>
			</div>
		</div>
		

	</div>
</div>