<?php
 include 'conexao.php';

        //meu puxando meus dados do banco de dados com select from
    $buscar_cadastros = "SELECT * FROM plano ";

        //faz a conexão e busca os dados 
    $query_cadastros = mysqli_query ($conn, $buscar_cadastros);
?>


<!doctype html>
<html>
<meta charset="utf-8">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>telefonia Telzir</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    


    <div id="interface">
        <ul>
            <nav>
                <form method='post'>
                    <center>
                    <!-- Botões de navegação -->
                        <button type='submit' class="button" formaction='cadastrar.html'>Cadastrar contato</button>
                    </center>
                </form>
            </nav>
        </ul>
    </div>

    <div class= "container">
     <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Tempo</th>
                <th>Plano FaleMais</th>
                <th>Com FaleMais</th>
                <th>Sem FaleMais</th>
                <th> Excluir</th>
                
            </tr>
        </thead>
        <tbody>

            <?php
            // Estrura de repetição para busca os dados em quanto tive dados no banco
            // mysqli_fetch_array separa meu dados em pedaços 
            while ($receber_contatos = mysqli_fetch_array($query_cadastros))
            {

                //minhas variaveis que estão recebendo os dados da tabela 
                    $id = $receber_contatos['id'];
                    //$valorpordd = $receber_contatos ['valorpordd'];
                    $tempo = $receber_contatos['tempo'];
                    $planoFalaMais = $receber_contatos['planoFalaMais'];
                    $ddDestino = $receber_contatos['ddDestino'];
                    $ddOrigem = $receber_contatos['ddOrigem'];?>

                    
                <?php
                //logica do dd para recebe a taxa pelo dd
                    if( $ddOrigem == 11 && $ddDestino == 16){
                        $valorpordd = 1.90; 
                    }
                    else if( $ddOrigem == 16 && $ddDestino == 11){
                        $valorpordd = 2.90; 
                    }
                    else if( $ddOrigem == 11 && $ddDestino == 17){
                        $valorpordd = 1.70; 
                    }
                    else if( $ddOrigem == 17 && $ddDestino == 11){
                        $valorpordd = 2.70; 
                    }
                    else if( $ddOrigem == 11 && $ddDestino == 18){
                        $valorpordd = 0.90; 
                    }
                    else if( $ddOrigem == 18 && $ddDestino == 11){
                        $valorpordd = 1.90; 
                    }
                    else {
                        $valorpordd = 0;
                    }


                     //Logica do Sem o plano FaleMais
                     if($valorpordd == 0){
                        $vSemPlanoFalaMais = "-";
                     }else{
                    $vSemPlanoFalaMais = ($valorpordd * $tempo);
                    $vSemPlanoFalaMais = number_format($vSemPlanoFalaMais, 2, ',', '');
                    $vSemPlanoFalaMais = "\$ $vSemPlanoFalaMais";
                     }
                    

                    //Logica com o Plano FaleMais
                    if($tempo < $planoFalaMais){
                        $vComPlanoFalaMais = "\$ 0,00";
                        
                        }else{
                            if($valorpordd == 0){
                                $vComPlanoFalaMais = "-";
                            }else{
                                $valorfm = ($valorest=(($tempo-$planoFalaMais)*$valorpordd));
                                $vComPlanoFalaMais = (($valorfm * 0.1) + $valorfm);
                                $vComPlanoFalaMais = number_format($vComPlanoFalaMais, 2, ',', '');
                                $vComPlanoFalaMais = "\$ $vComPlanoFalaMais";
                            }
                            }
                    ?>
               
            <tr>
                <!-- Esta exibindo os dados que estão vindo do banco de dados -->
                <td scope="row"><?php ?></td>
                <td>            <?php echo $ddOrigem ?></td>
                <td>            <?php echo $ddDestino ?></td>
                <td>            <?php echo $tempo?></td>
                <td>            <?php echo "FaleMais $planoFalaMais"; ?></td>
                <td>            <?php echo "$vComPlanoFalaMais"?></td>
                <td>            <?php echo "$vSemPlanoFalaMais"?></td>
                 
                <td>    
                    <!-- Butão para Excluir  -->
                     <form action="excluir.php" method="post">
                     <input type="hidden" name="id" value="<?php echo $id; ?>">   
                     <input class="button" type="submit" value="Excluir" name="Excluir"></form></td>

             </tr> 
            <?php };?>  <!-- Parou a repetição -->   
        </tbody>
    </table>
</div>
<body>
</html>