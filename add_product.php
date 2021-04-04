<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$sql="Select name_material from material Where name_material='".$_POST["name_material"]."' and type_mat = '".$_POST["type_mat"]."'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
?>
		<script>
			alert("ชื่อวัสดุ-อุปกรณ์นี้มีแล้ว");
			window.location.href = "list_material.php";
        </script>
<?
		}else{
			
			$sur = strrchr($_FILES['pic']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["pic"]["tmp_name"],"product/".$newfilename); 
			$file_img = "product/".$newfilename;

			$strSQL = "INSERT INTO material (id_mat, type_mat, name_material, id_unit, pic, reorder_point) VALUES (NULL, '".$_POST["type_mat"]."', '".$_POST["name_material"]."', '".$_POST["type_unit"]."', '".$file_img."', '".$_POST["reorder_point"]."')";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_material.php";
        </script>
