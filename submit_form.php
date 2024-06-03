<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
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
                $query = "INSERT INTO visitors (name) VALUES (:visitor_name)";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':visitor_name', $visitor_name);
                $stmt->execute();

                // Redirect to the about_us.html page
                header("Location: about_us.html");
                exit();
        }
    ?>
</body>
</html>
