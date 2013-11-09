<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php
try
{
	$pro_code = $_POST['code'];

	$dsn = 'mysql:dbname=shop;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	$sql = 'DELETE FROM mst_product WHERE code=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $pro_code;
	$stmt->execute($data);

	$dbh = null;
} 
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をおかけしています。';
	exit();
}
?>
削除しました。<br />
<br />
<a href="pro_list.php">戻る</a>
</body>
</html>
