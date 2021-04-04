<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$strSQL = "INSERT INTO order_material (id_order, date_mat, id_mat, num_order, room, id_user) VALUES (NULL, '".$_POST["date_mat"]."', '".$_POST["id_mat"]."', '".$_POST["num_order"]."', '".$_POST["room"]."', '".$_POST["id_user"]."')";  							
		$objQuery = mysql_query($strSQL);	
		if (!$objQuery) {
			die('Invalid query: ' . mysql_error());
		}
		
		$strSQL_list = "SELECT * FROM material where id_mat = '".$_POST["id_mat"]."'  ";
		$stmt_list  = mysql_query($strSQL_list);
		$row_list = mysql_fetch_array($stmt_list);
		$stock_qty = $row_list[stock_qty]+$_POST["num_order"];
		
		$strSQL = "update material set stock_qty = '".$stock_qty."' WHERE id_mat = '".$_POST['id_mat']."'";  							
		$objQuery = mysql_query($strSQL);
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_in_material.php";
        </script>
