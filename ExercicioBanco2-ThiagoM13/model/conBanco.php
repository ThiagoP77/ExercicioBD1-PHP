<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

function conectarBanco(){//Função de realizar a conexão com o banco de dados
    
    $con = mysqli_connect("127.0.0.1:3306", "root", "", "tipi_vacinacao"); //Variável com os dados de conexção
    
    //Configurações extras
    mysqli_query($con, "SET NAMES 'utf8'");
    mysqli_query($con, "SET character_set_connection=utf8");
    mysqli_query($con, "SET character_set_client=utf8");
    mysqli_query($con, "SET character_set_results=utf8");
    
    return $con;//Retorna a variável de conexão
    
}



?>