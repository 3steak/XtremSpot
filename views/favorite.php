<!-- $publication->publishBy -->
<?php
if (isset($_SESSION['flash'])) {

    flash('commentEmpty');
}  ?>
<!---------------- START MAIN --------------->
<main>
    <!----- BANNIERE OF USERPROFIL AND MODALMAP ---->

    <div class="container-fluid my-3">

        <!-- BANNIERE -->
        <div class="row  p-2 my-2 profilUserBanniere rounded-top ">
            <div class="col-2 col-lg-4  text-end">
                <img src="/public/assets/uploads/photoProfil/<?= $profilUser->avatar ?>" alt="photo user profil">
            </div>
            <div class="col-10 col-lg-8 d-flex text-center align-items-center">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-decoration-none text-white "><?= htmlentities($profilUser->pseudo) ?><i class="fa-solid fa-square-plus mx-2"></i></h4>
                    </div>
                    <div class="col-12">
                        <h5 href="#" class="text-decoration-none text-white"><?= htmlentities($profilUser->category) ?></a>
                    </div>
                </div>
            </div>
            <h1 class="text-white text-center"><span class="xtrem">MES FAVO</span><span class="spot">RIS</span><br></h1>
        </div>

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

        <!-- MODAL SUPPRESION PUBLICATION  -->
        <div class="modal fade" id="deletePublication" tabindex="-1" aria-labelledby="deletePublicationLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="linkDeletePublication" action="/deletePublicationCtrl?id=" action method="post">

                        <div class="modal-header">
                            <h1 class="modal-title" id="deletePublicationLabel">Supprimer votre publication ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL SUPPRESION COMMENT  -->
        <div class="modal fade" id="deleteComment" tabindex="-1" aria-labelledby="deleteCommentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="linkDeleteComment" action="/deleteCommentCtrl?id=" action method="post">

                        <div class="modal-header">
                            <h1 class="modal-title" id="deleteCommentLabel">Supprimer votre commentaire ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!------- CONTENT  ---------->
        <div class="container my-3 cardUserContent col-lg-6 ">

            <div class="row">
                <?php
                if (empty($publications)) { ?>
                    <div class="card text-bg-dark my-5 p-5 ">
                        <div class="col-12 p-2">
                            <div class="d-flex align-items-center ">
                                <small class="text-white"><i class="fa-solid fa-signs-post"></i> Ici bientôt</small>
                            </div>
                            <h1 class="text-white ">Du contenu</h1>
                        </div>

                        <img src="/public/assets/img/noPublication.jpg" class="card-img" alt="PAS ENCORE DE POST">

                    </div>
                <?php }

                foreach ($publications as $key => $publication) { ?>
                    <div class="card text-bg-dark my-3 ">
                        <div class="col-12 p-2">
                            <div class="d-flex align-items-center ">
                                <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($publication->publishBy)  ?>" title="Voir profil"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/uploads/photoProfil/<?= $publication->pubUserAvatar ?>" alt="photo profil utilisateur"></a>
                                <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($publication->publishBy)  ?>" title="Voir profil" class="text-decoration-none text-white p-2 fs-2">
                                    <?= htmlentities($publication->pubUserPseudo) ?>
                                </a>
                                <a href="#" class="text-black p-2"><i class="fa-solid fa-circle-plus"></i></a>

                                <a href="" class=" text-black ms-auto  me-2 fa-2xl favoriteBtn  fa-bookmark fa-solid" id="favoriteBtn" data-publication-id=<?= htmlentities($publication->idPublications) ?>></a>

                            </div>
                            <div class="d-flex align-items-center ">
                                <small class="text-white"><i class="fa-solid fa-signs-post"></i> <?= $publication->town ?></small>
                            </div>
                            <div class="d-flex  justify-content-between align-items-center ">
                                <p class="contentUserDescprition text-white mx-auto"><?= htmlentities($publication->title) ?></p>
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
                            <div class="row banniereLike p-2 ">
                                <div class="col-12 dropcenter dropup d-flex align-items-center">
                                    <!-- BUTTON LIKE  -->
                                    <i class="fa-solid fa-thumbs-up fa-xl me-1 text-white like-btn" data-publication-id=<?= htmlentities($publication->idPublications) ?>></i><span class="countLike"><?= htmlentities($publication->likes)  ?> </span> <span class="dNoneMobil text-white"> J'aime</span>
                                    <!-- BUTTON FOR COLLAPSE OF COMMENTS -->
                                    <a class="text-white text-decoration-none p-3" data-bs-toggle="collapse" data-bs-target="#collapseComments<?= $key ?>">
                                        <i class="fa-solid fa-comment fa-xl me-1"></i><span class="dNoneMobil">Commenter</span>
                                    </a>
                                    <!-- BOUTON MAP -->
                                    <a class=" text-white text-decoration-none p-3 ping" title="Voir le lieu du spot" data-bs-toggle="modal" data-bs-target="#mapModal" data-title="<?= $publication->title ?>" data-marker_longitude="<?= $publication->marker_longitude ?>" data-marker_latitude="<?= $publication->marker_latitude ?>" data-pseudo="<?= $publication->pseudo ?>"><i class="fa-solid fa-location-dot fa-xl me-1"></i>
                                        <span class="dNoneMobil">Voir le lieu du spot</span></a>
                                    <!-- BUTTON SEE MORE -->
                                    <a class="btn btn-dark btn-sm ms-2 seeMore" data-bs-toggle="modal" data-bs-target="#description" data-titledesc="<?= $publication->title ?>" data-description="<?= $publication->description ?>" role="button">En savoir plus</a>
                                </div>
                            </div>
                            <!-- Collapse for comments -->
                            <div id="collapseComments<?= $key ?>" class="accordion-collapse collapse mt-1 rounded-2" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <!-- Listes de commentaires -->
                                <div class="commentsList px-3 py-1 overflow-auto">
                                    <?php foreach ($comments as $comment) {
                                        if ($comment->idPublications == $publication->idPublications) { ?>
                                            <div class="commentUser p-2">
                                                <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($comment->idUsers)  ?>" title="Voir profil"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/uploads/photoProfil/<?= $comment->avatar ?>" alt="photo profil utilisateur"></a>
                                                <a href="/../controllers/profilUserCtrl.php?id=<?= htmlentities($comment->idUsers)  ?>" title="Voir profil" class="text-decoration-none text-white p-2 ">
                                                    <?= htmlentities($comment->pseudo) ?>
                                                </a><br>

                                                <small class=" commentsHour mt-4 ms-4">Publié le : <?= htmlentities(date('d/m/Y', strtotime($comment->created_at))) ?> à <?= htmlentities(date('H', strtotime($comment->created_at))) ?>h</small>

                                                <div class="d-flex  justify-content-between align-items-center ">
                                                    <p class="text-white mt-1 fs-6"><?= $comment->description ?></p>
                                                    <?php if ($idSession === $comment->idUsers) { ?>
                                                        <a class="m-1 deleteComment text-white" title="Supprimer mon commentaire" href="" data-bs-toggle="modal" data-bs-target="#deleteComment" data-id=<?= $comment->commentId ?>><i class="fa-regular fa-circle-xmark "></i></a>
                                                    <?php } ?>
                                                </div>
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
<!-------END MAIN  ----->