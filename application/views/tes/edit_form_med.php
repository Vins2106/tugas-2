<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Obat</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <?php foreach($table_med as $m){ ?>
        <form action="<?php echo base_url(). 'example/update_medicine'; ?>" method="post" class="form-horizontal form-label-left" novalidate>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_obat">Nama Obat</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="hidden" name="id_obat" value="<?php echo $m->id_obat ?>">
              <input type="text" id="nama_obat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="nama_obat" required="required" value="<?php echo $m->nama_obat ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penyimpanan">Penyimpanan</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="penyimpanan" name="penyimpanan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $m->penyimpanan ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Banyak Stok</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="stok" name="stok" required="required" data-validate-minmax="0,1000" class="form-control col-md-7 col-xs-12" value="<?php echo $m->stok ?>">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Unit</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="unit" id="unit" class="select2_single form-control" tabindex="-1">
                 <?php foreach ($get_unit as $gu) { ?>
                  <option <?php if($gu == $m->unit)
                  { echo 'selected="selected"'; } ?> value="<?php echo $gu ?>"><?php echo $gu ?> </option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kategori">Kategori</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="nama_kategori" id="nama_kategori" class="select2_single form-control" tabindex="-1">
               
              <?php foreach ($get_cat as $gc) { ?>
              <option <?php if($gc == $m->nama_kategori)
              { echo 'selected="selected"'; } ?> value="<?php echo $gc ?>"><?php echo $gc ?> </option>
              <?php } ?>


            </select>
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kedaluwarsa">Tanggal Kedaluwarsa</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class='input-group date' id='myDatepicker2'>
                  <input type="text" name="kedaluwarsa" id="kedaluwarsa" class="form-control" required="required"value="<?php echo date('d-m-Y',strtotime($m->kedaluwarsa)); ?>">
                  
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="des_obat">Deskripsi</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="des_obat" name="des_obat" class="form-control col-md-7 col-xs-12" value="<?php echo $m->des_obat ?>"></textarea>
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_beli">Harga Beli  (Rp)</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="harga_beli" name="harga_beli" required="required" data-validate-minmax="10,1000000" class="form-control col-md-7 col-xs-12" value="<?php echo $m->harga_beli ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_jual">Harga Jual (Rp)</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" id="harga_jual" name="harga_jual" required="required" data-validate-minmax="10,1000000" class="form-control col-md-7 col-xs-12" value="<?php echo $m->harga_jual ?>">
            </div>
          </div>


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pemasok">Pemasok</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="nama_pemasok" id="nama_pemasok" class="select2_single form-control" tabindex="-1">
                <?php foreach ($get_sup as $gs) { ?>
                <option <?php if($gs == $m->nama_pemasok)
                { echo 'selected="selected"'; } ?> value="<?php echo $gs ?>"><?php echo $gs ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="<?php echo base_url('example/table_med') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
              <button id="send" type="submit" class="btn btn-success">Simpan</button>
              
            </div>
          </div>
        </form>
         <?php } ?>
      </div>
    </div>
  </div>
</div>
