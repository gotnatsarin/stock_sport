<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		if($_FILES["applicant_files"]["name"] != "")
		{
			//*** Delete Old File ***//			
			@unlink("product/".$_POST["hdnOldFile"]);
			
			$sur = strrchr($_FILES['applicant_files']['name'], ".");
			$newfilename = (Date("dmy_His").$sur); 
			copy($_FILES["applicant_files"]["tmp_name"],"product/".$newfilename); 
			$file_img = "product/".$newfilename;
			
			//*** Update New File ***//
			$strSQL = "UPDATE material ";
			$strSQL .=" SET pic = '".$file_img."' WHERE id_mat = '".$_POST['id_mat']."' ";
			$objQuery = mysql_query($strSQL);		
		}

		$strSQL = "update material set type_mat = '".$_POST["type_mat"]."', name_material = '".$_POST["name_material"]."', id_unit = '".$_POST["id_unit"]."', reorder_point = '".$_POST["reorder_point"]."' WHERE id_mat = '".$_POST['id_mat']."'";  							
		$objQuery = mysql_query($strSQL);	
		if (!$objQuery) {
			die('Invalid query: ' . mysql_error());
		}
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "list_material.php";
        </script>
