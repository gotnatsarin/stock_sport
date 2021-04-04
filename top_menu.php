<header class="main-header">
    <!-- Logo -->
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?
		  	if($_SESSION["status"] == 'ADMIN'){
				$strSQLr = "SELECT count(id_ream) as count_id FROM ream where status = '' ";
				$stmtr  = mysql_query($strSQLr);
				$rowr = mysql_fetch_array($stmtr);
				
		  ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              เบิกอุปกรณ์กีฬา <i class="fa fa-bell-o"></i> 
              <span class="label label-warning"><?=$rowr[count_id];?></span> 
            </a>
            <ul class="dropdown-menu">
              <li class="header">รออนุมัติการเบิก <?=$rowr[count_id];?> รายการ</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?
				  	$strSQLlr = "SELECT * FROM ream 
									inner join material on (ream.id_mat = material.id_mat) where ream.status = ''  ";
					$stmtlr  = mysql_query($strSQLlr);
					while($rowlr = mysql_fetch_array($stmtlr)){
						$strSQLur = "SELECT * FROM unit where id_unit = '".$rowlr[id_unit]."' ";
						$stmtur  = mysql_query($strSQLur);
						$rowur = mysql_fetch_array($stmtur);
				  ?>
                  <li>
                    <a href="list_ream.php">
                      <i class="fa fa-warning text-yellow"></i> <?=$rowlr[name_material];?> <?=$rowlr[num_ream];?> <?=$rowur[name_unit];?>
                    </a>
                  </li>
                  <? } ?>
                </ul>
              </li>
            </ul>
          </li>
          <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
          <?
				$strSQLrb = "SELECT count(id_ream) as count_id FROM ream where status = 'B' ";
				$stmtrb  = mysql_query($strSQLrb);
				$rowrb = mysql_fetch_array($stmtrb);
          ?> 
               
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              คืนอุปกรณ์กีฬา <i class="fa fa-share"></i> 
              <span class="label label-warning"><?=$rowrb[count_id];?></span> 
            </a>
            <ul class="dropdown-menu">
              <li class="header">รออนุมัติการคืน <?=$rowrb[count_id];?> รายการ</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?
				  	$strSQLlr = "SELECT * FROM ream 
									inner join material on (material.id_mat = ream.id_mat) where ream.status = 'B'  ";
					$stmtlr  = mysql_query($strSQLlr);
					while($rowlr = mysql_fetch_array($stmtlr)){
						$strSQLur = "SELECT * FROM unit where id_unit = '".$rowlr[id_unit]."' ";
						$stmtur  = mysql_query($strSQLur);
						$rowur = mysql_fetch_array($stmtur);
				  ?>
                  <li>
                    <a href="list_ream_back.php">
                      <i class="fa fa-warning text-yellow"></i> <?=$rowlr[name_material];?> <?=$rowlr[num_ream];?> <?=$rowur[name_unit];?>
                    </a>
                  </li>
                  <? } ?>
                </ul>
              </li>
            </ul>
          </li>
          <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
		  <?
		  	$strSQLqty = "SELECT * FROM material  ";
			$stmtqty  = mysql_query($strSQLqty);
			while($rowqty = mysql_fetch_array($stmtqty)){
				$strSQL_ream_qty = "SELECT sum(num_ream) as sum_ream FROM ream where id_mat = '".$rowqty[id_mat]."' and status != 'N' and status != 'B' and status != 'BN' ";
				$stmt_ream_qty  = mysql_query($strSQL_ream_qty);
				$row_ream_qty = mysql_fetch_array($stmt_ream_qty);
				$sum_ream_qty = $rowqty[stock_qty]-$row_ream_qty[sum_ream];
				if($sum_ream_qty<=$rowqty[reorder_point]){
					$qty=$qty+1;
				}
			}
		  ?>

           <!--<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              วัสดุอุปกรณ์กีฬาใกล้หมด <i class="fa fa-inbox"></i>
              <span class="label label-danger"><?=$qty;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">วัสดุอุปกรณ์กีฬาใกล้หมด <?=$qty;?> รายการ</li>
              <li>
                <ul class="menu">
                  <?
				  	$strSQLmin = "SELECT * FROM material ";
					$stmtmin  = mysql_query($strSQLmin);
					while($rowmin = mysql_fetch_array($stmtmin)){
						$strSQL_ream = "SELECT sum(num_ream) as sum_ream FROM ream where id_mat = '".$rowmin[id_mat]."' and status != 'N' and status != 'B' and status != 'BN' ";
						$stmt_ream  = mysql_query($strSQL_ream);
						$row_ream = mysql_fetch_array($stmt_ream);

						$strSQLum = "SELECT * FROM unit where id_unit = '".$rowmin[id_unit]."' ";
						$stmtum  = mysql_query($strSQLum);
						$rowum = mysql_fetch_array($stmtum);
						
						$sum_ream = $rowmin[stock_qty]-$row_ream[sum_ream];
						if($sum_ream<=$rowmin[reorder_point]){
				  ?>
                  <li>
                    <a href="form_addin_mat.php?id_mat=<?=$rowmin[id_mat];?>">
                      <i class="fa fa-warning text-yellow"></i> <?=$rowmin[name_material];?> <font color="#FF0000"><?=$rowmin[stock_qty];?> <?=$rowum[name_unit];?></font>
                    </a>
                  </li>
                 	 <? } ?>
                  <? } ?>
                </ul>
              </li>
            </ul>
          </li>-->
          
          <? } ?>  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?=$_SESSION["full_name"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  <?=$_SESSION["full_name"];?><br />
                  <? echo 'Mobil: '.$_SESSION["mobile"];?>
                  <small><? echo 'Email: '.$_SESSION["email"];?></small>
                </p>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>