<?
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include "connectDb.php"; 
	
	$strSQL = "SELECT * FROM user WHERE SID = '".trim($_GET['sid'])."' AND id_user = '".trim($_GET['id_user'])."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult){
?>
	<script>
        alert("ลงทะเบียนไม่สมบูรณ์");
        window.location.href = "index.php";
    </script>
<?
	}else{
		
		$strSQL = "UPDATE user SET Active = 'Yes'  WHERE SID = '".trim($_GET['sid'])."' AND id_user = '".trim($_GET['id_user'])."' ";
		$objQuery = mysql_query($strSQL);

		
?>
	<script>
        alert("ลงทะเบียนเรียบร้อยแล้ว กรุณาเข้าสู่ระบบ");
        window.location.href = "index.php";
    </script>
<?
	}
?>