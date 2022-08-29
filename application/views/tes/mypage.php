<div>

<?php if ($nullstock > 0): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Peringatan',
                                  text: 'Obat sudah habis...',
                                  type: 'error',
                                 
                                  styling: 'bootstrap3'
                              });">Error</button>
                  
        <?php endif; ?>

<?php if ($nullex > 0): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Peringatan',
                                  text: 'Obat sudah kedaluwarsa...',
                                  
                                 
                                  styling: 'bootstrap3'
                              });">Error</button>
                  
        <?php endif; ?>

<!-- top tiles -->
          <div class="row tile_count" style="text-align: center;">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-medkit"></i> Total Obat</span>
              <div class="count"><?php echo $stockobat ?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-hospital-o"></i> Total Kategori</span>
              <div class="count"><?php echo $stockkat ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pemasok</span>
              <div class="count"><?php echo $sup ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-edit"></i> Total Unit</span>
              <div class="count"><?php echo $unit ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-edit"></i> Total Penjualan</span>
              <div class="count"><?php echo ($totinv/1000) ?>k</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-edit"></i> Total Pembelian</span>
              <div class="count"><?php echo ($totpur/1000) ?>k</div>
            </div>

          </div>

          <!-- /top tiles -->


          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('example/form_med') ?>">
                  <div class="tile-stats">
                    <h3>Obat</h3>
                    <p>Menambahkan obat baru</p>
                  </div>
                  </a>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('example/form_cat') ?>">
                  <div class="tile-stats">
                    <h3>Kategori</h3>
                    <p>Menambahkan kategori obat baru</p>
                  </div>
                  </a>
                </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('example/form_sup') ?>">
                  <div class="tile-stats">
                    <h3>Pemasok</h3>
                    <p>Menambahkan pemasok baru</p>
                  </div>
                  </a>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?php echo base_url('example/form_invoice') ?>">
                <div class="tile-stats">
                    <h3>Penjualan</h3>
                    <p>Menambahkan penjualan baru</p>
                  </div>
                </a>
                </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?php echo base_url('example/table_exp') ?>">
                  <div class="tile-stats">
                    <h3>Kedaluwarsa</h3>
                    <p>Banyak obat yang kedaluwarsa</p>
                  </div>
                </a>
                </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('example/table_stock') ?>">
                  <div class="tile-stats">
                    <h3>Habis</h3>
                    <p>Melihat stok obat yang habis</p>
                  </div>
                  </a>
                </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <a href="<?php echo base_url('example/report') ?>">
                  <div class="tile-stats">
                    <h3>Laporan</h3>
                    <p>Transaksi penjualan obat</p>
                  </div>
                </a>
                </div>


                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <a href="<?php echo base_url('example/form_purchase') ?>">
                  <div class="tile-stats">                    <h3>Pembelian</h3>
                    <p>Menambahkan pembelian baru</p>
                  </div>
                </div>
              </a>
            </div>

  <div>
    
  </div>


<br>
</div>
