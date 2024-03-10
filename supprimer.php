<?php
$token = $_GET['token'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_cv_maker";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM cv WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: admin_dashboard.php?token=$token");
    exit();
} else {
    header("Location: admin_dashboard.php?token=$token");
    exit();
}
?>
