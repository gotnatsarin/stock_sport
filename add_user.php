<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$sql="Select username from user Where username='".$_POST["username"]."'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
?>
		<script>
			alert("Username มีผู้ใช้งานแล้ว");
			window.location.href = "form_user.php";
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO user (id_user, full_name, email, mobile, username, password, status) VALUES (NULL, '".$_POST["full_name"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["status"]."')";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		}
?>
		<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_user.php";
        </script>
