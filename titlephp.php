<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
    <style>

/* Popup */
.popup-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 25%;
    padding: 20px;
    background-color: #74DFEE;;
    
    color: black;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    z-index: 1000;
}

.popup-form {
    display: flex;
    flex-direction: column;
}

.popup-form h2, h3, label {
    color: black !important;
    /* text-shadow: 2px 2px 2px black; */
}

.popup-form label {
    margin-top: 10px;
}

.popup-form input{
    margin-top: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.popup-form button {
    margin-top: 10px;
    padding: 10px;
    background-color: #239EAB;
    color: white;
    border: none;
    border-radius: 5px;
}

.popup-form button:hover {
    background-color: #74DEEE;
}

.container:hover .popup-container {
    display: block;
}

    </style>
</head>
<body>
    <div id="preloader">
        <div id="page-container">
            <div class="link_main_page">
                <div class="container">
                    <img class="excalibur" src="./images/excalibur.png" alt="no image found">
                    <div class="sub-container">
                        <h1>AnimeEx</h1>
                    </div>
                    <!-- Popup form HTML -->
                    <div class="popup-container" id="popup-container">
                        <form class="popup-form" id="popup-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <h2>Welcome to AnimEx!</h2>
                            <h3>Please enter your name for the Visitor Log!</h3>
                            <label for="visitor_name">Name:</label>
                            <input type="text" id="visitor_name" name="visitor_name" required maxlength="8">
                            <button type="submit">Submit</button>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $visitor_name = $_POST['visitor_name'];
                                // Database connection details
                                $dsn = 'mysql:host=cssgate.insttech.washington.edu;dbname=hnjones';
                                $username = 'hnjones';
                                $password = 'natmurs';
                                // Create a PDO object
                                $db = new PDO($dsn, $username, $password);
                                // Prepare and execute the query
                                $query = "INSERT INTO visitors (vistor_name) VALUES (visitor_name)";
                                $stmt = $db->prepare($query);
                                $stmt->bindParam(':visitor_name', $visitor_name);
                                $stmt->execute();
                                // Redirect to the about_us.html page
                                header("Location: vistorlog.php");
                                exit();
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./main.js"></script>
</body>
</html>