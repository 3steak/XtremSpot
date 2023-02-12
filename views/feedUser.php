<!--------- MAIN -------->
<?php flash('commentEmpty') ?>
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
    <!--------------------- FILTER BUTTON ---------------->
    <div class="container my-3">
        <div class="row">
            <div class=" col-lg-10 mx-auto">
                <div class="d-flex justify-content-center  p-2">
                    <h1 class="text-white m-2">VOICI LES SPOTS ! </h1>
                    <button class="btn btn-sm btn-primary m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                            <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg> Filtres
                    </button>
                </div>
            </div>
            <div class=" col-lg-10  mx-auto">
                <div class="collapse" id="collapseFilters">
                    <p class="text-white">Filtrer par :</p>
                    <form action="" method="get">
                        <div class="d-flex gap-2 m-2">
                            <div class="col-4 col-lg-4">
                                <select class="form-select  sportUser" name="sport" id="sportUser" aria-label="sportUser">
                                    <?php foreach ($sports as $sport) { ?>
                                        <!-- SI SPORT = SPORT 'selected' -->
                                    <?php echo '<option value =' . $sport . '>' . $sport . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-4 col-lg-4">
                                <select class="form-select  townUser" name="town" id="townUser" aria-label="townUser">
                                    <?php foreach ($towns as $town) { ?>
                                        <!-- SI town = town 'selected' -->
                                    <?php echo '<option value =' . $town . '>' . $town . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <a class="btn btn-sm btn-dark" id="filter" type="submit" href="#" role="button">Filtrer</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-------------- Feed User, content cards ------->

    <!------ CONTENT 1  ----->

    <div class="container  my-3 cardUserContent">
        <div class="row">
            <div class="card text-bg-dark pb-3 col-lg-10 mx-auto">
                <div class="col-12 p-2">
                    <div class="list-group-item d-flex align-items-center ">
                        <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                            <a href="#" class="text-decoration-none text-white p-2 ">
                                Profil Name
                            </a>
                            <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>
                            <a href="#" class="text-black ms-auto  me-2 fa-2xl"><i class="fa-regular fa-bookmark"></i></a>
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
                                <p class="userName fs-5">Pseudo</p>
                                <p class="text-white fs-6">Lorem lorem lorem test</p>
                                <hr>
                            </div>
                            <div class="commentUser idX">
                                <p class="userName fs-5">Pseudo</p>
                                <p class="text-white fs-6">Lorem lorem lorem test2</p>
                                <hr>
                            </div>
                        </div>
                        <form method="post">
                            <div class="mb-2 px-3">
                                <label for="comment" class="col-form-label">Ajouter un commentaire :</label>
                                <textarea class="form-control" maxlength="500" name="comment" id="comment"></textarea required>
                            </div>
                            <?= $error['comment'] ?? '' ?>
                          
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
                                <a href="#" class="text-black ms-auto me-2  fa-2xl"><i class="fa-regular fa-bookmark"></i></a>

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
                                <label for="comment"  class="col-form-label">Ajouter un commentaire :</label>
                                <textarea class="form-control" maxlength="500" name="comment" id="comment"></textarea required>
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
                                <label for="comment"  class="col-form-label">Ajouter un commentaire :</label>
                                <textarea class="form-control" maxlength="500" name="comment" id="comment"></textarea required>
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