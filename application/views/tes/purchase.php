<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pembelian Obat</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <section class="content invoice">
          <!-- title row -->
          <?php foreach($table_purchase as $p){ ?>
          <div class="row">
            <div class="col-xs-12 invoice-header">
              <h1>
                              <i class="fa fa-globe"></i> Invoice.
                              <small class="pull-right"></small>
                          </h1>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Ke
              <address>
                              <strong>RSH Prof. Soeparwi</strong>
                              <br>Jalan Yacaranda, Sekip Unit II
                              <br>Yogyakarta 55281
                              <br>Telp: 0274 564707
                             
                          </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Dari
              <address>
                              <strong><?php echo $p->nama_pemasok ?></strong>
                              
                              <br>Yogyakarta
                              
                          </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice: #<?php echo $p->ref ?></b>
              <br>
              <b>Total Pembelian: <?php echo $p->banyak ?></b> 
              <br>
              <b>Tanggal: <?php echo date('j F Y',strtotime($p->tgl_beli)) ?></b>
              <br>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
           <?php } ?>

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table">
              <table class="table table-striped">
                <thead>
                  <tr>
                    
                    <th>Nama Obat</th>
                    <th>Harga pemasok</th>
                    <th>Banyak</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($show_invoice as $si){ ?>
                  <tr>
                    <td><?php echo $si->nama_obat ?></td>
                    <td>Rp <?php echo number_format($si->harga_beli) ?></td>
                    <td><?php echo $si->banyak ?></td>
                    
                    <td>Rp <?php echo number_format($si->subtotal) ?></td>
                  </tr>
                  
                  <?php } ?>
                </tbody>
                <tfoot>
                  <?php foreach($table_purchase as $i){ ?>
                    <tr>
          <td style="text-align:center; vertical-align: middle" colspan="3"><b>Grand Total</b></td>
          <td>
            <b>Rp <?php echo number_format($p->grandtotal) ?></b>
          </td>
        </tr>
        <?php } ?>
                  </tfoot>

              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              
              
              
            </div>
            <!-- /.col -->
            
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Cetak</button>
              
            </div>
          </div>
         
        </section>
      </div>
    </div>
  </div>
</div>