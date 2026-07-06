<?php
$conn = new mysqli("localhost", "root", "", "ggcc");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SHOW COLUMNS FROM branch_project;");
while ($row = $result->fetch_assoc()) {
    echo $row['Field'] . " - " . $row['Type'] . "\n";
}
$conn->close();
?>
