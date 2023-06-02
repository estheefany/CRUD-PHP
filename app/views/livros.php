<?php include 'layout-top.php' ?>

<br><br><br>

<form method='POST' action='<?=route('livros/salvar/'._v($data,"id"))?>'>

    <label class='col-md-6'>
        Nome do livro
        <input type="text" class="form-control" name="nome_livro" value="<?=_v($data,"nome_livro")?>">
    </label>
    <br>

    <label class='col-md-2'>
        Nome do autor
        <input type="text" class="form-control" name="nome_autor" value="<?=_v($data,"nome_autor")?>">
    </label>
    <br>

    <label class='col-md-6'>
        Capa
        <select name="capa_id" class="form-control">
            <?php
        foreach($capas as $capa){
            _v($data,"capa_id") == $capa['id'] ? $selected='selected' : $selected='';
            print "<option value='{$capa['id']}' $selected>{$capa['capa']}</option>";
        }
        ?>
        </select>
    </label>
    <br>

    <label class='col-md-2'>
        Ano
        <input type="text" class="form-control" name="ano" value="<?=_v($data,"ano")?>">
    </label>
    <br>

    <label class='col-md-6'>
        Leitores
        <select name="leitor_id" class="form-control">
            <option></option>
            <?php
        foreach($usuarios as $usu){
            print "<option value='{$usu['id']}'>{$usu['nome']}</option>";
        }
        ?>
        </select>
    </label>
    <br>

    <?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($leitores as $item): ?>
        <tr>
            <td><?=$item['nome']?></td>
            <td><?=$item['dataNascimento']?></td>
            <td>
                <a href='<?=route("livros/deletarLeitor/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>


    <button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
    <a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("livros")?>">Novo</a>

</form>
<br><br>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome do livro</th>
        <th>Nome do autor</th>
        <th>Capa</th>
        <th>Ano</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

    <tr>
        <td>
            <a href='<?=route("livros/index/{$item['id']}")?>'>Editar</a>
        </td>
        <td><?=$item['nome_livro']?></td>
        <td><?=$item['nome_autor']?></td>
        <td><?=$item['capa']?></td>
        <td><?=$item['ano']?></td>
        <td>
            <a href='<?=route("livros/deletar/{$item['id']}")?>'>Deletar</a>
        </td>
    </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>