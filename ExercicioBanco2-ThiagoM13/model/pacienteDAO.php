<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

    require "conBanco.php";//Necessita da função presente nesse arquivo

    function inserirPacienteV($nome, $cpf, $data1, $data2, $precisaDose2, $vacina) {//Função que realiza o cadastro da vacinação no banco de dados

        //Variável com o comando SQL utilizados
        $sql = "INSERT INTO Paciente (nomePaciente, cpf, dtDose1, dtDose2, precisaDose2, idVacina) VALUES ('$nome', '$cpf', '$data1', '$data2', '$precisaDose2', '$vacina')";

        $conexao = conectarBanco();//Variável de conexão

        mysqli_query($conexao, $sql);//Realiza o cadastro
    }


?>