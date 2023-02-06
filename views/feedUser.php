    <!--------- MAIN -------->

    <main>
        <!-- MODALMAP -->
        <div class="container-fluid">
            <div class="row">
                <!-- MODAL -->
                <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-white" id="mapModalLabel">New message</h1>
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


        <!-------------- Feed User, content cards ------->

        <!------ CONTENT 1  ----->

        <div class="container  my-3 cardUserContent">
            <div class="row">
                <div class="card text-bg-dark pb-3 col-lg-10 mx-auto">
                    <div class="col-12 p-2 ">
                        <div class="list-group-item d-flex align-items-center ">
                            <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                <a href="#" class="text-decoration-none text-white p-2 ">
                                    Profil Name
                                </a>
                                <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                    <img src="/public/assets/img/testFeedUser.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end ">
                        <div class="row banniereLike p-2 ">
                            <div class="col-12">
                                <p class="contentUserDescprition">Spot cool, attention aux rochers</p>
                            </div>

                            <div class="col-12 dropcenter dropup">
                                <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-thumbs-up fa-2x"></i>
                                </a>
                                <!-- Collapse for comments -->
                                <a class="text-black text-decoration-none p-3" data-bs-toggle="collapse" data-bs-target="#collapseComments">
                                    <i class="fa-solid fa-comment fa-2x"></i>
                                </a>
                                <!-- BOUTON MAP -->
                                <a class=" text-black text-decoration-none p-3"><i class="fa-solid fa-location-dot fa-2x" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER1"></i></a>


                                <!--  BOUTON OPTION -->
                                <a href="" class="text-black text-decoration-none p-3" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis fa-2x"></i>
                                </a>
                                <!-- dropdown menu  -->
                                <ul class="dropdown-menu bg-dark">
                                    <li><a class="dropdown-item text-white" href="#">Signaler</a></li>
                                    <li>
                                        <hr class="dropdown-divider bg-white ">
                                    </li>

                                    <!---- IFUSERID = USERID, display button "Supprimer" ---->
                                    <li><a class="dropdown-item text-white" href="#">Supprimer la publication </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Collapse for comments -->
                        <div id="collapseComments" class="accordion-collapse collapse mt-1 rounded-2" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <!-- Listes de commentaires -->
                            <div class="commentsList px-3 py-1 overflow-auto">
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                            </div>
                            <form action="#" method="post">
                                <div class="mb-2 px-3">
                                    <label for="message-text" class="col-form-label">Ajouter un commentaire :</label>
                                    <textarea class="form-control" maxlength="500" id="message-text"></textarea required>
                            </div>
                            <div class="d-flex justify-content-center pb-2">
                                <button type="submit" class="btn border border-ligth btn-dark ">Commenter</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-----------  CONTENT 2  ------------->
        <div class="container my-3 cardUserContent">
            <div class="row">
                <div class="card text-bg-dark pb-3 col-lg-10 mx-auto">
                    <div class="col-12 p-2 ">
                        <div class="list-group-item d-flex align-items-center ">
                            <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                <a href="#" class="text-decoration-none text-white p-2">
                                    Profil Name
                                </a>
                                <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                    <img src=" /public/assets/img/testFeedUser2.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end ">
                        <div class="row banniereLike p-2">
                            <div class="col-12">
                                <p class="contentUserDescprition">Belle route</p>
                            </div>
                            <div class="col-12">
                                <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-thumbs-up fa-2x"></i>
                                </a>
                                <!-- Collapse pour commentaire -->
                                <a class="text-black text-decoration-none p-3" data-bs-toggle="collapse" data-bs-target="#collapseComments2">
                                    <i class="fa-solid fa-comment fa-2x"></i>
                                </a>
                                <!-- Bouton map -->
                                <a class=" text-black text-decoration-none p-3"><i class="fa-solid fa-location-dot fa-2x" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER2"></i></a>

                                <!--  BOUTON OPTION -->
                                <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-ellipsis fa-2x"></i></a>
                            </div>
                        </div>
                        <!-- Collapse pour commentaires -->
                        <div id="collapseComments2" class="accordion-collapse collapse mt-1 rounded-2" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <!-- Listes de commentaires -->
                            <div class="commentsList px-3 py-1 overflow-auto">
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 px-3">
                                <label for="message-text" class="col-form-label">Ajouter un commentaire :</label>
                                <textarea class="form-control" maxlength="500" id="message-text"></textarea required>
                            </div>
                            <div class="d-flex justify-content-center pb-2">
                                <button type="button" class="btn border border-ligth btn-dark ">Commenter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------ CONTENT 3  ---->
        <div class="container  my-3 cardUserContent">
            <div class="row">
                <div class="card text-bg-dark pb-3 col-lg-10 mx-auto">
                    <div class="col-12 p-2 ">
                        <div class="list-group-item d-flex align-items-center ">
                            <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                <a href="#" class="text-decoration-none text-white p-2">
                                    Profil Name
                                </a>
                                <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                    </div>
                    <img src=" /public/assets/img/testFeedUser3.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column justify-content-end ">
                        <div class="row banniereLike p-2">
                            <div class="col-12">
                                <p class="contentUserDescprition">Vroooom</p>
                            </div>
                            <div class="col-12">
                                <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-thumbs-up fa-2x"></i>
                                </a>
                                <!-- Collapse pour commentaire -->
                                <a class="text-black text-decoration-none p-3" data-bs-toggle="collapse" data-bs-target="#collapseComments3">
                                    <i class="fa-solid fa-comment fa-2x"></i>
                                </a>
                                <!-- BOUTON MAP -->
                                <a class=" text-black text-decoration-none p-3"><i class="fa-solid fa-location-dot fa-2x" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER3"></i></a>

                                <!--  BOUTON OPTION -->
                                <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-ellipsis fa-2x"></i></a>
                            </div>
                        </div>
                        <!-- Collapse pour commentaires -->
                        <div id="collapseComments3" class="accordion-collapse collapse mt-1 rounded-2" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <!-- Listes de commentaires -->
                            <div class="commentsList px-3 py-1 overflow-auto">
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                                <div class="commentUser idX">
                                    <p class="userName fs-5">Username</p>
                                    <p class="text-white fs-6">Lorem lorem lorem test</p>
                                    <hr>
                                </div>
                            </div>
                            <div class="mb-2 px-3">
                                <label for="message-text" class="col-form-label">Ajouter un commentaire :</label>
                                <textarea class="form-control" maxlength="500" id="message-text"></textarea required>
                            </div>
                            <div class="d-flex justify-content-center pb-2">
                                <button type="button" class="btn border border-ligth btn-dark ">Commenter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------ FIN CONTENT 3  ---->

    </main>
    <!-------FIN FEED USER  ----->