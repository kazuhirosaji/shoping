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
	$pro_name = $_POST['name'];
	$pro_price = $_POST['price'];

	$pro_name = htmlspecialchars($pro_name);
	$pro_price = htmlspecialchars($pro_price);

	$dsn = 'mysql:dbname=shop;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	$sql = 'INSERT INTO mst_product(name,price) VALUES (?,?)';
	$stmt = $dbh->prepare($sql);
	$data[] = $pro_name;
	$data[] = $pro_price;
	$stmt->execute($data);

	$dbh = null;

	print $pro_name;
	print 'を追加しました。<br />';
} 
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をおかけしています。';
	exit();
}
?>
<a href="pro_list.php">戻る</a>
</body>
</html>
