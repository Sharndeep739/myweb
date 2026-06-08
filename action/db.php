<?php
$db_host = "localhost";
$db_name = "myweb";
$db_user = "root";
$db_pass = "BTSsharndeep267";

try{
    $conn = new PDO(
        "mysql:host=$db_host;dbname=$db_name",
        $db_user,
        $db_pass
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
}catch(PDOException $e){

    echo json_encode([
        "status"=>false,
        "message"=>$e->getMessage()
    ]);

}