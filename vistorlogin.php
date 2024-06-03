<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
<h2>
    <?php
$first_name = $_POST['first_name'];
$email = $_POST['email'];
echo $first_name;
$dsn =
'mysql:host=cssgate.insttech.washington.edu;dbname=uwnetid';
$username = 'uwnetid';
$password = 'yourmysqlpassword';
// creates PDO object
$db = new PDO($dsn, $username, $password);
$query = "INSERT INTO email
VALUES
('$email')";
$insert_count = $db->exec($query);
//echo $insert_count;
    ?>
</h2>
</body>
</html>