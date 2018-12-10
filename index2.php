<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vente', 'root', 'root');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page principale</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<?php include "menu.php" ?>
<br>


  <?php include "map.php" ?>


<?php include "footer.php" ?>


</body>
</html>