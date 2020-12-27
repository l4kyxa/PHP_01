<?php
	require_once 'connect.php';
	
	
	$idErr="";
	if(isset($_POST['id']) && !empty($_POST['id']))
	{
		$id=$_POST['id'];
		{
				if($result = $db->query("SELECT * FROM `uzenofal` WHERE `id`=$id"))
						{
							if($result->num_rows)
							{
							$db->query("DELETE FROM `uzenofal` WHERE `id`=$id");
							$idErr="A(z) $id. számú azonosító törlésre került.";
							}
							else 
							{
							$idErr="Hibás id!";
							}
						}
				else 
				{
					$idErr="Hibás id!";
				}
				
		}
	}	
	
?>

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
				</td>
				<td align="center" width=50%">
					<form action="index.php" method="post">
					<input type="submit" value="Vissza"/>
					</form>
				</td>
				<td align="center"width=25%">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<h2><a>Törlés</a></h2>
				</td>
			<tr>	
				<td align="center"width=25%">
					<table>
						<form action="delete.php" method="post">
							<tr>
								<td>
									 Id:
									 <input type="text" name="id"/> 
									 <input type="submit" value="Törlés"/>
									 </form>
								 </td>
							<tr>
								<td>
									<?php
									require_once 'delete.php';
									echo $idErr;
									?>
								</td>
							</tr>
						</form>
					</table>
				</td>
				<td align="center"width=50%">
					<table>
						<?php
							require_once 'connect.php';
									if($result = $db->query("SELECT * FROM `uzenofal`"))
									 {
										if($result->num_rows)
										 {
											$table = $result->fetch_all(MYSQLI_NUM);
											echo '<table border="2">';
											foreach($table as $row)
											{
												foreach($row as $record)
												{
													echo '<td>'.$record.'</td>';
												}
												echo'</tr>';
											}
										 }
										 
										 else
										 {
											 echo '<p>Nincs megjelenítendő adat.</p>';
										 }
										 $result->free();
									} 
							?>
					 </table>	
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





