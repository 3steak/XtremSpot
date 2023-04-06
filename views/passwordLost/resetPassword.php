<!-- autre video en fond  -->
<main>


    <div class="container main mt-5">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-12 col-lg-8">
                <!-------------- FORM  ----------------->
                <h1 class="text-center p-2">
                    <span class="xtrem">XTREM</span><span class="spot">SPOT</span><br>
                </h1>
                <form class="bg-dark bg-opacity-75 rounded-1 pt-5 p-3 mb-5" action="" method="post">
                    <h2 class="text-white text-center">Nouveau mot de passe</h2>

                    <!-- Password -->
                    <div class="col-12 p-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nouveau password *" aria-label="password" required>
                        <small class="text-white d-none" id="passwordHelp">Dois contenir au moins 8 lettres ou plus, une MAJUSCULE et une minuscule ainsi qu'un chiffre.</small><br>
                        <small class="text-white mx-auto" id="passwordforce"></small>
                    </div>
                    <?= $error['password'] ?? '' ?>

                    <!-- confirmPassword -->
                    <div class="col-12 p-3">
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmer votre nouveau password *" aria-label="confirmPassword" required>
                        <small class="text-white" id="passwordDif"></small>
                    </div>
                    <?= $error['confirmPassword'] ?? '' ?>

                    <div class="col-12 py-3  d-flex justify-content-center">
                        <button type="submit" id="register" class="btn btn-primary px-5 w-75 text-white">Modifier</button>
                    </div>
                    <div class="col-12 py-4 d-flex justify-content-end">
                        <p class="text-white px-5 mt-2">Ton mot de passe t'es revenu ?</p>
                        <a class="btn btn-sm btn-dark px-5 mt-2 text-white" id="connexion" type="submit" href="/controllers/homeCtrl.php" role="button">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>