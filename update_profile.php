<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$strSQL = "update user set user_code='".$_POST["user_code"]."', full_name='".$_POST["full_name"]."', email='".$_POST["email"]."', mobile='".$_POST["mobile"]."' where id_user = '".$_POST["id_user"]."' ";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "profile.php";
        </script>
