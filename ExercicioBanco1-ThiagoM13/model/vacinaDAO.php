<?php

require "conBanco.php";    
static $con;

function carregarComboVacina() {
    $comSql = "SELECT * FROM vacina";
    $con = conectarBanco();    
    $res = mysqli_query($con, $comSql );

    $opcao = "";
    while (  $reg = mysqli_fetch_assoc($res)  ) {
        // Pegar os campos do REGISTRO
        $idv = $reg["idVacina"];
        $nomev = $reg["nomeVacina"];

        $opcao = $opcao . "<OPTION value='$idv'>$nomev</OPTION>";
    }

    return $opcao;

}












?>