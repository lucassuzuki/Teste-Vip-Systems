<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="h-100 col-md-12 p-2">
            <h2 class="mb-2 mt-2 titulo-perfil">Dados do Usuário</h2>
            <hr>
            <div class="row p-2">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <?php if (!empty($foto)): ?>
                            <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="Foto de Perfil">
                        <?php else: ?>
                            <p>Foto de perfil não encontrada.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12 mb-2 p-2 my-2 col-md-12">
                    <label for="userEmail"><b>Nome do Usuário</b></label>
                    <input type="email" class="form-control" id="userEmail" value="<?= session()->get('nome') ?>" name="usuario" disabled>
                    <input type="text" class="form-control" value="<?= session()->get('id') ?>" name="id" hidden readonly>
                </div>
            </div>
        </div>
        <form action="logout" method="POST">
            <input type="submit" value="Logout" class="btn btn-danger mt-3">
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
