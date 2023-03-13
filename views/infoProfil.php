    <!---------------- MAIN --------------->
    <?php var_dump($_POST)  ?>
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
                            <form class="bg-dark rounded-1 p-3" method="post" action="" novalidate enctype="multipart/form-data" autocomplete="off">

                                <div class=" row">
                                    <div class="d-flex justify-content-center mt-4 mb-1 ">
                                        <img src="/public/assets/img/avatar.png" class="avatar" alt="avatar" />
                                    </div>
                                    <!------------------------------- AVATAR --------------->
                                    <div class="d-flex justify-content-center">
                                        <div class="btn btn-light mb-4">
                                            <label class="form-label text-dark m-1 " for="avatar">Choose your
                                                avatar</label>
                                            <input type="file" name="avatar" class="form-control d-none" id="avatar" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                    <?= $error['file'] ?? '' ?>
                                    <?= $error['type'] ?? '' ?>
                                    <!------------------------------------------  FIRSTNAME  ---------------------->
                                    <div class="col-12 col-lg-6 p-3">
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="$firstname" placeholder="Firstname" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Firstname" required>
                                    </div>
                                    <?= $error['firstname'] ?? '' ?>

                                    <!------------------------------------------  LASTNAME  ---------------------->
                                    <div class="col-12 col-lg-6 p-3">
                                        <input type="text" class="form-control" name="lastname" id="lastname" value="$lasttname" placeholder="Lastname " pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Lastname" required>
                                    </div>
                                    <?= $error['lastname'] ?? '' ?>
                                    <!------------------------------------------  PSEUDO  ---------------------->
                                    <div class="col-12 p-3">
                                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="$pseudo" placeholder="Pseudo " pattern="<?= REGEX_NO_NUMBER ?>" aria-label="Pseudo" required>
                                    </div>
                                    <?= $error['pseudo'] ?? '' ?>

                                    <!------------------------------------------  PASSWORD  ---------------------->
                                    <!-- !!!!!!!!!!!!!!!!!   AJOUTER OEIL POUR VOIR PASSWORD !!!!!!!!!!!!!!! -->
                                    <div class="col-12 p-3 col-lg-6 p-3">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="$password" aria-label="password">
                                        <small class="text-white d-none" id="passwordHelp">Dois contenir au moins 8 lettres ou plus, une MAJUSCULE et une minuscule ainsi qu'un chiffre.</small><br>
                                        <small class="text-white mx-auto" id="passwordforce"></small>
                                    </div>
                                    <?= $error['password'] ?? '' ?>

                                    <!------------------------------------------  CONFIRM PASSWORD  ---------------------->
                                    <div class="col-12 p-3 col-lg-6 p-3">
                                        <input type="confirmPassword" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password " aria-label="confirmPassword">
                                        <small class="text-white" id="passwordDif"></small>
                                    </div>
                                    <?= $error['confirmPassword'] ?? '' ?>
                                    <!------------------------------------------  TOWN  ---------------------->
                                    <!-- !!!!!!!!!!!!!!!! AJOUT CHAMP RECHERCHE VILLE JSON -->
                                    <!-- <h3 class="text-white ms-2 pt-3">Ville</h3>
                                    <div class="col-12 px-3">
                                        <input type="text" class="form-control" id="townUser" name="userTown" placeholder="userTown" value="$userTown" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="townUser">
                                    </div> -->

                                    <!------------------------------------------  SPORT  ---------------------->
                                    <!------------------------------------------  AJOUT LISTE DE SPORT  ---------------------->

                                    <h3 class="text-white ms-2 pt-3">Sport pratiqué</h3>
                                    <div class="col-12 px-3">
                                        <select class="form-select sportUser" name="sport" pattern="<?= REGEX_NO_NUMBER ?>" id="sportUser" aria-label="sportUser">
                                            <?php foreach ($sports as $sport) { ?>
                                                <!-- SI SPORT = SPORT 'selected' -->
                                            <?php echo '<option value =' . $sport . '>' . $sport . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <?= $error['sport'] ?? '' ?>


                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>
    <!-------  MAIN  ----->