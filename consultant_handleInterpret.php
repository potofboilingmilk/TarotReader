

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <head>
    <link rel="stylesheet" href="css/main.css">
    <title>Consultation Page, Sprint 1</title>
    </head>
		<body>
		
		<div class="header">
			<?php
				include "header.php"
			?>
		</div>
		
		<div class="wrapper_main">
			<div class="wrapper_interior_a" style="min-width: 50%;">
				<?php
					// Error flag.
					$wefailed = 0;
				   
					
					// Retrieve the data submitted on index.php.
					// If the data used to access the MySQL database changes from the default, YOU NEED TO FIX THIS!!
					// The commented section underneath createAccount.php also needs to be uncommented.
					// You'll also need to remove the erroneous default data from the four lines below, and remove the commented $_GETs.
					$server = 'localhost';//$_GET['server'];
					$dbUser = 'root';//$_GET['dbUser'];
					$dbPass = '';//$_GET['dbPass'];
					$db = 'tarot';//$_GET['db'];
			   
					
					$conn = new mysqli($server, $dbUser, $dbPass, $db);

					if ($conn->connect_error) {
						die("<h1>It's over!</h1><br>" . mysqli_connect_error());
						header( "refresh:5;url=index.php" );
					}
					
	
					
					//echo "<h1>SQL Connection successful.</h1>";
					$memento = $_POST["reading"];
					$query = "SELECT * FROM reading WHERE ReadingID=" . $_POST["reading"];
					try {
						$ins = $conn->prepare($query);   
						//$ins->bind_param();
						$ins->execute();
						$result = $ins->get_result();
					} catch(Exception $e) {
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
					
					$row = $result->fetch_array();
					echo "<b style='font-family: tahoma;'>Current reading: </b>" . $row["ReadingID"] . "<br><br>";
					echo "<b style='font-family: tahoma;'>Spread ID: </b>" . $row["SpreadID"] . "<br><br>";
					
					// There has GOT to be a better way to do this...
					echo "<b style='font-family: tahoma;'>Tarot Card #1 : </b>" . $row["TarotA"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #2 : </b>" . $row["TarotB"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #3 : </b>" . $row["TarotC"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #4 : </b>" . $row["TarotD"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #5 : </b>" . $row["TarotE"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #6 : </b>" . $row["TarotF"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #7 : </b>" . $row["TarotG"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #8 : </b>" . $row["TarotH"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #9 : </b>" . $row["TarotI"] . "<br>";
					echo "<b style='font-family: tahoma;'>Tarot Card #10: </b>" . $row["TarotJ"] . "<br><br>";
					// ...yeah.
					
					$conn = null;
					$result->free();
				?>
				
				<b style='font-family: tahoma;'>Your thoughts:</b>
				<form action="consultant_handleSubmit.php" method="POST">
					<textarea id="consult" name="consult" rows="4" cols="50">
					Write your thoughts here...
					</textarea><br>
					<?php
						echo "<input type='hidden' name='reading' value='" . $memento . "'>"
					?>
					<input type="submit">
				</form>
			</div>
		</div>
		
		</body>
</html>