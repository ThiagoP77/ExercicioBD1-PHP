<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

    require "funcoesuteis.php";//Necessita da função presente nesse arquivo
    require "../model/pacienteDAO.php";//Necessita da função presente nesse arquivo
    
    $nome = $_POST["txtNome"];//Recebe valor do formulario.php
    $cpf = $_POST["txtCPF"];//Recebe valor do formulario.php
    $vacina = $_POST["listaVacinas"];//Recebe valor do formulario.php
    $dose = $_POST["dose"];//Recebe valor do formulario.php
    $data1 = $_POST["txtData1"];//Recebe valor do formulario.php
    $data2 = $_POST["txtData2"];//Recebe valor do formulario.php
    $precisaDose2;//Cria a variável

    $msgErro = validarCampos($nome, $cpf, $vacina, $dose, $data1, $data2);//Chama a função de validação em "funcoesuteis.php"

    if ( empty($msgErro) ) {//Envia mensagem com os resultados corretos quando a mensagem de erros está vazia

        if ($dose == 2) {//Se a dose for a segunda, não precisa mais de segunda dose
            $precisaDose2 = 0;
        } else {//Se a dose for a primeira, verifica se precisa de segunda dose
            if ($vacina ==1 || $vacina==2 || $vacina==3){//Precisa de segunda dose
                $precisaDose2 = 1;
            }
            else {//Não precisa de segunda dose
                $precisaDose2 = 0;
            }
        }

        if ($dose=="1"){//Resultado caso seja a dose 1
            $data2 = null;//Define a data2 como null
            inserirPacienteV($nome, $cpf, $data1, $data2, $precisaDose2, $vacina);//Chama a função de cadastrar a vacinação no banco de dados
            header("Location:../visao/formulario.php?msg=Primeira Dose cadastrada com sucesso!");
        }

        if ($dose=="2"){//Resultado caso seja a dose 2
            $data1 = null;//Define a data1 como null
            inserirPacienteV($nome, $cpf, $data1, $data2, $precisaDose2, $vacina);//Chama a função de cadastrar a vacinação no banco de dados
            header("Location:../visao/formulario.php?msg=Segunda Dose cadastrada com sucesso!");
        }


    } else {//Envia mensagem de erro quando ela não está vazia

        header("Location:../visao/formulario.php?msg=<font color=red>$msgErro</font>");

    }

?>