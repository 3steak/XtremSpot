<!--------- MAIN -------->
<?php

if (!empty($_GET['register']) && $_GET['register'] == 'bienvenue') {
    flash('register');
}
?>
<main>
    <!-- MODALMAP -->
    <div class="container-fluid">
        <div class="row">
            <!-- MODAL -->
            <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-white " id="mapModalLabel">Spot de <span class="pseudo"></span></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="mapid" class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL DESCRIPTION-->
    <div class="container-fluid">
        <div class="row">
            <div class="modal fade" id="description" tabindex="-1" aria-labelledby="descriptionLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-white " id="descriptionLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white description">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL SIGNALEMENT  -->
    <div class="modal fade" id="report" tabindex="-1" aria-labelledby="reportLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="get">
                    <div class="modal-header">
                        <h1 class="modal-title" id="reportLabel">Pourquoi signaler ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="btn-group col-12 d-flex flex-column p-3">
                            <h3 class="text-black ms-2 pt-3 mb-2">Choissisez un motif de signalement</h3>
                            <input type="radio" class="btn-check" value="Contenu indésirable" name="report_msg" id="contentUndesirable" checked />
                            <label class="btn btn-light mx-auto w-100" for="contentUndesirable">Contenu indésirable</label>

                            <input type="radio" class="btn-check" value="Nudité" name="report_msg" id="nudity" />
                            <label class="btn btn-light mx-auto w-100" for="nudity">Nudité</label>

                            <input type="radio" class="btn-check" value="Discours ou symboles haineux" name="report_msg" id="racism" />
                            <label class="btn btn-light mx-auto w-100" for="racism">Discours ou symboles haineux</label>

                            <input type="radio" class="btn-check" value="Fausses informations" name="report_msg" id="wrongInfo" />
                            <label class="btn btn-light mx-auto w-100" for="wrongInfo">Fausses informations</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Confirmer le signalement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--------------------- FILTER BUTTON ---------------->
    <div class="container my-1">
        <div class="row">
            <div class=" col-lg-10 mx-auto">
                <div class="d-flex justify-content-center  p-2">
                    <button class="btn btn-sm btn-primary m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                            <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg> Filtres
                    </button>
                </div>
            </div>
            <div class=" col-lg-10  mx-auto">
                <div class="collapse " id="collapseFilters">
                    <h4 class="text-white">Filtrer par :</h4>
                    <div class="d-flex flex-column flex-md-row justify-content-around gap-4 m-2">
                        <div class=" mx-auto">
                            <p class="text-white mb-2">Sport</p>
                            <form method="post">
                                <select class="form-select w-100 " id="nativeTown" name="idCategories" aria-label="Pratique">
                                    <option selected value="">Sport</option>
                                    <?php
                                    foreach ($listCategory as $category) { ?>
                                        <option value="<?= $category->id ?>" <?= (!empty($_POST['idCategories']) === $category->id) ? 'selected' : '' ?>><?= $category->name ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <!-- RENVOI VERS LE CONTROLLER POUR SELECT WHERE SPORT = SPORTSELECTED -->
                                <button type="submit" id="filter" class="btn btn-dark btn-filter mx-auto mt-2">Filtrer</button>
                            </form>
                            <?= $error['category'] ?? '' ?>
                        </div>
                        <div class=" align-self-center align-self-lg-end">
                            <a class="btn btn-dark btn-filter " href="/controllers/feedUserCtrl.php" role="button">Reset</a>
                        </div>
                        <div class=" mx-auto">
                            <p class="text-white mb-2">Lieux</p>
                            <form method="post">
                                <select class="form-select townUser w-100" name="town" id="townUser" aria-label="townUser">
                                    <option selected value="">Ville</option>
                                    <?php
                                    foreach ($listTowns as $publication) { ?>
                                        <option value="<?= $publication->town ?>" <?= (!empty($_POST['town']) === $publication->town) ? 'selected' : '' ?>><?= $publication->town ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <!-- RENVOI VERS LE CONTROLLER POUR SELECT WHERE Town = TOWN -->
                                <button type="submit" id="filter" class="btn btn-dark btn-filter mx-auto mt-2">Filtrer</button>
                            </form>
                            <?= $error['town'] ?? '' ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-------------- CONTENT ------->

    <div class="container cardUserContent">
        <div class="row">
            <?= $error['void'] ?? '' ?>
            <?php
            foreach ($publications as $key => $publication) { ?>


                <div class="card text-bg-dark my-2 mb-5 col-lg-8 mx-auto">
                    <div class="col-12 p-2">
                        <div class="d-flex align-items-center ">
                            <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($publication->idUsers)  ?>" title="Voir profil"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/uploads/photoProfil/<?= $publication->avatar ?>" alt="photo profil utilisateur"></a>
                            <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($publication->idUsers)  ?>" title="Voir profil" class="text-decoration-none text-white p-2 fs-2">
                                <?= htmlentities($publication->pseudo) ?>
                            </a>
                            <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>
                            <a href="#" class="text-black ms-auto  me-2 fa-2xl"><i class="fa-regular fa-bookmark"></i></a>
                        </div>

                        <div class="d-flex align-items-center ">
                            <small class="text-white"><i class="fa-solid fa-signs-post"></i> <?= $publication->town ?></small>
                        </div>
                        <div class="d-flex  justify-content-between align-items-center ">
                            <p class="contentUserDescprition"><?= htmlentities($publication->title) ?></p>
                            <!--  BOUTON OPTION -->
                            <a href="" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                            </a>
                            <!-- dropdown menu  -->
                            <ul class="dropdown-menu bg-dark">
                                <li><a class="dropdown-item text-white" data-bs-toggle="modal" data-bs-target="#report">Signaler</a></li>
                            </ul>
                        </div>
                    </div>

                    <img src="/../public/assets/uploads/newPicture/<?= htmlentities($publication->image_name) ?>" class="card-img" alt="<?= htmlentities($publication->title) ?>">
                    <div class=" d-flex flex-column justify-content-end ">
                        <div class="row banniereLike  p-2 ">
                            <div class="col-12 dropcenter dropup">
                                <a href="#" class=" text-white text-decoration-none p-3"><i class="fa-solid fa-thumbs-up fa-xl me-1"></i><span class="dNoneMobil">J'aime</span></a>
                                <!-- BUTTON FOR COLLAPSE OF COMMENTS -->
                                <a class="text-white text-decoration-none p-3" href="" data-bs-toggle="collapse" data-bs-target="#collapseComments<?= $key ?>">
                                    <i class="fa-solid fa-comment fa-xl me-1"></i><span class="dNoneMobil">Commenter</span>
                                </a>
                                <!-- BOUTON MAP -->
                                <a class=" text-white text-decoration-none p-3 ping" title="Voir le lieu du spot" data-bs-toggle="modal" data-bs-target="#mapModal" data-title="<?= $publication->title ?>" data-marker_longitude="<?= $publication->marker_longitude ?>" data-marker_latitude="<?= $publication->marker_latitude ?>" data-pseudo="<?= $publication->pseudo ?>"><i class="fa-solid fa-location-dot fa-xl me-1"></i>
                                    <span class="dNoneMobil">Voir le lieu du spot</span></a>

                                <!-- BUTTON SEE MORE -->
                                <a class="btn btn-dark btn-sm seeMore" data-bs-toggle="modal" data-bs-target="#description" data-titledesc="<?= $publication->title ?>" data-description="<?= $publication->description ?>" role="button">En savoir plus</a>
                            </div>
                        </div>
                        <!-- Collapse for comments -->
                        <div id="collapseComments<?= $key ?>" class="accordion-collapse<?= $publication->id ?> collapse mt-1 rounded-2" aria-labelledby="headingOne">
                            <!-- Listes de commentaires -->
                            <div class="commentsList px-3 py-1 overflow-auto">
                                <?php foreach ($comments as $comment) {
                                    if ($comment->idPublications == $publication->id) { ?>
                                        <div class="commentUser p-2">
                                            <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($comment->idUsers)  ?>" title="Voir profil"><img class="img-fluid miniProfilUserComment my-auto" src="/public/assets/uploads/photoProfil/<?= $comment->avatar ?>" alt="photo profil utilisateur"></a>
                                            <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($comment->idUsers)  ?>" title="Voir profil" class="text-decoration-none text-white p-2 ">
                                                <?= htmlentities($comment->pseudo) ?>
                                            </a><br>
                                            <small class=" commentsHour mt-4 ms-4">Publié le : <?= htmlentities(date('d/m/Y', strtotime($comment->created_at))) ?> à <?= htmlentities(date('H', strtotime($comment->created_at))) ?>h</small>
                                            <p class="text-white mt-1 fs-6"><?= htmlentities($comment->description) ?></p>
                                            <hr>
                                        </div>
                                <?php
                                    }
                                } ?>
                            </div>
                            <form id="form" method="post">
                                <div class="mb-2 px-3">
                                    <!-- INPUT HIDDEN  FOR IDPUBLICATION -->
                                    <input type="hidden" name="idPublications" class="idPublications" id="idPublications<?= $publication->id ?>" value="<?= $publication->id ?>" />

                                    <label for="comment" class="col-form-label">Ajouter un commentaire :</label>
                                    <textarea class="form-control" maxlength="500" name="comment" id="comment<?= $publication->id ?>" placeholder="Ton commentaire sera envoyé en modération avant d'être publié !"></textarea required>
                                </div>
                                <?= $error['comment'] ?? '' ?>
                            
                                <div class="d-flex justify-content-center pb-2">
                                    <!-- test -->
                                    <button type="button" id="<?= $publication->id ?>" class="btn border border-ligth btn-dark submitButton" value="Commenter">Commenter</button>
                                </div>
                            </form>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <!-------FIN FEED USER  ----->