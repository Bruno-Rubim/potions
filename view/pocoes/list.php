<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once(__DIR__ . "/../../controller/PocaoController.php");
$pocaoCont = new PocaoController();
$pocoes = $pocaoCont->listar();
?>

<?php
    include_once(__DIR__ . "/../include/header.php");
?>

<h3>Listagem de Poções</h3>

<div>
    <a href="inserir.php">Inserir</a>
</div>

<br>

<table border="1">
    <thead>
        <tr>
            <th>Index</th>
            <th>Autor</th>
            <th>Efeito</th>
            <th>Intensidade</th>
            <th>Cor</th>
            <th>Ingredientes</th>
            <th>Receita</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pocoes as $pocao):?>
            <tr>
                <td><?= $pocao->getId()?></td>
                <td><?= $pocao->getAutor()?></td>
                <td><a title="<?= $pocao->getEfeito()->getDesc()?>">
                    <?= $pocao->getEfeito()->getNome()?>
                </a></td>
                <td><?= $pocao->getIntensidade(). "%"?></td>
                <td>
                    <img style="image-rendering: pixelated" width="48px" src="<?php print("../.." . ($pocao->getCor())->getImagem())?>">
                    <?= ($pocao->getCor())->getNome()?>
                </td>
                <td>
                    <img style="image-rendering: pixelated" width="48px" src="<?php print("../.." . ($pocao->getIngredientes()[0])->getImagem())?>">
                    <?= $pocao->getIngredientes()[0]->getNome()?></td>
                <td><?= $pocao->getReceita()?></td>

                <td>
                    <a href="alterar.php?id=<?= $pocao->getId()?>">
                        <img src="../../img/btn_editar.png">
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $pocao->getId()?>" onclick="return confirm('Confirmar exclusão?');">
                        <img src="../../img/btn_excluir.png">
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php
    include_once(__DIR__ . "/../include/footer.php");
?>