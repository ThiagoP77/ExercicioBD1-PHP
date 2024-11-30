<?php

function conectarBanco(){
    
    $con = mysqli_connect("127.0.0.1:3306", "root", "", "tipi_vacinacao" );
    
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, "SET character_set_connection=utf8");
    mysqli_query($con, "SET character_set_client=utf8");
    mysqli_query($con, "SET character_set_results=utf8");
    
    return $con;
    
}



?>