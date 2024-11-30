<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

    require "conBanco.php";//Necessita da função presente nesse arquivo
    static $con;//Variável estática

function carregarComboVacina() {//Função de preencher a ComboBox com as vacinas presentes no banco de dados

    $comSql = "SELECT * FROM vacina";//Lista todos os dados da tabela "vacina"
    $con = conectarBanco();//Chama a função de conexção com o banco    
    $res = mysqli_query($con, $comSql);//Recebe o resultado do comando sql

    $opcao = "";//Variável vazia

    while (  $reg = mysqli_fetch_assoc($res)  ) {//Passa pelo resultado linha por linha pegando os valores
        // Pegar os campos do REGISTRO
        $idv = $reg["idVacina"];//Pega o "idVacina"
        $nomev = $reg["nomeVacina"];//Pega o "nomeVacina"

        $opcao = $opcao . "<OPTION value='$idv'>$nomev</OPTION>";
    }

    return $opcao;//Retorno com o resultado

}

?>