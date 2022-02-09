<?php
/*
 * Created on Wed Feb 09 2022 12:24:42 AM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    include 'config/database.php';

    // Install database
    if (file_exists('install')) {
        echo "Click <a href='install/'>here</a> to install or remove installation directory.";
        exit();
    } else {
        // If database exists, redirect to gallery page
        header("Location: gallery/");
        exit();
    }

?>