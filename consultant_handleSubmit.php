

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
					$query = "UPDATE reading SET AltInterpret=?, ReadingFlagged=0 WHERE ReadingID=?";
					
					try {
						$ins = $conn->prepare($query);   
						$ins->bind_param("si", $_POST["consult"], $_POST["reading"]);
						$ins->execute();
					} catch(Exception $e) {
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
					
					echo "<h1 style='font-family: tahoma;'>Consultation successful!</h1><br>";
					echo "<b style='font-family: tahoma;'>You'll be redirected to the Consultant Panel after 5 seconds.</b>";
		
					$conn = null;
					header( "refresh:5;url=index.php" );
				?>
				

		
		</body>
</html>