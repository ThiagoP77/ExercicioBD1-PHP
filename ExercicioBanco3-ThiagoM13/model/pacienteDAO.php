<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

    require "conBanco.php";//Necessita da função presente nesse arquivo

    function inserirPacienteV($nome, $cpf, $data1, $data2, $precisaDose2, $vacina, $foto) {//Função que realiza o cadastro da vacinação no banco de dados

        //Processo de transformar a imagem
        $tamImagem = $foto["size"];//Obtem o tamanho do arquivo de imagem
        $imgAberta = fopen ( $foto["tmp_name"], "r" );//Abre o arquivo de imagem temporário em modo de leitura
        $fotoT = addslashes( fread ( $imgAberta , $tamImagem ) );//Tranforma em vetor de bytes

        //Variável com o comando SQL utilizado
        $sql = "INSERT INTO Paciente (nomePaciente, cpf, dtDose1, dtDose2, precisaDose2, idVacina, fotoPaciente) VALUES ('$nome', '$cpf', '$data1', '$data2', '$precisaDose2', '$vacina', '$fotoT')";

        $conexao = conectarBanco();//Variável de conexão

        mysqli_query($conexao, $sql);//Realiza o cadastro
    }


?>