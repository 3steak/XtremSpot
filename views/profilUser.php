<?php flash('commentEmpty') ?>
<!---------------- START MAIN --------------->
<main>
    <!----- BANNIERE OF USERPROFIL AND MODALMAP ---->

    <div class="container-fluid my-3">

        <!-- BANNIERE -->
        <div class="row  p-2 my-2 profilUserBanniere rounded-top ">
            <div class="col-2 col-lg-4  text-end">
                <a href="profilUser.html"> <img src="/public/assets/img/photoProfilUser.png" alt="photo user profil">
                </a>
            </div>
            <div class="col-10 col-lg-8 d-flex text-center align-items-center">
                <div class="row">
                    <div class="col-12"> <a href="profilUser.html" class="text-decoration-none text-white ">PROFIL
                            NAME <i class="fa-solid fa-square-plus mx-2"></i></a>
                    </div>
                    <div class="col-12">
                        <a href="#" class="text-decoration-none text-white">Sport et Lieu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODALMAP -->
        <div class="row">
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

    <!-- CONTENT 1 -->
    <div class="container my-3 cardUserContent col-lg-6 ">

        <div class="row">

            <!-- IMG CARD -->
            <div class="card text-bg-dark ">
                <div class="col-12 p-2 ">
                </div>
                <img src=" /public/assets/img/testFeedUser.jpg" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end ">

                    <!-- BANNIERE LIKE COMMENT... -->
                    <div class="row banniereLike p-2">
                        <div class="col-12">
                            <p class="contentUserDescprition">Spot cool, attention aux rochers</p>
                        </div>
                        <div class="col-12">
                            <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-thumbs-up fa-2x"></i>
                            </a>
                            <!-- Collapse for comments-->
                            <a class="text-black text-decoration-none p-3" data-bs-toggle="collapse" data-bs-target="#collapseComments">
                                <i class="fa-solid fa-comment fa-2x"></i>
                            </a>


                            <!-- button map -->
                            <a class=" text-black text-decoration-none p-3" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER1"><i class="fa-solid fa-location-dot fa-2x"></i></a>

                            <!-- Button option -->
                            <!--  IF ID = ID OF PUBLICATION, DISPLAY DELETE BUTTON  -->
                            <a href="#" class=" text-black text-decoration-none p-3"><i class="fa-solid fa-ellipsis fa-2x"></i></a>
                        </div>
                    </div>

                    <!--- Collapse for comments --->

                    <div id="collapseComments" class="accordion-collapse collapse mt-1 rounded-2" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <!-- Comments list -->
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
    <div class="container my-3 cardUserContent col-lg-6">
        <div class="row">

            <!-- IMGCARD    -->
            <div class="card text-bg-dark ">
                <div class="col-12 p-2 ">

                </div>
                <img src=" /public/assets/img/testFeedUser2.jpg" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end ">

                    <!-- BANNIERE LIKE COMMENT... -->
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

                            <!-- BOUTON MAP -->
                            <a class=" text-black text-decoration-none p-3"><i class="fa-solid fa-location-dot fa-2x" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER2"></i></a>

                            <!-- BOUTON OPTION -->
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
                            <textarea class="form-control" id="message-text"></textarea>
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

    <div class="container my-3 cardUserContent col-lg-6">

        <div class="row">
            <!-- CARDIMG -->

            <div class="card text-bg-dark ">
                <div class="col-12 p-2 ">
                </div>
                <img src=" /public/assets/img/testFeedUser3.jpg" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end ">

                    <!-- BANNIERE LIKE COMMENT... -->

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

                            <a class=" text-black text-decoration-none p-3" data-bs-toggle="modal" data-bs-target="#mapModal" data-bs-whatever="USER3"><i class="fa-solid fa-location-dot fa-2x"></i></a>
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
                            <textarea class="form-control" id="message-text"></textarea>
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
<!-------END MAIN  ----->