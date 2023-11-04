<?php include_once(__DIR__ . "/../../util/config.php");

?>

<nav class="navbar navbar-expand-md navbar-light bg-success">
    <a class="navbar-brand" href="#">Aula Bootstrap</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navDropDown" data-toggle="dropdown">Cadastros</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Alunos</a>
                <a class="dropdown-item" href="#">Turmas</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
        </li>
    </ul>
</nav>