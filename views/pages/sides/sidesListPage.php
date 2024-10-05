<h1 class="text-center my-4">La taverne des Combattants</h1>
<h3 class="text-center my-5">Les classes des Personnages</h3>

<?php Utilities::showArray($sides) ?>

<div class="row w-100 border p-3 fw-bold">
    <div class="col-5">Classes</div>
    <div class="col-3 text-center">Couleur</div>
    <div class="col-2 text-center">Modifier</div>
    <div class="col-2 text-center">Supprimer</div>
</div>
<?php foreach ($sides as $side) : ?>
    <div class="row w-100 border p-2">
        <div class="col-5"><?= $side['side'] ?></div>
        <div class="col-3 text-center" style="background-color: <?= $side['color'] ?>"><?= $side['color'] ?></div>
        <div class="col-2 text-center">
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $side['id'] ?>">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </form>
        </div>
        <div class="col-2 text-center">
            <form action="./deleteCharacter" method="POST">
                <input type="hidden" name="id" value="<?= $side['id'] ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>

<?php endforeach; ?>