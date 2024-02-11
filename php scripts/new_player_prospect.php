<?php

if (isset($_POST['email'])) {
    include_once "connection.php";
    $insert_data = [$_POST['name'], $_POST['last_names'], $_POST['email'], intval($_POST['age']), $_POST['positions']];
    $sql = ("INSERT INTO `" . "prospects" . "` VALUES ('', ?, ?, ?, ?, ?)");
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssis", $insert_data[0], $insert_data[1], $insert_data[2], $insert_data[3], $insert_data[4]);
    $stmt->execute();
}
