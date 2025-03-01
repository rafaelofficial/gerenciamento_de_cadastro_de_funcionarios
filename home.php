<!DOCTYPE html>
<?php
    require_once "verifica.php";
?>
<html>
    <head>
        <title>Gerenciamento de Funcionários</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </head>

    <body>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">        
            <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">           
                <?php           
                    echo "<p>Gerenciamento de funcionários</p>";
                    echo "<p>Bem vindo, ".$_SESSION['user']."!</p>";
                ?>
            </div>    
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <?php
                    echo "<p><a class='nav-link' href='sair.php'>Sair</a></p>"               
                    ?>
                </li>
            </ul>                
        </header>

        <div class="container-fluid">
            <div class="row">

                <nav id="sidbarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" >
                    <div class="position-sticky pt-3 col-6 mx-auto d-grid gap-2">
                        <button type="button" class="btn btn-outline-dark" id="bt_exibir" onclick="mudar('tabelaFunc')">Exibir</button>
                        <button type="button" class="btn btn-outline-dark" id="bt_inserir" onclick="mudarForm('inserirDados')">Inserir</button>                           
                        <button type="button" class="btn btn-outline-dark">Alterar</button>
                        <button type="button" class="btn btn-outline-dark">Remover</button>
                    </div>
                </nav>                     
                
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    <div id="tabelaFunc" class="table-responsive" style="display:none">
                        <?php
                            require_once "funcionarios.php";
                            $funcio = new funcionarios();
                            $resp = $funcio->buscarTodos();
                            echo"<table class='table table-dark table-sm'>";
                            echo"<thead>";
                            echo"<tr>";
                            echo"<th>ID</th><th>Nome</th><th>Data de Nascimento</th>";
                            echo"<th>CPF</th><th>Cadastro</th><th>Salario</th><th>Cargo</th>";
                            echo"<th>Setor</th><th>Experiência</th><th>Responsável</th>";
                            echo"</tr>";
                            echo"</thead>";
                            foreach($resp as $linha){
                                echo"<tr>";
                                echo"<td>".$linha['idfuncionario']."</td>";
                                echo"<td>".$linha['nomefuncionario']."</td>";
                                echo"<td>".$linha['datanascimento']."</td>";
                                echo"<td>".$linha['cpf']."</td>";
                                echo"<td>".$linha['cadastro']."</td>";
                                echo"<td>".$linha['salario']."</td>";
                                echo"<td>".$linha['cargo']."</td>";
                                echo"<td>".$linha['setor']."</td>";
                                echo"<td>".$linha['id_experiencia']."</td>";
                                echo"<td>".$linha['id_usuario']."</td>";
                                echo"</tr>";
                            }
                            echo"</table>";
                        ?>
                    </div>

                    <div id="inserirDados" style="display:none">
                        <h3>Inserir Funcionários</h3>
                        <form action="" method="post">
                        <p><label for="nomeF">Nome:</label><br />
                        <input type="text" name="nomeF" required></p>
                        <p><label for="datanascF">Data de Nascimento:</label><br />
                        <input type="text" name="datanascF"></p>
                        <p><label for="cpfF">CPF:</label><br />
                        <input type="text" name="cpfF"></p>
                        </form>
                    </div>

                </main>
            </div>
        </div>
    </body>
</html>