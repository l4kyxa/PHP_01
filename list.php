<?php
/*
require_once 'connect.php';
		if($result = $db->query("SELECT * FROM `uzenofal`"))
		 {
			if($result->num_rows)
			 {
				$table = $result->fetch_all(MYSQLI_NUM);
				echo '<table border="1">';
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
	 
	 	else if (isset($_POST['listaz_gomb']))
		{
			$database->listazas($dict);
		}

	 
	 */
	 
?>
<?php
require_once 'connect.php';
		 if($result = $db->query("SELECT * FROM `uzenofal` ORDER BY `uzenofal`.`date` DESC"))
			 //("SELECT * FROM `uzenofal`")idsorrend
			//("SELECT * FROM `uzenofal` ORDER BY `uzenofal`.`date` DESC") dátumsorrend
		 {
			 echo '<hr/>';
			if($result->num_rows)
			 {
				 while ($row=$result->fetch_object())
				 {
					 echo "<b>NÉV:</b>   ";
					 echo $row->name.'<br />';
					 echo "<b>E-MAIL CÍM:</b>   ";
					 echo $row->email.'<br />';
					 echo "<b>ÜZENET:</b>  ";
					 echo $row->text.'<br />';
					 echo "<b>DÁTUM:</b>   ";
					 echo $row->date.'<br />';
					 echo '<hr/>';
				 }
			 }
			else
			 {
				 echo '<p>Nincs megjelenítendő adat.</p>';
			 }
			 $result->free();
	 }
?>