<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="login" method="POST">

        <label for="">CPF</label></br>
        <input name="usuario" type="text" required>
        </br>
        <label for="">Senha</label></br>
        <input name="senha" type="password" required>
        </br></br>
        <input type="submit" value="enviar">

    </form>
</br>
    <?php $message_success_aleatorio = session()->getFlashdata('valor-aleatorio'); ?>
    <?php if ($message_success_aleatorio): ?>

    <form action="validacao" method="POST">
        
        <label for="info">Informe o dado solicitado:
        <?php echo $message_success_aleatorio ?> </br>
        </label>
        <?php if($message_success_aleatorio =='dia_mes'): ?>
            <label for="">Mes: </label></br>
            <input type="text" name="dia" maxlength="2" ></br>
            
            <label for="">Mes: </label></br>
            <input type="text" name="mes" maxlength="2"></br>
        <?php endif; ?>
        <?php if($message_success_aleatorio =='mes_ano'): ?>
            <label for="">Mes: </label></br>
            <input type="text" name="mes" maxlength="2"></br>
            <label for="">Ano:</label></br>
            <input type="text" name="ano" maxlength="4"></br>
        <?php endif; ?>
        <?php if($message_success_aleatorio =='dia_ano'): ?>
            <label for="">Dia: </label></br>
            <input type="text" name="dia" maxlength="2"></br>
            <label for="">Ano: </label></br>
            <input type="text" name="ano" maxlength="4"></br>
        <?php endif; ?>
        <?php if($message_success_aleatorio =='nome_mae'): ?>
            <label for="">Nome da Mãe: </label>
            <input type="text" name="nome_mae" ></br>
        <?php endif; ?>
        <input type="text" name="info"  value="<?= $message_success_aleatorio ?>" hidden readonly>

        <input type="submit" value="enviar">
    </form>
    <?php endif; ?>

    <?php $message_failed = session()->getFlashdata('failed-login'); ?>
    <?php $message_failed_cpf = session()->getFlashdata('cpf-invalido'); ?>

    <?php if ($message_failed): ?>
        <!-- <div class="alert alert-danger mt-5 text-center" role="alert"> -->
        <div>
            <?php echo $message_failed; ?>
        </div>
    <?php endif; ?>
    <?php if ($message_failed_cpf): ?>
        <!-- <div class="alert alert-danger mt-5 text-center" role="alert"> -->
        <div>
            <?php echo $message_failed_cpf; ?>
        </div>
    <?php endif; ?>


</body>

</html>