<?php

    require "conect.php";

    if (isset($_POST["enviar"])){
        $nome = htmlspecialchars($_POST["nome"]);
        $preco = ($_POST["preco"]);
        $quatidade = ($_POST["quatidade"]);
        $categoria = htmlspecialchars($_POST["categoria"]);

        $erros = [];
        if(empty($nome)){
            $erros[] = "Nome do produto obrigatório para cadastro! ";
        }
        if(empty($preco)){
            $preco[] = "Preço necessário!  ";
        }
        if(count($erros) > 0){
            foreach($erros as $erro){
                echo "ERRO: " . $erro . "<br>";
            }
        }else{
            $sql = "INSERT INTO produtos (nome, preco, quantidade, categoria) VALUES (:nome, :preco, :quantidade, :categoria)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":nome" => $nome,
                ":preco" => $preco,
                ":quantidade" => $quantidade,
                ":categoria" => $categoria
            ]);
            header("Location: index.php");
            exit;
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="conteiner mt-5">   
        <h1>Novo Produto</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
        <br><br>

            <form method="post" action="">

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="nome"><br><br>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" placeholder="preco"><br><br>
                </div>
                    <label for="formGroupExampleInput2" class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" placeholder="quantidade"><br><br>
                </div>
                <label for="formGroupExampleInput2" class="form-label">Categoria</label>
                    <input type="text" name="categoria" class="form-control" placeholder="categoria"><br><br>
                </div>
                <button type="submit" class="btn btn-success">
                    Cadastrar
                </button>
            </form>
        </div>
    </body>
</html>