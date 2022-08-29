<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>
			<ul class="nav navbar-nav navbar-right">
				<li>
				</li>

				<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o" style="font-size: 18px"></i>
                    <span class="badge bg-red" ><?php $nulltol = $nullex + $nullstock ; if ($nulltol > 0) echo $nulltol ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a href="<?php echo base_url('example/table_exp') ?>">
                        <span class="fa fa-warning" style="font-size: 18px;"></span>
                        <span style="font-size: 15px;">
                          <span> Kedaluwarsa</span>
                          <span class="time"><?php echo $nullex ?> obat</span>
                        </span>
                        <span class="message">
                          Obat sudah kedaluwarsa...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('example/table_stock') ?>">
                        <span class="fa fa-warning" style="font-size: 18px;"></span>
                        <span style="font-size: 15px;">
                          <span> Habis</span>
                          <span class="time"><?php echo $nullstock ?> obat</span>
                        </span>
                        <span class="message">
                          Obat sudah habis...
                        </span>
                      </a>
                    </li>
                    
                   
                    
                  </ul>
                </li>
			</ul>
		</nav>
	</div>
</div>