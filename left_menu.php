<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <?
			if($_GET[menu] == 'main'){
				$_SESSION["menu"] = 'main';
				
			}else if($_GET[menu] == 'ream'){
				$_SESSION["menu"] = 'ream';
				
			}else if($_GET[menu] == 'back'){
				$_SESSION["menu"] = 'back';
				
			}else if($_GET[menu] == 'user'){
				$_SESSION["menu"] = 'user';
				
			}else if($_GET[menu] == 'unit'){
				$_SESSION["menu"] = 'unit';
				
			}else if($_GET[menu] == 'app'){
				$_SESSION["menu"] = 'app';

			}else if($_GET[menu] == 'appb'){
				$_SESSION["menu"] = 'appb';

			}else if($_GET[menu] == 'report'){
				$_SESSION["menu"] = 'report';

			}else if($_GET[menu] == 'inmat'){
				$_SESSION["menu"] = 'inmat';

			}
		?>
        <? if($_SESSION["menu"] == 'main'){$ac_main = 'class="active"';} ?>
        <li <?=$ac_main;?>><a href="main.php?menu=main"><i class="fa fa-home"></i> <span>หน้าหลัก</span></a></li>
        
        <? if($_SESSION["status"] == 'ADMIN'){ ?>
        <?
			$strSQLr = "SELECT count(id_ream) as count_id FROM ream where status = '' ";
			$stmtr  = mysql_query($strSQLr);
			$rowr = mysql_fetch_array($stmtr);
			
			$strSQLr2 = "SELECT count(id_ream) as count_id FROM ream where status = 'Y' ";
			$stmtr2  = mysql_query($strSQLr2);
			$rowr2 = mysql_fetch_array($stmtr2);
			
			$strSQLr3 = "SELECT count(id_ream) as count_id FROM ream where status = 'N' ";
			$stmtr3  = mysql_query($strSQLr3);
			$rowr3 = mysql_fetch_array($stmtr3);
			
			$strSQLb = "SELECT count(ream.id_ream) as count_id FROM ream 
						inner join material on (material.id_mat = ream.id_mat) where ream.status = 'B'  ";
			$stmtb  = mysql_query($strSQLb);
			$rowb = mysql_fetch_array($stmtb);
			
			$strSQLb2 = "SELECT count(ream.id_ream) as count_id FROM ream 
						inner join material on (material.id_mat = ream.id_mat) where ream.status = 'BY' ";
			$stmtb2  = mysql_query($strSQLb2);
			$rowb2 = mysql_fetch_array($stmtb2);
			
			$strSQLb3 = "SELECT count(ream.id_ream) as count_id FROM ream 
						inner join material on (material.id_mat = ream.id_mat) where ream.status = 'BN'  ";
			$stmtb3  = mysql_query($strSQLb3);
			$rowb3 = mysql_fetch_array($stmtb3);
		?>
        <? if($_SESSION["menu"] == 'ream'){$ac_ream = 'class="active"';} ?>
        <li <?=$ac_ream;?>><a href="ream.php?menu=ream"><i class="fa fa-hand-lizard-o"></i> <span>เบิกอุปกรณ์กีฬา</span></a></li>
        <? if($_SESSION["menu"] == 'back'){$ac_back = 'class="active"';} ?>
        <li <?=$ac_back;?>><a href="list_ream_back_admin.php?menu=back"><i class="fa fa-share"></i> <span>คืนอุปกรณ์กีฬา</span></a></li>
        <? if($_SESSION["menu"] == 'user'){$ac_user = 'active';} ?>
        <li <?=$ac_user;?>><a href="list_user.php?menu=user"><i class="fa fa-user"></i> <span>ข้อมูลสมาชิก</span></a></li>
        <? if($_SESSION["menu"] == 'unit'){$ac_unit = 'active';} ?>
        <li class="treeview <?=$ac_unit;?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span>จัดการอุปกรณ์กีฬา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_unit.php?menu=unit"><i class="fa fa-circle-o"></i> <span>ชื่อหน่วย</span></a></li>
        	<li><a href="list_material.php?menu=unit"><i class="fa fa-circle-o"></i> <span>ชื่ออุปกรณ์กีฬา</span></a></li>
          </ul>
        </li>
        <? if($_SESSION["menu"] == 'app'){$ac_app = 'active';} ?>
        <li class="treeview <?=$ac_app;?>">
          <a href="#">
            <i class="fa fa-hand-lizard-o"></i> <span>จัดการเบิกอุปกรณ์กีฬา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_ream.php?menu=app"><i class="fa fa-circle-o text-yellow"></i> <span>รอการอนุมัติ</span><small class="label pull-right bg-yellow"><?=$rowr[count_id];?></small></a></li>
        	<li><a href="list_ream_y.php?menu=app"><i class="fa fa-circle-o text-green"></i> <span>ได้รับการอนุมัติ</span><small class="label pull-right bg-green"><?=$rowr2[count_id];?></small></a></li>
            <li><a href="list_ream_n.php?menu=app"><i class="fa fa-circle-o text-red"></i> <span>ไม่อนุมัติ</span><small class="label pull-right bg-red"><?=$rowr3[count_id];?></small></a></li>
          </ul>
        </li>
        <? if($_SESSION["menu"] == 'appb'){$ac_appb = 'active';} ?>
        <li class="treeview <?=$ac_appb;?>">
          <a href="#">
            <i class="fa fa-share"></i> <span>จัดการคืนอุปกรณ์กีฬา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_ream_back.php?menu=appb"><i class="fa fa-circle-o text-yellow"></i> <span>รอการคืน</span><small class="label pull-right bg-yellow"><?=$rowb[count_id];?></small></a></li>
        	<li><a href="list_ream_y_back.php?menu=appb"><i class="fa fa-circle-o text-green"></i> <span>อนุมัติคืน</span><small class="label pull-right bg-green"><?=$rowb2[count_id];?></small></a></li>
            <!--<li><a href="list_ream_n_back.php"><i class="fa fa-circle-o text-red"></i> <span>ไม่อนุมัติคืน</span><small class="label pull-right bg-red"><?=$rowb3[count_id];?></small></a></li>-->
          </ul>
        </li>
        <? if($_SESSION["menu"] == 'inmat'){$ac_inmat = 'class="active"';} ?>
        <li <?=$ac_inmat;?>><a href="list_in_material.php?menu=inmat"><i class="fa fa-download"></i> <span>นำเข้าอุปกรณ์กีฬา</span></a></li>
        <? if($_SESSION["menu"] == 'report'){$ac_report = 'active';} ?>
        <li class="treeview <?=$ac_report;?>">
          <a href="#">
            <i class="fa fa-list-ul"></i> <span>รายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="report_mat.php?menu=report"><i class="fa fa-circle-o"></i> <span>รายงานอุปกรณ์กีฬาคงเหลือ</span></a></li>
        	<li><a href="report_ream.php?menu=report"><i class="fa fa-circle-o"></i> <span>รายงานการเบิกอุปกรณ์กีฬา</span></a></li>
            <li><a href="report_gr.php?menu=report"><i class="fa fa-circle-o"></i> <span>รายงานสถิติการยืมอุปกรณ์กีฬา</span></a></li>
          </ul>
        </li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span></a></li>
        
		<? }else{ ?>
        
        <li <?=$ac_user;?>><a href="profile.php?menu=user"><i class="fa fa-user"></i> <span>ข้อมูลส่วนตัว</span></a></li>
        <li <?=$ac_ream;?>><a href="ream.php?menu=ream"><i class="fa fa-hand-lizard-o"></i> <span>เบิกอุปกรณ์กีฬา</span></a></li>
        <li <?=$ac_back;?>><a href="list_ream_back_user.php?menu=back"><i class="fa fa-share"></i> <span>คืนอุปกรณ์กีฬา</span></a></li>
        <li <?=$ac_ream;?>><a href="list_ream_user.php?menu=ream"><i class="fa fa-list-ul"></i> <span>ประวัติการเบิก</span></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span></a></li>
        
        <? } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->