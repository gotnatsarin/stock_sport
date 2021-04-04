<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$strSQL_order = "SELECT * FROM order_material where id_order = '".$_POST["id_order"]."'  ";
		$stmt_order  = mysql_query($strSQL_order);
		$row_order = mysql_fetch_array($stmt_order);
		
		$strSQL_list1 = "SELECT * FROM material where id_mat = '".$row_order["id_mat"]."'  ";
		$stmt_list1  = mysql_query($strSQL_list1);
		$row_list1 = mysql_fetch_array($stmt_list1);
		$stock_qty1 = $row_list1[stock_qty]-$row_order["num_order"];
		
		$strSQL1 = "update material set stock_qty = '".$stock_qty1."' WHERE id_mat = '".$row_order['id_mat']."'";  							
		$objQuery1 = mysql_query($strSQL1);
		
		$strSQL = "update order_material set date_mat='".$_POST["date_mat"]."', id_mat='".$_POST["id_mat"]."', num_order='".$_POST["num_order"]."', room='".$_POST["room"]."', id_user='".$_POST["id_user"]."' where id_order = '".$_POST["id_order"]."'";  							
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
