<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Discover New Anime</title>
    <style type ="text/css">

        h4, h5 {
            color: black;
        }
        li {
            color: black;
        }
        .cardback p {
            font-size: 90%;
            color: black;
        }
        .list {
            list-style-type: none;
            font-size: 80%;
            color: black;
        }
        .cardcontainer {
           position: relative; 
            display: inline-block; 
            height: 275px;
            width: 183px;
            margin: 10px;
        }
        .card {
            position: absolute; 
            /*this is what was bugging the flex on the container...
            margin-right: 20px;
            margin-top: 20px;*/
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: all 1s ease;
        } 
        .cardfront {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            background-color: #30838e;
        } 
        .cardback {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            background-color: #B0E0E6;
            transform: rotateY(180deg);
            overflow: scroll;
            /*want to change scroll bar visual*/
            scrollbar-width: 2px;
            scrollbar-color: #30838e;
            padding: 10px;
            box-shadow: 5px 5px 3px #30838e;
        } 
        .genre {
            margin-top: 5px;
            
        }
        .card:hover {
            transform: rotateY(180deg);
        } 
        .main {
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
            justify-content: center
        }
        </style>
</head>
<body>
    <div class="container">
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
                    <a href="./discovernew.php">Discover New Anime</a>
                </h2>
                <a class="header_img bigman" href="./localevents.html">
                    <img class="header_img" src="images/bigman.png" alt="no image found">
                </a>
            </div>
        </div>
		<div class="main">
			<?php
			$dsn = 
				'mysql:host=cssgate.insttech.washington.edu;dbname=hnjones';
			$username = 'hnjones';
			$password = 'natmurs';
 
			$db = new PDO($dsn, $username, $password);
			$title = $db->query('SELECT * FROM animes');
			
			foreach($title as $animes){
			echo "
            <div class='cardcontainer'>
                <div class='card'> 
                    <div class='cardfront'>
                        <img src='images/AnimeImages/". $animes['imgpath'] ."'
                        alt='" . $animes['title'] . "'
                        title='" . $animes['title'] . "'
                        height='100%'
                        width='100%'
                     />
                    </div>

                    <div class='cardback'>
                        <h4>" . $animes['title'] . "</h4>
                        <p>"
						. $animes['summary'] . 
                        "</p>
                        <div class='genre'>
                            <h5>Genres</h5>
                            <ul class='list'>
								<li>" . $animes['genre'] . "</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>"
			}
			?>
		</div>
	</div>
			</html>