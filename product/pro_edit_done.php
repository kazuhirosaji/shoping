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
	$pro_name = $_POST['name'];
	$pro_price = $_POST['price'];

	$pro_code = htmlspecialchars($pro_code);
	$pro_name = htmlspecialchars($pro_name);
	$pro_price = htmlspecialchars($pro_price);

	$dsn = 'mysql:dbname=shop;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	$sql = 'UPDATE mst_product SET name=?, price=? WHERE code=?';
	$stmt = $dbh->prepare($sql);
	$data[] = $pro_name;
	$data[] = $pro_price;
	$data[] = $pro_code;
	$stmt->execute($data);

	$dbh = null;

	print '修正しました。<br />';
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
