<?php

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="pdo_crud_p1";

    try{
        $db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    }

    catch(Exception $ex){
        echo $ex->getMessage();
    }

    include './../site/Crud.php'; 

    $crud = new Crud($db);