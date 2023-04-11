<?php
if (isset($_SESSION['flash'])) {

    flash('commentEmpty');
}  ?>
<!---------------- START MAIN --------------->
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
    <!-- DELETE COMMENT -->
    <div class="modal fade" id="deleteComment" tabindex="-1" aria-labelledby="refuseCommentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="linkDeleteComment" action="/deleteCommentCrudProfilCtrl?id=" action method="post">
                    <div class="modal-header">
                        <h1 class="modal-title" id="refuseCommentLabel">Pourquoi supprimer ?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="btn-group col-12 d-flex flex-column p-3">
                            <h3 class="text-black ms-2 pt-3 mb-2">Choissisez un motif de suppresion</h3>
                            <input type="hidden" class="emailComment" name="email" value="">

                            <input type="radio" class="btn-check" value="Contenu indésirable" name="refuseMsg" id="contentUndesirable" checked />
                            <label class="btn btn-light mx-auto w-100" for="contentUndesirable">Contenu indésirable</label>

                            <input type="radio" class="btn-check" value="Nudité" name="refuseMsg" id="nudity" />
                            <label class="btn btn-light mx-auto w-100" for="nudity">Nudité</label>

                            <input type="radio" class="btn-check" value="Discours ou symboles haineux" name="refuseMsg" id="racism" />
                            <label class="btn btn-light mx-auto w-100" for="racism">Discours ou symboles haineux</label>

                            <input type="radio" class="btn-check" value="Fausses informations" name="refuseMsg" id="wrongInfo" />
                            <label class="btn btn-light mx-auto w-100" for="wrongInfo">Fausses informations</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                        <!--  ENVOI MAIL AVEC MOTIF ENVOYER EN POST  -->
                        <button type="submit" class="btn btn-primary">Confirmer le refus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE PUBLICATION -->
    <div class="modal fade" id="validateModal" tabindex="-1" aria-labelledby="refusePublicationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="linkDeletePublication" action="/deletePublicationCrudProfilCtrl?id=" action method="post">
                    <div class="modal-header">
                        <h1 class="modal-title" id="refusePublicationLabel">Pourquoi refuser la publication?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="btn-group col-12 d-flex flex-column p-3">
                            <h3 class="text-black ms-2 pt-3 mb-2">Choissisez un motif de signalement</h3>
                            <input type="hidden" class="emailPublication" name="email" value="">

                            <input type="radio" class="btn-check" value="Contenu indésirable" name="refuseMsg" id="contentUndesirablex" checked />
                            <label class="btn btn-light mx-auto w-100" for="contentUndesirablex">Contenu indésirable</label>

                            <input type="radio" class="btn-check" value="Nudité" name="refuseMsg" id="nudityx" />
                            <label class="btn btn-light mx-auto w-100" for="nudityx">Nudité</label>

                            <input type="radio" class="btn-check" value="Discours ou symboles haineux" name="refuseMsg" id="racismx" />
                            <label class="btn btn-light mx-auto w-100" for="racismx">Discours ou symboles haineux</label>

                            <input type="radio" class="btn-check" value="Fausses informations" name="refuseMsg" id="wrongInfox" />
                            <label class="btn btn-light mx-auto w-100" for="wrongInfox">Fausses informations</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                        <!--  ENVOI MAIL AVEC MOTIF ENVOYER EN POST  -->
                        <button type="submit" class="btn btn-primary">Confirmer le refus</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!----- BANNIERE ---->

    <div class="container-fluid my-3">

        <!-- BANNIERE -->
        <div class="row  p-2 my-2 profilUserBanniere rounded-top ">
            <div class="col-2 col-lg-4  text-end">
                <a href="/../../controllers/profilUserCtrl.php?id=<?= htmlentities($profilUser->id)  ?>"> <img src="/public/assets/uploads/photoProfil/<?= $profilUser->avatar ?>" alt="photo user profil">
                </a>
            </div>
            <div class="col-10 col-lg-8 d-flex text-center align-items-center">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-white"><?= $profilUser->lastname  ?> <?= $profilUser->firstname  ?></h4>

                    </div>
                    <div class="col-12">
                        <p class="text-decoration-none text-white"> Sport pratiqué : <?= $profilUser->category  ?></p>
                    </div>
                </div>
            </div>
        </div>


        <!-------------- FORM FOR UPDATE USER, HIS PUBLICATIONS AND COMMENT ------->
        <div class="content bg-dark">

            <form method="post">
                <fieldset class="row justify-content-center">



                    <div class="col-lg-6 col-6 ">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-center p-2">Administrateur ?</h4>
                        <select class="form-select " id="admin" name="admin" aria-label="admin">
                            <option value="0" <?= ($profilUser->admin === 0) ? 'selected' : '' ?>>NON</option>
                            <option value="1" <?= ($profilUser->admin === 1) ? 'selected' : '' ?>>OUI</option>
                        </select>
                        <small><?= $error['admin'] ?? '' ?></small>
                    </div>

                    <button type="submit" class="btn btn-primary text-white mt-2 w-75 btnUpdate">Modifier</button>
                </fieldset>
            </form>
        </div>
        <!------ PUBLICATIONS   ----->

        <div class="container  my-3  ">
            <div class="row gap-2">
                <?php foreach ($publications as $publication) { ?>
                    <div class="card text-bg-dark pb-3 mb-4 col-lg-4 mx-auto ">
                        <div class="col-12 p-2">
                            <div class="d-flex align-items-center ">
                                Validé le : <?= htmlspecialchars(date('d/m/Y H:i', strtotime($publication->validated_at))) ?>
                            </div>
                        </div>
                        <img src="/public/assets/uploads/newPicture/<?= htmlspecialchars($publication->image_name) ?>" class="card-img mt-2" alt="...">
                        <div class=" d-flex flex-column justify-content-end ">
                            <div class="row banniereLike p-2 ">
                                <div class="col-12 d-flex">
                                    <p class="contentUserDescprition"><?= htmlspecialchars($publication->title) ?></p>
                                    <!-- BUTON SEEMORE -->
                                    <a class="btn btn-dark btn-sm ms-2 seeMore" data-bs-toggle="modal" data-bs-target="#description" data-titledesc="<?= $publication->title ?>" data-description="<?= $publication->description ?>" role="button">En savoir plus</a>
                                </div>
                                <div class="col-12 text-center mt-2">
                                    <!-- BOUTON MAP -->
                                    <a class=" text-black text-decoration-none p-3 ping" title="Voir le lieu du spot" data-bs-toggle="modal" data-bs-target="#mapModal" data-title="<?= $publication->title ?>" data-marker_longitude="<?= $publication->marker_longitude ?>" data-marker_latitude="<?= $publication->marker_latitude ?>" data-pseudo="<?= $profilUser->pseudo ?>"><i class="fa-solid fa-location-dot fa-2x"></i></a>

                                    <!-- BOUTON DELETE PUBLICATION  -->
                                    <a class="text-decoration-none p-3 deleteApt deletePublication" title="Supprimer la publication" data-bs-toggle="modal" data-bs-target="#validateModal" data-name="<?= $profilUser->pseudo ?>" data-id="<?= $publication->id ?>" data-email="<?= $profilUser->email ?>">
                                        <i class="fa-regular fa-trash-can m-1 fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- COMMENTAIRES -->
        <div class="container  my-3 ">
            <div class="row">
                <?php foreach ($comments as $comment) { ?>
                    <div class="card text-bg-dark pb-3 mb-4 col-lg-4 mx-auto">
                        <div class="col-12 p-2">
                            <div class="d-flex align-items-center ">
                                Commentaire validé le : <?= htmlentities(date('d/m/Y', strtotime($comment->validated_at))) ?> à <?= htmlentities(date('H', strtotime($comment->validated_at))) ?>h<?= htmlentities(date('m', strtotime($comment->validated_at))) ?>
                            </div>
                        </div>
                        <div class=" d-flex flex-column justify-content-end ">
                            <div class="row banniereLike p-2 ">
                                <div class="col-12 d-flex">
                                    <p class="comment"><?= htmlspecialchars($comment->description) ?></p>
                                </div>
                                <div class="col-12 text-center">

                                    <!-- BOUTON DELETE COMMENT  -->
                                    <a href="" class="text-decoration-none p-3 deleteComment" title="Supprimer le commentaire" data-bs-toggle="modal" data-bs-target="#deleteComment" data-pseudo="<?= $profilUser->pseudo ?>" data-idcomment="<?= $comment->commentId ?>" data-email="<?= $profilUser->email ?>">
                                        <i class="fa-regular fa-trash-can m-1 fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
</main>
<!-------END MAIN  ----->