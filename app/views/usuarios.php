<?php include 'layout-top.php' ?>

<br><br><br>

<form method='POST' action='<?=route('usuarios/salvar/'._v($data,"id"))?>'>

    <label class='col-md-6'>
        Nome
        <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>">
    </label>
    <br>

    <label class='col-md-2'>
        Data de Nascimento
        <input type="text" class="form-control" name="dataNascimento" value="<?=_v($data,"dataNascimento")?>">
    </label>
    <br>

    <button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
    <a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("usuarios")?>">Novo</a>

</form>
<br><br>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

    <tr>
        <td>
            <a href='<?=route("usuarios/index/{$item['id']}")?>'>Editar</a>
        </td>
        <td><?=$item['nome']?></td>
        <td><?=$item['dataNascimento']?></td>
        <td>
            <a href='<?=route("usuarios/deletar/{$item['id']}")?>'>Deletar</a>
        </td>
    </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>