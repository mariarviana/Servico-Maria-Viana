<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Novo Cliente</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">

        <section class="container mt-3">
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });
                if (filter_has_var(INPUT_GET, 'id')) {
                    $cliente = new Cliente();
                    $id = filter_input(INPUT_GET, 'id');
                    $clienteEdit = $cliente->buscar('idCliente', $id);
                }
                if (filter_has_var(INPUT_GET, 'idDel')) {
                    $cliente = new Cliente();
                    $id = filter_input(INPUT_GET, 'idDel');
                    $cliente->deletar('idCliente', $id);
                ?>
                    <script>
                        window.location.href = 'clientes.php';
                    </script>
                <?php
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                $cliente = new Cliente();
                $id = filter_input(INPUT_POST, 'txtId');
                $cliente->setId($id);
                $cliente->setNome(filter_input(INPUT_POST, 'txtNome'));
                $cliente->setEndereco(filter_input(INPUT_POST, 'txtEndereco'));
                $cliente->setTelefone(filter_input(INPUT_POST, 'txtTelefone'));
                $cliente->setNascimento(filter_input(INPUT_POST, 'txtNascimento'));
                $cliente->setBairro(filter_input(INPUT_POST, 'txtBairro'));
                $cliente->setCidade(filter_input(INPUT_POST, 'txtCidade'));
                $cliente->setEstado(filter_input(INPUT_POST, 'txtEstado'));
                if (empty($id)) {
                    $cliente->inserir();
                } else {
                    $cliente->atualizar('idCliente', $id);
                }
            ?>
                <script>
                    window.location.href = 'clientes.php';
                </script>
            <?php
            } else {
            ?>
                <div class="mt-3 col-4" style=" margin: 0 auto; width: 400px;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="txtId" value="<?php echo isset($ClienteEdit->idCliente) ? $clienteEdit->idCliente : null ?>">
                        <div class="form-group">
                            <label for="txtCliente">Cliente</label>
                            <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Cliente" value="<?php echo isset($clienteEdit->nomeCliente) ? $clienteEdit->nomeCliente : null ?>">

                        </div>
                        <div class="form-group">
                            <label for="txtEndereco">Endereço</label>
                            <textarea name="txtEndereco" id="txtEndereco" class="form-control"><?php echo isset($clienteEdit->enderecoCliente) ? $clienteEdit->enderecoCliente : null ?></textarea>

                        </div>
                        <div class="form-group mb-3">
                            <label for="txtTelefone">Telefone</label>
                            <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="Telefone" value="<?php echo isset($clienteEdit->telefoneCliente) ? $clienteEdit->telefoneCliente : null ?>">

                        </div>
                        <div class="form-group mb-3">
                            <label for="txtNascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" placeholder="Data de Nascimento" value="<?php echo isset($clienteEdit->nascimentoCliente) ? $clienteEdit->nascimentoCliente : null ?>">

                        </div>
                        <div class="form-group mb-3">
                            <label for="txtBairro">Bairro</label>
                            <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro" value="<?php echo isset($clienteEdit->bairroCliente) ? $clienteEdit->bairroCliente : null ?>">

                        </div>
                        <div class="form-group mb-3">
                            <label for="txtCidade">Cidade</label>
                            <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade" value="<?php echo isset($clienteEdit->cidadeCliente) ? $clienteEdit->cidadeCliente : null ?>">

                        </div>
                        <div class="form-group mb-3">
                        <label for="sltEstado">Estado</label>
                    <select id="sltEstado" name="sltEstado" class="form-select" aria-label="Default select example">
                    <option selected>Selecione um estado</option>
                    
                        <?php $selEstado = isset ($clienteEdit->estadoCliente) ? $clienteEdit->estadoCliente : null?>
                        <option value="AC" <?php if($selEstado=='AC') echo 'selected' ?>>Acre</option>
                        <option value="AL" <?php if($selEstado=='AL') echo 'selected' ?>>Alagoas</option>
                        <option value="AP" <?php if($selEstado=='AP') echo 'selected' ?>>Amapá</option>
                        <option value="AM" <?php if($selEstado=='AM') echo 'selected' ?>>Amazonas</option>
                        <option value="BA" <?php if($selEstado=='BA') echo 'selected' ?>>Bahia</option>
                        <option value="CE" <?php if($selEstado=='CE') echo 'selected' ?>>Ceará</option>
                        <option value="DF" <?php if($selEstado=='DF') echo 'selected' ?>>Distrito Federal</option>
                        <option value="ES" <?php if($selEstado=='ES') echo 'selected' ?>>Espírito Santo</option>
                        <option value="GO" <?php if($selEstado=='GO') echo 'selected' ?>>Goiás</option>
                        <option value="MA" <?php if($selEstado=='MA') echo 'selected' ?>>Maranhão</option>
                        <option value="MT" <?php if($selEstado=='MT') echo 'selected' ?>>Mato Grosso</option>
                        <option value="MS" <?php if($selEstado=='MS') echo 'selected' ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if($selEstado=='MG') echo 'selected' ?>>Minas Gerais</option>
                        <option value="PA" <?php if($selEstado=='PA') echo 'selected' ?>>Pará</option>
                        <option value="PB" <?php if($selEstado=='PB') echo 'selected' ?>>Paraíba</option>
                        <option value="PR" <?php if($selEstado=='PR') echo 'selected' ?>>Paraná</option>
                        <option value="PE" <?php if($selEstado=='PE') echo 'selected' ?>>Pernambuco</option>
                        <option value="PI" <?php if($selEstado=='PI') echo 'selected' ?>>Piauí</option>
                        <option value="RJ" <?php if($selEstado=='RJ') echo 'selected' ?>>Rio de Janeiro</option>
                        <option value="RN" <?php if($selEstado=='RN') echo 'selected' ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if($selEstado=='RS') echo 'selected' ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if($selEstado=='RO') echo 'selected' ?> >Rondônia</option>
                        <option value="RR" <?php if($selEstado=='RR') echo 'selected' ?>>Roraima</option>
                        <option value="SC" <?php if($selEstado=='SC') echo 'selected' ?>>Santa Catarina</option>
                        <option value="SP" <?php if($selEstado=='SP') echo 'selected' ?>>São Paulo</option>
                        <option value="SE" <?php if($selEstado=='SE') echo 'selected' ?>>Sergipe</option>
                        <option value="TO" <?php if($selEstado=='TO') echo 'selected' ?>>Tocantins</option>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </section>

    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>
<!--Maria Eduarda Ribeiro Viana-->
</html>