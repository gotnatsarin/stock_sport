<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$SQL = "SELECT * FROM ream WHERE id_ream = '".$_POST["id_ream"]."' ";
		$stmt  = mysql_query($SQL);
		$row = mysql_fetch_array($stmt);
		
		$strSQL_mat = "SELECT * FROM material where id_mat = '$row[id_mat]' ";
		$stmt_mat  = mysql_query($strSQL_mat);
		$row_mat = mysql_fetch_array($stmt_mat);
		
		$strSQL = "update ream set num_ream = '".$_POST["num_ream"]."', detail = '".$_POST["detail"]."' where id_ream = '".$_POST["id_ream"]."' ";
		$stmt  = mysql_query($strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_ream_user.php";
        </script>
