<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Visitor Log</title>
	<link rel="icon" href="images/onion.ico">
	<style type="text/css">
	table {
		margin: 20px;
		padding: 10px;
		border: 2px solid #215d65;
	}
	.container{
		height: 100%;
		width: 100%;
	}
	</style>
</head>
<body>
	<div class="container">
        <!-- NAVBAR -->
        <div class="header">
            <div class="title">
                <h1>
                    <a href="./title.html">AnimeEx</a>
                    </h1>
            </div>
            <div class="links">
                <h2>
                    <a href="./about_us.html">About Us</a>
                </h2>
                <h2>
                    <a href="./rate_my_anime.html">Rate My Anime</a>
                </h2>
                <h2>
                    <a href="./discover_new_anime.html">Discover New Anime</a>
                </h2>
                <a class="header_img noface" href="./localevents.html">
                    <img class="header_img" src="images/noface.png" alt="no image found">
                </a>
            </div>
        </div>
	
	
	<table>
		<?php
			$dsn = 
				'mysql:host=cssgate.insttech.washington.edu;dbname=hnjones';
			$username = 'hnjones';
			$password = 'natmurs';
			// creates PDO object
			$db = new PDO($dsn, $username, $password); 
			$visitors = $db->query('SELECT * FROM visitor');
			foreach ($visitors as $visitor) {
			echo "<tr><td>". $visitor['visitor_name'] . 
					"</td></tr>"; 
			}
		?>
	</table>
	
</div>
	<footer>
		<h3>
             <a href="./visitorlog.php">Visitors</a>
        </h3> 
		<p>Content Creator: Holley & Brittany</p>
    </footer>
</body>
 <script src="./main.js"></script>
 </html>