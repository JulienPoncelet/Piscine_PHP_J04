<?PHP

session_start();
if (isset($_GET["login"]))
	$_SESSION["login"] = $_GET["login"];
if (isset($_GET["passwd"]))
	$_SESSION["passwd"] = $_GET["passwd"];
if (!isset($_SESSION["login"]))
	$_SESSION["login"] = "";
if (!isset($_SESSION["passwd"]))
	$_SESSION["passwd"] = "";


?>

<html>
	<head>
		<title>Index</title>
		<style>
			body {
				background-color: #2E082E;
			}
			span {
				color: #66CCFF;
			}
		</style>
	</head>
	<body>
		<form action="http://j04.local.42.fr:8080/ex01/index.php" method="GET">
			<span>Identifiant:</span>
			<input type="text" name="login" value="<?= $_SESSION["login"]?>"/><br />
			<span>Mot de passe:</span>
			<input type="text" name="passwd" value="<?= $_SESSION["passwd"]?>"/><br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
