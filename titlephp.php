<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
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
                        <form class="popup-form" id="popup-form" method="POST" action="/submit_form.php">
                            <h2>Welcome to AnimEx!</h2>
                            <h3>Please enter your name for the Visitor Log!</h3>
                            <label for="visitor_name">Name:</label>
                            <input type="text" id="visitor_name" name="visitor_name" required maxlength="8">
                            <button type="submit">Submit</button>
                            <?php
            $visitor_name = $_POST['visitor_name'];
            // Database connection details
            $dsn = 'mysql:host=cssgate.insttech.washington.edu;dbname=hnjones';
            $username = 'hnjones';
            $password = 'natmurs';

                // Create a PDO object
                $db = new PDO($dsn, $username, $password);

                // Prepare and execute the query
                $query = "INSERT INTO visitors VALUES ('$visitor_name')";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':visitor_name', $visitor_name);
                $stmt->execute();

                // Redirect to the about_us.html page
                header("Location: about_us.html");
                exit();
    ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./main.js"></script>
</html>
