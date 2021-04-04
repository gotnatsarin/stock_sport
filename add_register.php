<?
		session_start();
		header('Content-Type: text/html; charset=UTF-8');
		include "connectDb.php"; 
		
		$sql="Select username from user Where username='".$_POST["username"]."'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
?>
		<script>
			alert("Username : <?=$_POST["username"];?> มีผู้ใช้งานแล้ว");
			window.history.back();
        </script>
<?
		}else{ 
		
			$strSQL = "INSERT INTO user (id_user, user_code, full_name, email, mobile, username, password, status, SID, Active, date_register) VALUES (NULL, '".$_POST["user_code"]."', '".$_POST["full_name"]."', '".$_POST["email"]."', '".$_POST["mobile"]."', '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["status"]."', '".session_id()."', 'No', NOW())";  							
			$objQuery = mysql_query($strSQL);	
			if (!$objQuery) {
				die('Invalid query: ' . mysql_error());
			}
		$max_id = "SELECT MAX(id_user) AS maxid FROM user"; // query อ่านค่า id สูงสุด
        $res = mysql_query($max_id); // ทำคำสั่ง
        $ret = mysql_fetch_assoc($res); // อ่านค่า
        $last_id = $ret['maxid']; // คืนค่า id ที่ insert สูงสุด
		
		$Uid = mysql_insert_id();

		require("PHPMailer/class.phpmailer.php");
		$mail = new PHPMailer();  // กำหนดตัวแปร  $mail
		
		$fm = "project@tumproject.com"; // *** ต้องใช้อีเมล์ @yourdomain.com เท่านั้น  ***
		$strMessage = "Welcome : ".$_POST["full_name"]."<br>";
		$strMessage .= "=================================<br>";
		$strMessage .= "Activate account click here.<br>";
		$strMessage .= "http://tumwebdesign.com/stock_sport/activate.php?sid=".session_id()."&id_user=".$ret['maxid']."<br>";
		$strMessage .= "=================================<br>";
		
		$mail->CharSet = 'UTF-8';                                                                
		$mail->IsHTML(true);
		$mail->IsSMTP();
		//$mail->Mailer = "smtp";
		$mail->SMTPAuth = true;
		//$mail->SMTPSecure = 'ssl'; // บรรทัดนี้ ให้ Uncomment ไว้ เพราะ Mail Server ของโฮสต์ ไม่รองรับ SSL.
		$mail->Host = "mail.tumproject.com"; //ใส่ SMTP Mail Server ของท่าน
		$mail->Port = "25"; // หมายเลข Port สำหรับส่งอีเมล์
		$mail->Username = "project@tumproject.com"; //ใส่ Email Username ของท่าน (ที่ Add ไว้แล้วใน Plesk Control Panel)
		$mail->Password = "Goowanvisa1986"; //ใส่ Password ของอีเมล์ (รหัสผ่านของอีเมล์ที่ท่านตั้งไว้)             // App Password not Gmail password
		
		$mail->From = "project@tumproject.com";
		$mail->FromName = "Activate Member Account"; // กำหนดชื่อผู้ส่ง
		$mail->AddAddress($_POST["email"], $_POST["full_name"]);
		//$mail->AddReplyTo($custemail);
		$mail->Subject = "Activate Member Account"; // กำหนดหัวข้ออีเมล์
		$mail->Body = $strMessage; // กำหนดเนื้อหาอีเมล์
		$mail->WordWrap = 50;  
	
		$mail->Send(); 
?>
    	<script>
			alert("บันทึกข้อมูลเรียบร้อยแล้ว");
			window.location.href = "index.php";
        </script>
<?
		}
?>