<?php 
    require_once '../controllers/PessoaController.php';
    $controller = new PessoaController();
    $pessoas = $controller->read();
    $sorteio_realizado = false;
    $resultado_sorteio = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $sorteio_realizado = true;
        $resultado_sorteio = realizarSorteio($pessoas);
    }

    function realizarSorteio($pessoas){
        $nomes = array_column($pessoas, 'nome');
        shuffle($nomes);
        $sorteio = [];

        for($i =0; $i < count($nomes); $i++){
            $sorteio[] = [
                'amigo' => $nomes[$i],
                'sorteado' => $nomes[($i +1) % count($nomes)]
            ];
        }
        return $sorteio;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sorteio do Amigo Secreto</title>
        
        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/css/styles.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="my-4">Sorteio Amigo Secreto</h1>
            <?php if($sorteio_realizado){?>
                <div class="alert alert-sucess" role="alert">
                    Sorteio realizado com sucesso!
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Amigo</th>
                            <th>Sorteado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultado_sorteio as $par){?>
                            <tr>
                                <td><?php echo htmlspecialchars($par['amigo']);?></td>
                                <td><?php echo htmlspecialchars($par['sorteado']);?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            <?php }else{?>
                <form action="sorteio.php" method="post">
                    <button type="submit" class="btn btn-primary">Realizar Sorteio</button>
                </form>
            <?php }?>
            <a href="home.php" class="btn btn-secondary mt-3">Voltar</a>
        </div>
        <script src="js/bootstrap.min.js"></script>        
    </body>
</html>