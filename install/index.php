<?php
/*
 * Created on Wed Feb 09 2022 12:29:47 AM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    include '../config/database.php';

    $table = "CREATE TABLE IF NOT EXISTS `images` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(125) DEFAULT NULL,
            `imagePath` varchar(255) DEFAULT NULL,
            `uploadedTime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
    ";

    $sql = $db->prepare($table);
    $sql->execute();

    try {
        echo "Database created! Back to <a href='../'>Gallery</a>.";
        // Rename install directory after creating Database
        rename("../install/", "../installation-completed");
    } catch(PDOException $ex) {
        echo "Error " . $ex->getMessage();
    }
    
?>