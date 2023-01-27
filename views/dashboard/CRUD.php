    <!---------------- MAIN --------------->
    <main>
        <div class="container-fluid main mt-5">
            <div class="row d-flex gap-2 justify-content-center">
                <div class="col-12">
                    <h1 class="text-white text-center m-2">CRUD ADMIN</h1>
                </div>
                <div class="col-11 m-4">

                    <!-- BOUTONS DE MODERATION -->
                    <div class="cardCrud col-12 col-lg-8 mx-auto  d-flex flex-column gap-2 m-2 p-4 rounded-4">
                        <div class=" btnModeration p-4 col-12 col-lg-6 mx-auto">
                            <a class="btn btn-lg btn-info w-100" href="/controllers/dashboard/moderationCtrl.php" role="button">MODERATION</a>
                        </div>
                        <div class=" btnListUsers p-4 col-12 col-lg-6 mx-auto">
                            <a class="btn btn-lg btn-info w-100" href="/controllers/dashboard/usersListCtrl.php" role="button">USERS</a>
                        </div>
                        <div class=" btnContent p-4 col-12 col-lg-6 mx-auto">
                            <a class="btn btn-lg btn-info w-100" href="/controllers/dashboard/reportCtrl.php" role="button">SIGNALEMENTS</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>
    <!-------  FIN MAIN  ----->