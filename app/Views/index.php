<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-wrapper">
            <h2 class="mb-4">Login</h2>
            <form action="login" method="POST">

                <div class="form-group">
                    <label for="usuario">CPF</label>
                    <input name="usuario" type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input name="senha" type="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

            <br>
            
            <?php $message_success_aleatorio = session()->getFlashdata('valor-aleatorio'); ?>
            <?php if ($message_success_aleatorio): ?>
            <form action="validacao" method="POST">
                <label for="info">Informe o dado solicitado: <?= $message_success_aleatorio ?> </label><br>
                <?php if($message_success_aleatorio =='dia_mes'): ?>
                    <label for="">Mes: </label><br>
                    <input type="text" name="dia" class="form-control" maxlength="2" ><br>
                    <label for="">Mes: </label><br>
                    <input type="text" name="mes" class="form-control" maxlength="2"><br>
                <?php endif; ?>
                <?php if($message_success_aleatorio =='mes_ano'): ?>
                    <label for="">Mes: </label><br>
                    <input type="text" name="mes" class="form-control" maxlength="2"><br>
                    <label for="">Ano:</label><br>
                    <input type="text" name="ano" class="form-control" maxlength="4"><br>
                <?php endif; ?>
                <?php if($message_success_aleatorio =='dia_ano'): ?>
                    <label for="">Dia: </label><br>
                    <input type="text" name="dia" class="form-control" maxlength="2"><br>
                    <label for="">Ano: </label><br>
                    <input type="text" name="ano" class="form-control" maxlength="4"><br>
                <?php endif; ?>
                <?php if($message_success_aleatorio =='nome_mae'): ?>
                    <label for="">Nome da Mãe: </label>
                    <input type="text" class="form-control" name="nome_mae" ><br>
                <?php endif; ?>
                <input type="text" name="info"  value="<?= $message_success_aleatorio ?>" hidden readonly>
                <input type="submit" class="btn btn-primary" value="enviar">
            </form>
            <?php endif; ?>
            
            <?php $message_failed = session()->getFlashdata('failed-login'); ?>
            <?php $message_failed_cpf = session()->getFlashdata('cpf-invalido'); ?>
            <?php if ($message_failed): ?>
                <div class="alert alert-danger" role="alert"><?= $message_failed ?></div>
            <?php endif; ?>
            <?php if ($message_failed_cpf): ?>
                <div class="alert alert-danger" role="alert"><?= $message_failed_cpf ?></div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
