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
                            <form class="bg-dark rounded-1 p-3" action="" enctype="multipart/form-data">

                                <div class=" row">

                                    <div class="d-flex justify-content-center mt-4 mb-1 ">
                                        <img src="./public/assets/img/avatar.png" class="avatar" alt="avatar" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn btn-light mb-4">
                                            <label class="form-label text-dark m-1 " for="avatar">Choose your
                                                avatar</label>
                                            <input type="file" name="avatar" class="form-control d-none" id="avatar" accept="image/png, image/jpeg">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 p-3">
                                        <input type="text" class="form-control" id="firstname" placeholder="First name " aria-label="First name">
                                    </div>
                                    <div class="col-12 col-lg-6 p-3">
                                        <input type="text" class="form-control" id="lastname" placeholder="Last name " aria-label="Last name">
                                    </div>

                                    <div class="col-12 p-3">
                                        <input type="password" class="form-control" id="password" placeholder="Password " aria-label="password">
                                    </div>
                                    <div class="col-12 p-3">
                                        <input type="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm your password " aria-label="confirmPassword">
                                    </div>

                                    <h3 class="text-white ms-2 pt-3">Ville</h3>
                                    <div class="col-12 px-3">
                                        <input type="text" class="form-control" id="townUser" placeholder="userTown" aria-label="townUser">
                                    </div>

                                    <h3 class="text-white ms-2 pt-3">Sport pratiqué</h3>
                                    <div class="col-12 px-3">
                                        <input type="text" class="form-control" id="sportUser" placeholder="sportUser" aria-label="sportUser">
                                    </div>

                                    <h3 class="text-white ms-2 pt-3">Birthday</h3>
                                    <div class="col-12 px-3">
                                        <input type="date" class="form-control" id="birthdayUser" placeholder="" aria-label="birthdayUser">
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center m-4"> <button class="btn btn-info" type="submit">Modifier</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>
    <!-------  MAIN  ----->