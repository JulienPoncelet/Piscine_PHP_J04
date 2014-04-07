<?php
if ($_POST['submit'] === "OK")
{
	$array = array();
	if (($file = file_get_contents("private/passwd")) !== FALSE)
	{
		$find = FALSE;
		$array = unserialize($file);
		$salt = hash('sha512', "K2p8DMv5uvK9");
		$newpass = hash('sha512', $_POST['newpw']);
		$oldpass = hash('sha512', $_POST['oldpwd']);
		$newpassword = $salt.$newpass;
		$oldpassword = $salt.$oldpass;
		$compte = array("login" => $_POST['login'], "passwd" => $newpassword);
		foreach ($array as $key => $elem)
		{
			if ($elem['login'] === $compte['login'])
			{
				if ( $elem['passwd'] === $oldpassword)
				{
					$find = TRUE;
					$array[$key]['passwd'] = $newpassword;
				}
			}
		}
		if ($find === FALSE)
			echo "ERROR\n";
		else
		{
			$file = serialize($array);
			file_put_contents("private/passwd", $file);
			echo "OK\n";
		}
	}
}
else
	echo "ERROR\n";
?>