<!-- Aluno: Thiago Piffer Lauro. Turma: M13. -->

<!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Vacinação</title>

    </head>

    <body>

        <form method="post" action="../controlador/cadVacinacao.php" name="formCadastro" >
            <H1>Cadastro de Vacinação</H1>
            <table>
                 <tr>
                    <th> Nome do paciente </th>
                    <td><input type="text" name="txtNome" size="40" required=""></td>
                </tr>
                <tr>
                    <th> CPF do paciente </th>
                    <td><input type="text" name="txtCPF" size="40" required="" 
                               maxlength="14" pattern="\d{3}.\d{3}.\d{3}-\d{2}"></td>
                </tr>
                <tr>
                    <th>Vacina</th>
                    <td>
                        <select name="listaVacinas" required="">
                            <option value="">Selecione uma vacina</option>
                            <?php
                                require "../model/vacinaDAO.php";
                                $opcao = carregarComboVacina();              
                                echo $opcao;
                            ?>
                            
                        </select>        
                    </td>
                </tr>
                <tr>
                    <th>Dose</th>
                    <td>
                        <input type="radio" name="dose" value="1" checked>1ª dose<BR>
                        <input type="radio" name="dose" value="2" />2ª dose
                    </td>
                </tr>
                <tr>
                    <th> Data da Dose1 </th>
                    <td><input type="date" name="txtData1" size="40" maxlength="10" 
                               pattern="\d{2}/\d{2}/\d{4}"></td>
                </tr>   
                <tr>
                    <th> Data da Dose2 </th>
                    <td><input type="date" name="txtData2" size="40" maxlength="10" 
                               pattern="\d{2}/\d{2}/\d{4}"></td>
                </tr>
                                   
                <tr>
                    <td><input type="submit" name="btnEnviar" value="Enviar"></td>
                    <td><input type="reset" name="btnLimpar" value="Limpar"></td>
                </tr>
            </table>
        </form>

        <?php
            // Exibir a mensagem de ERRO caso OCORRA
            if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
                $mensagem = $_GET["msg"];
                echo "<br><FONT color=red>$mensagem</FONT>";
            }
        ?>

    </body>
</html>

