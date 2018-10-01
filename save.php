<?php

$name1 = $_POST['name1'];
$name2 = $_POST['name2'];
$name3 = $_POST['name3'];
$name4 = $_POST['name4'];
$name5 = $_POST['name5'];
$comments = $_POST['comments'];
$available = $_POST['available'] === 'true' || $_POST['available'] === true ? 'yes' : 'no';
$saveDate = time();

$db = new PDO('sqlite:db/fanniecoco.db');

$stmt = $db->prepare("
    INSERT INTO guests 
        (name1, name2, name3, name4, name5, comments, available, saveDate) 
    VALUES 
        (:name1, :name2, :name3, :name4, :name5, :comments, :available, :saveDate)
");

if ( ! $stmt) {
    print_r($db->errorInfo());
    exit();
}

$stmt->bindParam(':name1', $name1);
$stmt->bindParam(':name2', $name2);
$stmt->bindParam(':name3', $name3);
$stmt->bindParam(':name4', $name4);
$stmt->bindParam(':name5', $name5);
$stmt->bindParam(':comments', $comments);
$stmt->bindParam(':available', $available);
$stmt->bindParam(':saveDate', $saveDate);

$result = $stmt->execute();

if ( ! $result) {
    print_r($db->errorInfo());
    exit();
}