    <!---------------- MAIN --------------->

    <main>
        <div class="container main mt-5">
            <div class="row d-flex gap-2 justify-content-center">
                <div class="col-12">
                    <h1 class="text-white text-center m-2">Modifier les informations du profil</h1>
                </div>
                <div class="col-11 m-4">

                    <!-- CARD SETTINGS -->
                    <div class="cardSettings  d-flex justify-content-center m-2 p-2">
                        <div class="col-12 ">
                            <form class="bg-dark rounded-1 p-3" method="post" autocomplete="off">

                                <div class=" row cc-selector">
                                    <!------------------------------- AVATAR --------------->
                                    <h3 class="text-white text-center p-3">Choisis ton avatar !</h3>
                                    <div class="col-lg-6 d-flex justify-content-around center">
                                        <!-- AVATAR 1 -->
                                        <input <?= ($profilUser->avatar === "avatar_1.png") ? "checked='checked'" : '' ?> id="avatar_1" type="radio" name="avatar" value="avatar_1.png" />
                                        <label class="avatar-cc avatar_1" for="avatar_1"></label>
                                        <!-- AVATAR 2 -->
                                        <input <?= ($profilUser->avatar === "avatar_2.png") ? "checked='checked'" : '' ?> id="avatar_2" type="radio" name="avatar" value="avatar_2.png" />
                                        <label class="avatar-cc avatar_2" for="avatar_2"></label>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-around ">
                                        <!-- AVATAR 3 -->
                                        <input <?= ($profilUser->avatar === "avatar_3.png") ? "checked='checked'" : '' ?> id="avatar_3" type="radio" name="avatar" value="avatar_3.png" />
                                        <label class="avatar-cc avatar_3" for="avatar_3"></label>
                                        <!-- AVATAR 4 -->
                                        <input <?= ($profilUser->avatar === "avatar_4.png") ? "checked='checked'" : '' ?> id="avatar_4" type="radio" name="avatar" value="avatar_4.png" />
                                        <label class="avatar-cc avatar_4" for="avatar_4"></label>
                                    </div>

                                    <?= $error['avatar'] ?? '' ?>
                                    <!------------------------------------------  FIRSTNAME  ---------------------->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="firstname" class="form-label">
                                            <h4 class="text-white ms-2 pt-3">Prénom</h4>
                                        </label>
                                        <input type="text" class="form-control text-center" name="firstname" id="firstname" value="<?= htmlentities($profilUser->firstname) ?>" placeholder="Firstname" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Firstname" required>
                                    </div>
                                    <?= $error['firstname'] ?? '' ?>

                                    <!------------------------------------------  LASTNAME  ---------------------->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="lastname" class="form-label">
                                            <h4 class="text-white ms-2 pt-3">Nom</h4>
                                        </label>
                                        <input type="text" class="form-control text-center" name="lastname" id="lastname" value="<?= htmlentities($profilUser->lastname) ?>" placeholder="Lastname " pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Lastname" required>
                                    </div>
                                    <?= $error['lastname'] ?? '' ?>
                                    <!------------------------------------------  PSEUDO  ---------------------->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="updatePseudo" class="form-label">
                                            <h4 class="text-white ms-2 pt-3">Pseudo</h4>
                                        </label>
                                        <input type="text" class="form-control text-center" name="pseudo" id="updatePseudo" value="<?= htmlentities($profilUser->pseudo) ?>" placeholder="Pseudo " pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Pseudo" required>
                                    </div>
                                    <?= $error['pseudo'] ?? '' ?>

                                    <!--------------------------------------------- EMAIL --------------------------->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="email" class="form-label">
                                            <h4 class=" text-white ms-2 pt-3 ">Email</h4>
                                        </label>
                                        <input type="text" id="email" name="email" class="form-control text-center" value="<?= htmlspecialchars($profilUser->email) ?>">
                                        <p><?= $error['email'] ?? '' ?></p>
                                    </div>

                                    <!------------------------------------------  SPORT  ---------------------->

                                    <h4 class="text-white ms-2 pt-3">Sport pratiqué</h4>
                                    <div class="col-12 px-3">
                                        <select class="form-select sportUser" name="idCategories" pattern="<?= REGEX_NO_NUMBER ?>" id="sportUser" aria-label="sportUser">
                                            <?php foreach ($listCategory as $category) { ?>
                                                <option value="<?= $category->id ?>" <?= ($profilUser->category === $category->name) ? 'selected' : '' ?>><?= $category->name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <?= $error['sport'] ?? '' ?>
                                    <!-- Password -->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="password" class="form-label">
                                            <h4 class=" text-white ms-2 pt-3 ">Password</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password *" aria-label="password">
                                        <small class="text-white d-none" id="passwordHelp">Dois contenir au moins 8 lettres ou plus, une MAJUSCULE et une minuscule ainsi qu'un chiffre.</small><br>
                                        <small class="text-white mx-auto" id="passwordforce"></small>
                                    </div>
                                    <?= $error['password'] ?? '' ?>

                                    <!-- confirmPassword -->
                                    <div class="col-12 col-lg-6 px-3">
                                        <label for="confirmPassword" class="form-label">
                                            <h4 class=" text-white ms-2 pt-3 ">Confirmer votre mot de passe</h4>
                                        </label>
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmer votre password *" aria-label="confirmPassword">
                                        <small class="text-white" id="passwordDif"></small>
                                    </div>
                                    <?= $error['confirmPassword'] ?? '' ?>

                                    <div class="col-12 text-center mt-4"><button type="submit" class="btn btn-info">Modifier</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>
    <!-------  END MAIN  ----->