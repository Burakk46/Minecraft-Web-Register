<?php
include 'connection.php';
$emailregcount=2;

if (isset($_POST['register']))
{
	$repeatpass = $_POST['repeat-password'];
	$password = $_POST['password'];
	$kadi = $_POST['username'];
	$mail = $_POST['email'];

	$kadiquery = $db->query("SELECT * FROM authme WHERE username='$kadi'", PDO::FETCH_ASSOC);
	$emailquery = $db->query("SELECT * FROM authme WHERE email='$mail'",PDO::FETCH_ASSOC);
	$emailcount= $emailquery->rowCount();
	$kadicount = $kadiquery->rowCount();
	
	if (!empty($kadi) AND !empty($mail) AND !empty($password) AND !empty($repeatpass)) {
		if (repeatpass != null) {
			if ($kadicount < 1 AND $emailcount < $emailregcount)
			{
				$kaydet = $db->prepare("INSERT into authme set
					username=:username,
					email=:email,
					password=:password
					");

				$insert = $kaydet->execute(array(

					'username' => $_POST['username'],
					'email' => $_POST['email'],
					'password' => md5($_POST['password'])
				));
				header("Location:index.php");
			}
			else
			{
				echo "böyle bir email adresi veya  kullanıcı adı var.";
			}
		}
		else
		{
			echo "şifreler uyuşmuyor.";
			function repeatpasswordError()
			{
				return "Şifreler Uyuşmuyor......";
			}
		}
	}
	else{
		echo "boş alan bırakılamaz";
	}

}

?>
