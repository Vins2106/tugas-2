<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph x_panel">
      <div class="row x_title">
        <div class="col-md-6">
          <h4>Grafik Penjualan dan Pembelian</h4>
        </div>
        <div class="col-md-2 pull-right">
          <div class='input-group date ' id='gabung'>
            <input type="text" name="tahun_beli" id="tahun_beli" class="form-control tahun_beli" required="required" placeholder="Pilih tahun">
              <span class="input-group-addon">
                 <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
      </div>
      <div class="x_content">
        	<canvas id="report" width="900" height="300"></canvas>
      </div>
    </div>
  </div>
</div>



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Laporan Penjualan dan Pembelian</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Bulan</th>
							<th>Penjualan</th>
							<th>Pembelian</th>
							<th>Laba</th>

						</tr>
					</thead>
					<tbody id="laba">
						
					</tbody>
					<tfoot id="labatotal">
						
					</tfoot>
				</table>

			</div>
		</div>
	</div>


	