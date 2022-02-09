<?php
/*
 * Created on Wed Feb 09 2022 12:51:17 AM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $GLOBALS["HOST"]        = "localhost";
    $GLOBALS["USERNAME"]    = "root";
    $GLOBALS["PASSWORD"]    = "";
    $GLOBALS["DATABASE"]    = "gallery";

    $db = DatabaseConnection();

    // Create DatabaseConnection() Function

    function DatabaseConnection() {
        try {
            $db = new PDO("mysql:dbname={$GLOBALS["DATABASE"]};host={$GLOBALS["HOST"]}", $GLOBALS["USERNAME"], $GLOBALS["PASSWORD"]);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $ex) {
            die("Error " . $ex->getMessage());
        }
    }

?>