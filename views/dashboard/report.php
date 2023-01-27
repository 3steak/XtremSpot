    <!---------------- START MAIN --------------->
    <main>

        <!-- MODALMAP -->
        <div class="container-fluid">
            <div class="row">
                <!-- MODAL -->
                <div class="modal fade" id="deleteMailModal" tabindex="-1" aria-labelledby="deleteMailModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-white" id="deleteMailModalLabel">New message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                oui
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container main mt-5">
            <div class="row d-flex gap-2 justify-content-center">
                <div class="col-12">
                    <h1 class="text-white text-center m-2">SIGNALEMENTS</h1>
                </div>
                <div class="container-fluid col-lg-6  my-3 cardUserContent">
                    <div class="row">
                        <!--  Div reportContent -->
                        <div class="reportContent alert alert-danger" role="alert">
                            <h2 class=" reportTitle">Signalement de "userName"</h2>
                            <p class="">"date"</p>
                            <p class=" text-center"> "Cette photo ne respecte pas les règles de diffusions"
                            </p>
                        </div>
                        <div class="card d-flex  gap-2 text-bg-dark pb-3">
                            <div class="col-12 p-2 ">
                                <div class="list-group-item d-flex align-items-center ">
                                    <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                        <a href="#" class="text-decoration-none text-white p-2 ">
                                            Profil Name
                                        </a>
                                </div>
                                <div>
                                    <p>Publication du DATE </p>
                                </div>
                            </div>
                            <img src=" /public/assets/img/testFeedUser.jpg" class="card-img" alt="...">
                            <div class="col-12 d-flex gap-2"> <button type="button" class="btn btn-primary w-50 mx-auto">C'EST OK</button>

                                <!-- IF SUPPRILER IS PRESS ADD MODAL WITH MAILUSER -->
                                <button type="button" class="btn btn-primary w-50 mx-auto" data-bs-toggle="modal" data-bs-target="#deleteMailModal" data-bs-whatever="USER1">SUPPRIMER</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid col-lg-6  my-3 cardUserContent">
                    <div class="row">
                        <!--  Div ReportContent -->
                        <div class="reportContent alert alert-danger" role="alert">
                            <h2 class=" reportTitle">Signalement de "userName2"</h2>
                            <p class="">"date"</p>
                            <p class=" text-center"> "Ce commentaire est une honte"
                            </p>
                        </div>
                        <div class="container-fluid  mb-3 cardUserContent">
                            <div class="row">
                                <div class="card d-flex  gap-2 text-bg-dark pb-3">
                                    <div class="col-12 p-2 ">
                                        <div class="list-group-item d-flex align-items-center ">
                                            <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                                <a href="#" class="text-decoration-none text-white p-2 ">
                                                    Profil Name
                                                </a>
                                        </div>
                                        <div>
                                            <p>Commentaire du DATE </p>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <textarea class="form-control" value="">WOW AMAZING !</textarea>
                                    </div>
                                    <div class="col-12 d-flex gap-2"> <button type="button" class="btn btn-primary w-50 mx-auto">C'EST OK</button>

                                        <!-- IF DELETE ADD MODAL WITH MAILUSER -->
                                        <button type="button" class="btn btn-primary w-50 mx-auto" data-bs-toggle="modal" data-bs-target="#deleteMailModal" data-bs-whatever="USER2">SUPPRIMER</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </main>
    <!-------  END MAIN  ----->