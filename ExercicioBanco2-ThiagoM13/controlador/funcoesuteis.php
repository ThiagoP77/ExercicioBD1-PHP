<?php

    //Aluno: Thiago Piffer Lauro. Turma: M13.

function validarCampos($nome, $cpf, $vacina, $dose, $data1, $data2) {//Função que verifica os dados inseridos no formulário

    $msgErro = "";//Mensagem de erro começa vazia

    if ( empty($nome) or strlen($nome)<3 ) {//Exige que o nome seja preenchido e tenha mais de 3 caracteres
        $msgErro = $msgErro . "Informe um nome com pelo menos 3 caracteres.<br>";        
    }        
    
    if ( empty($cpf) ) {//Exige que o CPF seja inserido
        $msgErro = $msgErro . "Informe o CPF.<br>";
    } 

    if ( (!empty($cpf)) && validarCPF($cpf) == false) {//Exige que o CPF seja válido
        $msgErro = $msgErro . "CPF inválido.<br>";
    }

    if (($dose==2) && ($vacina!=1) && ($vacina!=2) && ($vacina!=3)) {//Verifica se a vacina precisa de segunda dose caso a data2 esteja preenchida
        $msgErro = $msgErro . "Dados inválidos, essa vacina não necessita de segunda dose.<br>";
    } else {//Caso a vacina precise de segunda dose
        
        if ((empty($data2)) && ($dose==2)) {//Exige a data2 preenchida caso a dose seja a segunda
            $msgErro = $msgErro . "Insira a data da segunda dose (data 2).<br>";
        }
        
        if ((!empty($data1)) && ($dose==2)) {//Exige a data1 não preenchida caso a dose seja a segunda
            $msgErro = $msgErro . "Para a segunda dose, a data 1 deve estar vazia.<br>";
        }
        
    }

    if ((empty($data1)) && ($dose==1)) {//Exige a data1 preenchida caso a dose seja a primeira
        $msgErro = $msgErro . "Insira a data da primeira dose (data 1).<br>";
    }

    if ((!empty($data2)) && ($dose==1)) {//Exige a data2 não preenchida caso a dose seja a primeira
        $msgErro = $msgErro . "Para a primeira dose, a data 2 deve estar vazia.<br>";
    }

    return $msgErro;//Retorna a mensagem de erro

}

function validarCPF($cpf) {//Função utilizada para verificar se o CPF é válido (fonte: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40)

        //Pega os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
        //Verifica se todos os digitos foram informados
        if (strlen($cpf) != 11) {
            return false;
        }
    
        //Verifica repetição de números
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        //Cálculo de validação do CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;//Retorno da função caso esteja tudo certo
}

?>