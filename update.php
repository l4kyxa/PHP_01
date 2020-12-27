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
							if(($_POST['name']) && !empty($_POST['name']))
								{
									$name=$_POST['name'];
									$db->query("UPDATE `uzenofal` SET `name`=$name WHERE `id`=$id");
									$db->query("UPDATE `uzenofal` SET `date`=NOW() WHERE `id`=$id");
									
								}
							
							if(($_POST['email']) && !empty($_POST['email']))
								{
									$email=$_POST['email'];
									$db->query("UPDATE `uzenofal` SET `email`=$email WHERE `id`=$id");
									$db->query("UPDATE `uzenofal` SET `date`=NOW() WHERE `id`=$id");
								
								}
							if(($_POST['text']) && !empty($_POST['text']))
								{
									$text=$_POST['text'];
									$db->query("UPDATE `uzenofal` SET `text`=$text WHERE `id`=$id");
									$db->query("UPDATE `uzenofal` SET `date`=NOW() WHERE `id`=$id");
								
								}
							$idErr="A(z) $id. számú azonosító módosításra került.";

							}
							else 
							{
								$idErr="Hibás id!";
							}
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
					<h2><a>Szerkesztés</a></h2>
				</td>
			<tr>	
				<td align="center"width=25%">
					<table>
						<form action="update.php" method="post">
						<tr>
								<td>
									Id:
								</td>
								<td>
									<input type="text" name="id"/> 
								 </td>
							</tr>
							<tr>
								<td>
									Név:
								</td>
								<td>
									<input type="text" name="name"/> 
								 </td>
							</tr>
							<tr>
								<td>
									E-mail cím:
								</td>
								<td>
									<input  type="text" name="email"/>
								</td>
							</tr>
							<tr>
								<td>
									Üzenet:
								</td>
								<td>
									<textarea rows="5" cols="30" name="text"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Szerkesztés"/>
								</td>
								<td>
									<?php
									require_once 'update.php';
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



