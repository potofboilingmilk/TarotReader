
<!DOCTYPE html>
<html>
    <meta charset='UTF-8'>
    <head>
    <link rel='stylesheet' href='css/main.css'>
    <title>Consultation Page, Sprint 3</title>
    </head>
    <body>
	    <div class='header'>
			<?php
				include 'header.php'
			?>
		</div>
		
		<?php 
			
			if ($_SESSION["power"] < 2) {
				echo "<h1 style='font-family: tahoma; margin-left: 10%;'>404: Page not found!</h1>";
				
			} else {
				        echo "<div class='wrapper_main'>";
						echo "<div class='wrapper_interior_a' style='padding-left: 50px; margin-left: auto; margin-right: auto; width:50%; margin-bottom: 0.05%'>";
							echo "<h1>Consultant Panel</h1>";
							echo "<p>In order to consult a user's reading:</p>";
							echo "<ol>";
								echo "<li>Look at the panel underneath this one.</li>";
								echo "<li>A list of readings may appear automatically when you load this page: if so, each one has a button and a number.</li>";
								echo "<li>Click the button you be directed to a page containing that user's reading information.</li>";
								echo "<li>If nothing appears, then there are no outstanding consultations.</li>";
							echo "</ol>";
							echo "<a href='index.php'>Go back</a>";
						echo "</div>";
					echo "</div>";
					echo "<div class='wrapper_main'>";
						echo "<div class='wrapper_interior_a' style='width:100%; margin-top: 0.05%'>";
						echo "<p><b><u>Readings which require your consultation:</u></b></p>";
							include 'consultant_handleSearch.php';
								echo "</div>";
							echo "</div>";
						echo "</body>";
			}
		?>


		


</html>

