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
		padding: 20px;
		border-collapse: collapse;
		background: rgba(33, 93, 101, 0.5);
	}
	.log{
		position:absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		padding: 10px;
		font-size: 20pt;
		text-align: center;
	}
	.container{
		height: 100%;
		width: 100%;
		text-align: center;
	}
	.content {
		margin: 10px;
		padding: 20px;
		text-align: center;
	}
	.imgcont{
		position: relative;
		display: inline-block;
		width: 200px;
		height: 200px;
		margin:20px;
	}
	#logo {
		height: 200px;
		width: 200px;
	}
	</style>
</head>
<body>
	<div class="container">
        <!-- NAVBAR -->
        <div class="header">
            <div class="title">
                <h1>
                    <a href="./titlephp.php">AnimeEx</a>
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
	<div class="content">
	<h2>Welcome!</h2>
	<h3>Thank you for visiting our site!</h3>
	
	
		<?php
			$dsn = 
				'mysql:host=cssgate.insttech.washington.edu;dbname=hnjones';
			$username = 'hnjones';
			$password = 'natmurs';
			// creates PDO object
			$db = new PDO($dsn, $username, $password); 
			$visitors = $db->query('SELECT * FROM visitor');
			foreach ($visitors as $visitor) {
			echo "<div class='imgcont'>
				<img src='images\logo3.png' id='logo'/>
			<div class='log'>". $visitor['visitor_name'] . 
					"</div>
					</div>"; 
			}
		?>
	
	</div>
	
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