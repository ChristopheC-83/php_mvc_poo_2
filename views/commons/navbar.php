<?php

$navItems=[
    ['href'=>ROOT,'text'=>'Accueil'],
    ['href'=>ROOT.'personnages/liste','text'=>'Liste des Combattants'],
    ['href'=>ROOT.'personnages/nouveau','text'=>'Création d\'un Combattant'],
    ['href'=>ROOT.'classes/liste','text'=>'Les Classes']
];
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary customShadow border-bottom  border-black">
        <div class="container container-fluid">
            <a class="navbar-brand" href="<?= ROOT?>">PHP / MVC /POO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav"> 

                <?php foreach($navItems as $navItem): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $navItem['href']?>"><?= $navItem['text']?></a>
                    </li>
                <?php endforeach; ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT?>personnages/liste">Liste des Combattants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT?>personnages/nouveau">Création d'un Combattant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT?>classes/liste">Les Classes</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>