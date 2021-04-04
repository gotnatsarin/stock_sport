<?
	session_start();
	include "connectDb.php"; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_SESSION["title"];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <? include 'top_menu.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <? include 'left_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--<h1>
        เบิกวัสดุ-อุปกรณ์กีฬาประปา
        <small></small>
      </h1>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header label-primary">
              <h3 class="box-title">รายการการเบิกอุปกรณ์กีฬา</h3>
            </div>
            <!-- /.box-header -->
            <form action="">
            <div class="box-body">
               <div class="col-md-2">
                  <div class="form-group">
                    <label>วันที่</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" value="<?=$_GET[start_date];?>">
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                    <label>ถึงวันที่</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" value="<?=$_GET[end_date];?>">
                  </div>
               </div>
               <!--<div class="col-md-2">
               		<div class="form-group">
                    	<label>ประเภทวัสดอุปกรณ์กีฬา</label>
                        <select name="type_mat" id="type_mat" class="form-control">
                            <option value="">--เลือกประเภท--</option>
                            <option value="1" <? if($_GET[type_mat] == 1){ echo 'selected'; } ?>>วัสดุ</option>
                            <option value="2" <? if($_GET[type_mat] == 2){ echo 'selected'; } ?>>อุปกรณ์กีฬา</option>
                        </select>
                    </div>
               </div>-->
               <div class="col-md-3">
               		<div class="form-group">
                    	<label>ชื่ออุปกรณ์กีฬา</label>
                        <input type="text" class="form-control" name="name_material" id="name_material" value="<?=$_GET[name_material];?>">
                    </div>
               </div>
               <div class="col-md-3">
               		<div class="form-group">
                    	<label>ชื่อผู้เบิก</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" value="<?=$_GET[user_name];?>">
                    </div>
               </div>
               <div class="col-md-12">
               		<div class="form-group">
              			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> ค้นหารายงาน</button>
                    </div>
               </div>
              
            
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center;" width="5%">ลำดับ</th>
                  <th style="text-align:center;" width="15%">ผู้เบิก</th>
                  <th style="text-align:center;" width="15%">ชื่ออุปกรณ์กีฬา</th>
                  <th style="text-align:center;" width="10%">จำนวน</th>
                  <th style="text-align:center;" width="15%">วัถตุประสงค์</th>
                  <th style="text-align:center;" width="10%">วันที่เบิก</th>
                  <th style="text-align:center;" width="10%">วันที่คืน</th>
                  <th style="text-align:center;" width="10%">การอนุมัติ</th>
                </tr>
                </thead>
                <tbody>
                <?
					if($_GET["start_date"] != ""){
						if($_GET["end_date"] == ""){
							echo "<script>
								alert('กรุณาเลือกวันสิ้นสุด');
								window.location.href = 'report_ream.php';
							</script>";
						}else if($_GET["end_date"] < $_GET["start_date"]){
							echo "<script>
								alert('เลือกวันที่สิ้นสุดผิด ต้องเลือกวันที่สิ้นสุดมากกว่าวันเริ่มต้น');
								window.location.href = 'report_ream.php';
							</script>";
						}else{
							$search .= " AND ream.date_ream BETWEEN '".$_GET["start_date"]."' AND '".$_GET["end_date"]."' ";
						}
					}
					if($_GET["end_date"] != ""){
						if($_GET["start_date"] == ""){
							echo "<script>
								alert('กรุณาเลือกวันเริ่มต้น);
								window.location.href = 'report_ream.php';
							</script>";
						}else{
							$search .= " AND ream.date_ream BETWEEN '".$_GET["start_date"]."' AND '".$_GET["end_date"]."' ";
						}
					}
					/*if($_GET["type_mat"] != ""){
						$search .= " AND material.type_mat = '".$_GET["type_mat"]."' ";
					}*/
					if($_GET["name_material"] != ""){
						$search .= " AND material.name_material LIKE '%".$_GET["name_material"]."%' ";
					}
					if($_GET["user_name"] != ""){
						$strSQLusers = "SELECT * FROM user where full_name LIKE '%".$_GET["user_name"]."%' ";
						$stmtusers  = mysql_query($strSQLusers);
						$rowusers = mysql_fetch_array($stmtusers);

						$search .= " AND ream.id_user = '".$rowusers["id_user"]."' ";
					}
					
					$num=1;
					$strSQLr = "SELECT * FROM ream 
								inner join material on (material.id_mat = ream.id_mat) where material.id_mat != '' $search ORDER BY  ream.date_ream DESC ";
					$stmtr  = mysql_query($strSQLr);
					while($rowr = mysql_fetch_array($stmtr)){
						$strSQLur = "SELECT * FROM unit where id_unit = '".$rowr[id_unit]."' ";
						$stmtur  = mysql_query($strSQLur);
						$rowur = mysql_fetch_array($stmtur);
						
						$strSQLuser = "SELECT * FROM user where id_user = '".$rowr[id_user]."' ";
						$stmtuser  = mysql_query($strSQLuser);
						$rowuser = mysql_fetch_array($stmtuser);
				?>
                <tr>
                  <td style="text-align:center;"><?=$num;?></td>
                  <td><?=$rowuser[full_name];?></td>
                  <!--<td style="text-align:center;">
                  	<?
						if($rowr[type_mat] == 1){
							echo 'วัสดุประปา';
						}else{
							echo 'อุปกรณ์กีฬา';
						}
							
					?>
                  </td>-->
                  <td><?=$rowr[name_material];?></td>
                  <td style="text-align:center;"><?=$rowr[num_ream];?> <?=$rowur[name_unit];?></td>
                  <td><?=$rowr[detail];?></td>
                  <td style="text-align:center;"><?=date('d/m/Y', strtotime($rowr[date_ream]));?></td>
                  <td style="text-align:center;">
                  	<?
						if($rowr[type_mat] == 1){
							echo '-';
						}else{
							if($rowr[date_back] == '0000-00-00' && $rowr[status] == 'Y'){
								echo '<div class="label label-warning">รอคืน</div>';
							}else if($rowr[date_back] == '0000-00-00' && $rowr[status] == 'N'){
								echo '<div class="label label-danger">ไม่อนุมัติ</div>';
							}else if($rowr[date_back] == '0000-00-00' && $rowr[status] == ''){
								echo '<div class="label label-warning">รออนุมัติ</div>';
							}else if($rowr[status] == 'BN'){
								echo '<div class="label label-danger">ไม่รับคืน</div>';
							}else{
								echo date('d/m/Y', strtotime($rowr[date_back]));
							}
						}
							
					?>
                  </td>
                  <td style="text-align:center;">
                  	<?
						if($rowr[status] == ''){
                  			echo '<div class="label label-warning">รออนุมัติ</div>';
						}else if($rowr[status] == 'Y'){
                  			echo '<div class="label label-success">อนุมัติ</div>';
						}else if($rowr[status] == 'N'){
                  			echo '<div class="label label-danger">ไม่อนุมัติ</div>';
						}else if($rowr[status] == 'B'){
                  			echo '<div class="label label-warning">รออนุมัติรับคืน</div>';
						}else if($rowr[status] == 'BN'){
                  			echo '<div class="label label-danger">ไม่รับคืน</div>';
						}else if($rowr[status] == 'BY'){
                  			echo '<div class="label label-success">รับคืน</div>';
						}
                    ?>
                  </td>
                </tr>
                <? $num++; } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <? include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    /*$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });*/
  });
</script>
<script>
  $(function () {
    $("#stock_v").DataTable();
	$("#stock_p").DataTable();
	$("#ream_stock").DataTable();
	$("#ream_stock_p").DataTable();
  });
</script>
</body>
</html>
