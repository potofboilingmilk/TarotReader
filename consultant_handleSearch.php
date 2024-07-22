
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
            $query = "SELECT * FROM reading WHERE ReadingFlagged='1'";
            try {
                $ins = $conn->prepare($query);   
                //$ins->bind_param();
                $ins->execute();
				$result = $ins->get_result();
            } catch(Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
               
            }
			
			
			while($row = $result->fetch_array())
			{
				echo "<div style='margin: 5px 0px 0px 0px; font-family: tahoma;'><span style='background-color: #9999ee; padding: 10px'>";
				echo "Reading #" . $row['ReadingID'];
				echo "<form action='consultant_handleInterpret.php' method='POST' style='display: inline;'><input type='hidden' name='reading' value='" . $row["ReadingID"] . "'><input type='submit' value='Provide input' style='margin-left:10px; font-family: tahoma;'></form></span></div>";
				echo "<br>";
			}

            
        $conn = null;
		$result->free();
        ?>
		