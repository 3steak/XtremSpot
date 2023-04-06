<main>
    <main class="d-flex align-items-center">

        <div class="container containerHome  main mt-5">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-10 bg-dark bg-opacity-75 pt-4 pb-2 px-4 mb-5 rounded-1">
                    <h1 class="text-white text-center p-3">Récupération du mot de passe</h1>
                    <p class="text-white p-2">Entrez votre adresse e-mail ci-dessous pour réinitialiser votre mot de passe.</p>
                    <form class="p-4" id="reset-password-form">
                        <div class="text-center">
                            <label class="text-white" for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required>
                            <button class="btn btn-primary text-center" type="submit">Envoyer</button>
                        </div>
                    </form>
                    <?= $error['mail'] ?? '' ?>
                </div>
            </div>
        </div>

    </main>