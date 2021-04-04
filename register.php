<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบจัดการยืม-คืน อุปกรณ์กีฬา</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <script language="JavaScript">
  function check_form(){
	  var txtForJs2=document.frmMain.user_code.value;
	  if(txtForJs2.length < 13){
		  alert("กรุณากรอกเลขบัตรให้ครับ 13 หลัก");
		  document.frmMain.user_code.focus();
		  return false;
	  } 
	  document.frmMain.submit();
  }
  function chkNumber(ele)
  {
  	var vchar = String.fromCharCode(event.keyCode);
 	 if ((vchar<'0' || vchar>'9') && (vchar != '.')){
		alert("กรุณากรอกเฉพาะตัวเลขเท่านั้น");
		return false;
	 }else{
  		ele.onKeyPress=vchar;
	 }
  }
</script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>สมัครสมาชิก</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">กรอกรายละเอียด</p>

    <form action="add_register.php" method="post" name="frmMain" onsubmit="return check_form();" >
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user_code" id="user_code" placeholder="เลขบัตรประชาชน" OnKeyPress="return chkNumber(this)" maxlength="13" required>
        <span class="fa fa-photo form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="ชื่อ-นามสกุล" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="mobile" placeholder="เบอร์โทรศัพท์" OnKeyPress="return chkNumber(this)" maxlength="10" required>
        <span class="fa fa-mobile form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="fa fa-key form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="status" id="status" class="form-control">
            <option value="">--เลือกสิทธิการใช้งาน--</option>
            <option value="ADMIN">บุคลากร</option>
            <option value="USER">อาจารย์</option>
            <option value="STUDENT">นักศึกษา</option>
        </select>
      </div>
      
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block">สมัครสมาชิก</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <a href="index.php" class="btn btn-block btn-danger">ย้อนกลับ</a>
    </div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
