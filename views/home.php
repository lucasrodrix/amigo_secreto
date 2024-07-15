<?php
    require_once '../config/Database.php';
    require_once '../controllers/PessoaController.php';

    // Conexão com o banco de dados
    $database = new Database();
    $db = $database->getConnection();

    // Controlador de Pessoas
    $controller = new PessoaController($db);

    // Deletar pessoa
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
        $controller->delete($_POST['id']);
    }

    // Buscar ou listar pessoas
    if (isset($_GET['keywords'])) {
        $pessoas = $controller->search($_GET['keywords']);
    } else {
        $pessoas = $controller->read();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Amigo Secreto</title>

        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="my-4">Amigo Secreto</h1>

            <div class="mb-3">
                <a href="cadastro.php" class="btn btn-primary">Cadastrar Pessoa</a>
                <a href="sorteio.php" class="btn btn-success">Sortear</a>
                <form action="home.php" method="get" class="form-inline float-right">
                    <input type="text" name="keywords" class="form-control mr-2" placeholder="Buscar...">
                    <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                </form>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($pessoas as $pessoa) { 
                        if (isset($pessoa['id'])) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($pessoa['nome']); ?></td>
                                <td><?php echo htmlspecialchars($pessoa['email']); ?></td>
                                <td>
                                    <a href="cadastro.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="home.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $pessoa['id']; ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                <?php 
                        } 
                    }?>
                </tbody>
            </table>
        </div>
        <script src="js/bootstrap.min.js"></script>        
    </body>
</html>