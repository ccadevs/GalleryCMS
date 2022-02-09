<?php
/*
 * Created on Wed Feb 09 2022 2:27:56 AM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    include '../config/database.php';

    global $db;

    $PhotoName = trim($_POST['title']);
    $photo = $_FILES['imagePath']['name'];

    if($_FILES['imagePath']['name']) {
        move_uploaded_file($_FILES['imagePath']['tmp_name'], "../assets/uploads/" . $_FILES['imagePath']['name']);
        $image = "../assets/uploads/" . $_FILES['imagePath']['name'];
    }

    $query = "INSERT INTO images SET title = ?, imagePath = ?";
    $params = array($PhotoName, $photo);
    $stmt = $db->prepare($query);

    $stmt->execute($params);

?>