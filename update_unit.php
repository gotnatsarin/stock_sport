<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 

		$strSQL = "update unit set name_unit = '".$_POST["name_unit"]."' where id_unit = '".$_POST["id_unit"]."' ";  							
		$objQuery = mysql_query($strSQL);	
		if (!$objQuery) {
			die('Invalid query: ' . mysql_error());
		}
?>
    	<script>
			alert("แก้ไขข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_unit.php";
        </script>
