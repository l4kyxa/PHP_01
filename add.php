<?php
	require_once 'connect.php';

	$nameErr=$emailErr=$textErr="";
	if(isset($_POST['text']) && !empty($_POST['text']))
	{
			if(isset($_POST['name']) && !empty($_POST['name'])&& strlen($_POST['name'])<=45)
			{
				$name=$_POST['name'];
			}
			else
			{
				$nameErr="Hibás név!";
			}
			if(isset($_POST['email']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				$email=$_POST['email'];
			}
			else
			{
				$emailErr="Hibás E-mail cím!";
			}
			if(isset($_POST['text']) && !empty($_POST['text']))
			{
				$text=$_POST['text'];
			}
			else
			{
				$textErr="Hibás Üzenet!";
			}
			if(isset($_POST['name'],$_POST['email'],$_POST['text'])&& !empty ($_POST['name']) && !empty ($_POST['email'])&& !empty ($_POST['text']))
				    
			{
				$db->query("
				INSERT INTO `uzenofal` (`id`,`name`, `email`,`text`,`date`)
				VALUES (null,'{$name}','{$email}','{$text}',NOW())
				");
				$nameErr="Sikeres mentés!";
				header("Location: index.php");
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
					<h2><a>Hozzáadás</a></h2>
				</td>
			<tr>	
				<td align="center"width=25%">
					<table>
						<form action="add.php" method="post">
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
									<textarea rows="5" cols="25" name="text"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Küldés"/>
								</td>
								<td>
									<?php
									require_once 'add.php';
									echo $nameErr;
									echo $emailErr;
									echo $textErr;
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

