<?
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	include "connectDb.php"; 
	
	$query = "SELECT * FROM user WHERE username = '".$_POST["user"]."' AND password = '".$_POST["pass"]."' ";
			
	$objQuery = mysql_query($query) or die ("Error Query [".$query."]");
	$row = mysql_fetch_array($objQuery);

	$strAdd = $row['status'];
		if($strAdd == ''){
	?>
			<script>
            	alert("Username/Password Unknow !!");
            	window.location.href = 'index.php';
            </script>
    <?  
		}
		if($strAdd == 'CANCEL'){ 
 ?> 
				<script> 
            	alert("Username นี่ถูกระงับการใช้งาน !!"); 
            	window.location.href = 'index.php'; 
            </script> 
	<? 
		}else{
			if($row['Active'] == 'No'){ 
 ?> 
   			<script> 
            	alert("คุณยังไม่ได้ยืนยันตัวตน กรุณายืนยันที่ Email : <?=$row['email'];?>"); 
             	window.location.href = 'index.php'; 
            </script>
<?
			}else{
	
				$_SESSION["full_name"] = $row['full_name'];
				$_SESSION["email"] = $row['email'];
				$_SESSION["mobile"] = $row['mobile'];
				$_SESSION["id_user"] = $row['id_user'];
				$_SESSION["status"] = $strAdd;
				$_SESSION["title"] = "ระบบจัดการยืม-คืน อุปกรณ์กีฬา";
	?>
        	<script>
				window.location.href = 'main.php';
			</script>
    <?
			}
		}
	mysql_close();
?>