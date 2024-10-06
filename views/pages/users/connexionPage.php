<h1 class="text-center my-5">Connexion</h1>
<form action="<?= ROOT ?>login" method="POST" class="">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
            <div class="entryForm">
                <label for="name" class="form-label">Pseudo</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="entryForm" class="form-label">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success my-3 w-100">
                Je me connecte
            </button>
            <a href="<?= ROOT ?>enregistrement" class="btn btn-info w-100">
                Je crée mon compte
            </a>
        </div>
    </div>
</form>