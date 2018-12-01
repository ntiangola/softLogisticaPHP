<?php


    try {
        if (file_exists("../../Apllication/core/data/Connection.php")){
            include '../../Apllication/core/data/Connection.php';
            include '../../Apllication/core/data/SQLStatement.php';
        }else if (file_exists("../Apllication/core/data/Connection.php")){
            include '../Apllication/core/data/Connection.php';
            include '../Apllication/core/data/SQLStatement.php';
        }else if (file_exists("Connection.php")){
            include 'Connection.php';
            include 'SQLStatement.php';
        }else{
            include 'Apllication/core/data/Connection.php';
            include 'Apllication/core/data/SQLStatement.php';
        }
    } catch (Exception $e) {
        echo "Erro " . $e->getMessage();
    }


?>
