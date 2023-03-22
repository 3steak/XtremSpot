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
                                    <!------------------------------- AVATAR --------------->

                                    <div class="col-lg-6 d-flex justify-content-between ">
                                        <!-- AVATAR 1 -->
                                        <input type="radio" id="avatar_1" name="avatar" class="Send_data input-hidden" value="avatar_1" />
                                        <label for="avatar_1">
                                            <img src="./../public/assets/uploads/photoProfil/avatar_1.png" class="avatar" />
                                            <br>
                                            <span class="text-white">Avatar 1</span>
                                        </label>
                                        <!-- AVATAR 2 -->
                                        <input type="radio" id="avatar_2" name="avatar" class="Send_data input-hidden" value="avatar_2" />
                                        <label for="avatar_2">
                                            <img src="./../public/assets/uploads/photoProfil/avatar_2.png" class="avatar" />
                                            <br>
                                            <span class="text-white">Avatar 2</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-between ">
                                        <!-- AVATAR 3 -->
                                        <input type="radio" id="avatar_3" name="avatar" class="Send_data input-hidden" value="avatar_3" />
                                        <label for="avatar_3">
                                            <img src="./../public/assets/uploads/photoProfil/avatar_3.png" class="avatar" />
                                            <br>
                                            <span class="text-white">Avatar 3</span>
                                        </label>
                                        <!-- AVATAR 4 -->
                                        <input type="radio" id="avatar_4" name="avatar" class="Send_data input-hidden" value="avatar_4" />
                                        <label for="avatar_4">
                                            <img src="./../public/assets/uploads/photoProfil/avatar_4.png" class="avatar" />
                                            <br>
                                            <span class="text-white">Avatar 4</span>
                                        </label>
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


                                    <!------------------------------------------  SPORT  ---------------------->

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