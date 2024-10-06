<h1 class="text-center my-5">Enregistrement</h1>
<form action="<?= ROOT ?>register" method="POST" class="">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
            <!--  on a=joute pour le role -->
            <input type="hidden" value="user" name="role">
            <div class="entryForm">
                <label for="name" class="form-label">Pseudo</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="entryForm" class="form-label">
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success my-3 w-100">
                Je m'inscris
            </button>
            <a href="<?= ROOT ?>connexion" class="btn btn-info w-100">
                J'ai déjà un compte
            </a>
        </div>
    </div>
</form>