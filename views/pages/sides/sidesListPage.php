<h1 class="text-center my-4">La taverne des Combattants</h1>
<h3 class="text-center my-5">Les classes des Personnages</h3>

<!-- <?php Utilities::showArray($sides) ?> -->
<!-- <?php utilities::showArray($_POST) ?>
 <?php echo $_POST['id'] ?> -->

<div class="row w-100 border p-3 fw-bold">
    <div class="col-4">Classes</div>
    <div class="col-4 text-center">Couleurs</div>
    <?php if (Utilities::isCreator()): ?>
        <div class="col-4 text-center">Actions</div>
    <?php endif ?>
</div>
<?php foreach ($sides as $side) : ?>
    <?php if (empty($_POST['id']) || $_POST['id'] !=  $side['id']) : ?>
        <div class="row w-100 border p-2">
            <div class="col-4"><b><?= $side['side'] ?></b> de <b><?= $side['author'] ?></b></div>
            <div class="col-2 text-center" style="background-color: <?= $side['color'] ?>; height:54px"></div>
            <div class="col-2 text-center"><b><?= $side['color'] ?></b></div>
            <!-- version 1 -->
            <!-- <?php if (Utilities::isCreator()): ?>
                <div class="col-2 text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="./deleteIndex" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            <?php endif ?> -->
            <!-- version 2 -->
            <?php if (Utilities::isCreator()
             && $_SESSION['profile']['name'] === $side['author']
            // pour éviter les doublons de boutons
             && $_SESSION['profile']['role'] != "admin"  )
             : ?>
                <div class="col-2 text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="./deleteIndex" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            <?php endif ?>
            <?php if (Utilities::isAdmin()): ?>
                <div class="col-2 text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
                <div class="col-2 text-center">
                    <form action="./deleteIndex" method="POST">
                        <input type="hidden" name="id" value="<?= $side['id'] ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            <?php endif ?>
        </div>
    <?php else :  ?>
        <form action="<?= ROOT ?>classes/modifySide" method="post">
            <div class="row w-100 border p-2">
                <input type="hidden" name="id" value="<?= $side['id'] ?>">
                <input type="hidden" name="oldName" value="<?= $side['side'] ?>">


                <div class="col-4">
                    <input type="text" name="side" value=" <?= $side['side'] ?>" class="form-control">
                </div>
                <div class="col-1 text-center" style="background-color: <?= $side['color'] ?>"></div>
                <div class="col-1 text-center"><b><?= $side['color'] ?></b></div>
                <div class="col-2 text-center">
                    <input type="color" name="color" value="<?= $side['color'] ?>" class="h-100 ">
                </div>
                <div class="col-4 text-center">
                    <button class="btn btn-warning" type="submit">valider la modification</button>
                </div>
            </div>
        </form>
    <?php endif ?>
<?php endforeach; ?>

<!--  ajoutons une classe -->

<?php if (Utilities::isCreator()): ?>
    <div class="container mt-5">
        <h3 class="text-center my-4">Ajout d'une nouvelle classe</h3>
        <div class="row">
            <div class=" col-12 mx-auto">
                <form action="<?= ROOT ?>classes/createSide" method="POST" class="row">
                    <input type="text" class="col-7 text-primary fs-5  rounded" name="side" placeholder="Ajout d'une nouvelle Classe">
                    <input type="color" class="col-3 rounded mx-3 " name="color" placeholder="sa position" style="height:62px">
                    <button class="col-1 btn btn-light m-0 p-0">
                        <p class="fs-1 m-0 p-0">✅</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php endif ?>