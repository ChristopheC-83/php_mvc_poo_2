<h1 class="text-center my-4">La taverne des Combattants</h1>
<h3 class="text-center my-5">Tous nos Combattants d'un coup d'oeil !</h3>

<!-- <?php Utilities::showArray($characters) ?> -->

<div class="d-flex flex-wrap gap-5 justify-content-center">
    <?php foreach ($characters as $character) : ?>
        <?php require('./views/components/card.php') ?>
    <?php endforeach ?>
</div>

