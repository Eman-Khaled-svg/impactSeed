<?php
    $dsn='mysql:host=localhost;dbname=impactseed';
    $username='root';
    $pass='';
    try{
        $conn=new PDO($dsn,$username,$pass);
    }catch(PDOException $e){
        die("didn't connect".$e->getMessage());
    }
?>