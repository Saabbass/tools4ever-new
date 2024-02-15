<?php 
    // Database configuratie
    // $host  = "mariadb";
    // $dbuser = "root";
    // $dbpass = "password";
    // $dbname = "tools4ever";

    // Maak een  database connectie
    // $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
?>
<?php 
    // Database configuratie
    $servername  = "mariadb";
    $username = "root";
    $password = "password";
    $dbname = "tools4ever";

    // Maak een  database connectie
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
