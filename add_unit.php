<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$sql="Select name_unit from unit Where name_unit='".$_POST["name_unit"]."'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
?>
		<script>
			alert("ชื่อหน่วยนี้มีแล้ว");
			window.location.href = "form_add_unit.php";
        </script>
<?
		}else{

			$strSQL = "INSERT INTO unit (id_unit, name_unit) VALUES (NULL, '".$_POST["name_unit"]."')";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_unit.php";
        </script>
