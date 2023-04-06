<main>
    <main class="d-flex align-items-center">

        <div class="container containerHome  main mt-5">
            <div class="row  justify-content-center">
                <div class="col-12 col-lg-10 bg-dark bg-opacity-75 pt-4 pb-2 px-4 mb-5 rounded-1">
                    <h1 class="text-white text-center p-3">Validation du code</h1>
                    <p class="text-white p-2">Un code de validation a été envoyé à l'adresse e-mail suivante: <strong id="email"></strong>.</p>
                    <p class="text-white p-2">Entrez le code de validation ci-dessous pour réinitialiser votre mot de passe.</p>
                    <form class="p-4" id="validate-code-form">
                        <div class="text-center">
                            <label class="text-white" for="code">Code de validation:</label>
                            <input type="text" id="code" name="code" required>
                            <button class="btn btn-primary text-center" type="submit">Validez</button>
                        </div>
                    </form>
                    <?= $error['mail'] ?? '' ?>
                    <?= $error['code'] ?? '' ?>
                </div>
            </div>
        </div>
    </main>