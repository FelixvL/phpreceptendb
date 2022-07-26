<?php
    require("functiesphp.php");
    $conn = verbindDB();
    $usern = $_GET["usern"];
    $wachtw = $_GET["wachtw"];
    $sql = "SELECT * FROM gebruiker WHERE gebruikernaam='$usern' AND wachtwoord='$wachtw'";
//    echo $sql;
    $rs = $conn -> query($sql);
//    print_r($rs);
    if($rs->num_rows == 0){
        echo "false";
    }else{
        echo "true";
    }
?>