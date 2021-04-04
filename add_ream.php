<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$num_ream=0;
		$strSQL_ream = "SELECT * FROM ream where id_mat = '".$_POST[id_mat]."' and status != 'N' and status != 'B' and status != 'BY' and status != 'BY' ";
		$stmt_ream  = mysql_query($strSQL_ream);
		while($row_ream = mysql_fetch_array($stmt_ream)){
			$num_ream += $row_ream[num_ream];
		}
		
		$strSQL = "SELECT * FROM material where id_mat = '".$_POST["id_mat"]."' ";
		$stmt  = mysql_query($strSQL);
		$row = mysql_fetch_array($stmt);
		$min_ream = $row[stock_qty]-$num_ream;
		if($min_ream < $_POST["num_ream"]){
?>
		<script>
			alert("จำนวนวัสดุอุปกรณ์ที่เลือกไม่เพียงพอต่อการเบิก กรุณตรวจสอบรายการใหม่อีกครั้ง");
			window.location.href = "main.php";
        </script>
<?
		}else{

			$strSQL = "INSERT INTO ream (id_ream, id_mat, num_ream, detail, id_user, status, date_ream) VALUES (NULL, '".$_POST["id_mat"]."', '".$_POST["num_ream"]."', '".$_POST["detail"]."', '".$_POST["id_user"]."', '', NOW())";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "main.php";
        </script>
<?		} ?>