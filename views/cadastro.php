<?php
require_once '../controllers/PessoaController.php';
$controller = new PessoaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $controller->update($_POST['id'], $_POST['nome'], $_POST['email']);
    } else {
        $controller->create($_POST['nome'], $_POST['email']);
    }
    header('Location: home.php');
    exit;
}

$pessoa = ['id' => '', 'nome' => '', 'email' => ''];
if (isset($_GET['id'])) {
    $pessoa = $controller->readById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Pessoa</title>

        <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h1 class="my-4"><?php echo empty($pessoa['id']) ? 'Cadastrar Pessoa' : 'Editar Pessoa'; ?></h1>
        <form action="cadastro.php" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo htmlspecialchars($pessoa['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($pessoa['email']); ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $pessoa['id']; ?>">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="home.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
        <script src="js/bootstrap.min.js"></script>        
    </body>
</html>