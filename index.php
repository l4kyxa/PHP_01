<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<meta name="description" content="Webprogramozás I. (Beadandó Feladat)"> 
<meta name="keywords" content="Zsák, József, L4KYXA, Webprogramozás, Beadandó, Feladat"> 
<meta name="author" content="Zsák József (L4KYXA)">   
<title>[Zsák József (L4KYXA) ÜzenőFal]</title> 
</head>
	<body bgcolor="gray">
		<table border="1" width=100%" cellpadding="10" bgcolor="white" bordercolor="gray">
			<tr>
				<td colspan="3" align="center">
					<h1><a>Üzenőfal</a></h1>
				</td>
			</tr>
			<tr>
				<td align="center" width=25%">
					<form action="add.php" method="post">
					<input type="submit" value="Hozzáadás"/>
					</form>
				</td>
				<td align="center" width=50%">
					<form action="update.php" method="post">
					<input type="submit" value="Szerkesztés"/>
					</form>
				</td>
				<td align="center"width=25%">
					<form action="delete.php" method="post">
					<input type="submit" value="Törlés"/>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<h2><a>Bejegyzések</a></h2>
				</td>
			<tr>	
				<td align="center"width=25%">
				</td>
				<td align="center"width=50%">
					<?php
					require_once 'list.php';
					?>
				</td>
				<td align="center"width=25%">
				</td>
			</tr>
				<tr>
				<td colspan="3" align="center">
					<h2><a>Telefon:+36-70/248-15-74 | E-mail: l4kyxa@gmail.com </a></h2> 
				</td>
			</tr>		
		</table>
	</body>
</html>
<?php
$db->close()
?>

