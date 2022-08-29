<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Lihat Obat</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix">
				</div>
			</div>

			<div class="x_content">
				<?php if($this->session->flashdata('med_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('med_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>

				<a href="<?php echo base_url('example/form_med') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Obat </button></a>
				
				
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nama Obat</th>
							<th>Penyimpanan</th>
							<th>Kategori</th>
							<th>Stok</th>
							<th>Kedaluwarsa</th>
							<th>Harga Jual</th>
							<th>Unit</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($table_med as $m){ ?>
						<tr>
							<td><?php echo $m->nama_obat ?></td>
							<td><?php echo $m->penyimpanan ?></td>
							<td><?php echo $m->nama_kategori ?></td>
					
							<td><?php echo $m->stok ?></td>
							<td><?php echo date('j F Y',strtotime($m->kedaluwarsa)); ?></td>
							
							<td>Rp <?php echo number_format($m->harga_jual) ?></td>
							<td><?php echo $m->unit ?></td>
							<td style=" text-align: center;">
								<?php echo anchor('example/edit_form_med/'.$m->id_obat, '<button class="btn btn-info btn-xs" type="button"><span class="fa fa-pencil"></span></button>'); ?>
								<?php echo anchor('example/remove_med/'.$m->id_obat, '<button class="btn btn-danger btn-xs" type="button"><span class="fa fa-trash"></span></button>');?>
					         </td>
						</tr>

						<?php } ?>
					</tbody>

				</table>
		</div>
	</div>
</div>

</div>


	


