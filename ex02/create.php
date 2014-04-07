<?php
if (!file_exists("private"))
{
	mkdir("private");
}
if ($_POST['submit'] === "OK")
{
	$array = array();
	if (file_exists("private/passwd"))
	{
		$file = file_get_contents("private/passwd");
		$array = unserialize($file);
	}
	$salt = hash('sha512', "K2p8DMv5uvK9");
	$pass = hash('sha512', $_POST['passwd']);
	$password = $salt.$pass;
	$compte = array("login" => $_POST['login'], "passwd" => $password);
	$find = FALSE;
	foreach ($array as $elem)
	{
		if ($elem['login'] === $compte['login'])
			$find = TRUE;
	}
	if ($find === FALSE)
	{
		$array[] = $compte;
		echo "OK\n";
	}
	else
		echo "ERROR\n";
	$file = serialize($array);
	file_put_contents("private/passwd", $file);
}
else
	echo "ERROR\n";
?>