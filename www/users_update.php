<?php
// echo "<pre>

session_start();
require 'database.php';

//check method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "You are not allowed to view this page";
    exit;
}

//check if all fields are filled in
if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['role']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['backgroundColor'])) {
    echo "Please fill in all fields";
    exit;
}
$id = $_GET['id'];
// $email = $_POST['email'];
// $password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$role = $_POST['role'];

$sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, address = :address, city = :city, role = :role WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->bindParam(":firstname", $firstname);
$stmt->bindParam(":lastname", $lastname);
$stmt->bindParam(":address", $address);
$stmt->bindParam(":city", $city);
$stmt->bindParam(":role", $role);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->execute()) {
    $user_id = $id;
    $backgroundColor = $_POST['backgroundColor'];
    $font = $_POST['font'];

    $sql2 = "UPDATE user_settings SET backgroundColor= :backgroundColor, font = :font WHERE user_id = :user_id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(":user_id", $user_id);
    $stmt2->bindParam(":backgroundColor", $backgroundColor);
    $stmt2->bindParam(":font", $font);
    $stmt2->execute();
    $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ($result2) {
        header("Location: users_index.php");
    } else {
        echo "Something went wrong";
    }
}

echo "Something went wrong";
