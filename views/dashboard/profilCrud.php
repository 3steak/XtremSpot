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

    <!-- MODAL SUPPRESION PUBLICATION-->
    <div class="modal fade" id="validateModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="validateModalLabel">Suppression de la publication</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Supprimer la publication de <span class="fullname"></span> ? <br>
                    Cela n'affectera pas ses publications et ses commentaires
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</a>
                    <a class="btn btn-primary " id="linkDelete" href="/deletePublicationCrudCtrl?id==" role="button">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL SUPPRESION COMMENT-->
    <div class="modal fade" id="deleteComment" tabindex="-1" aria-labelledby="deleteCommentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCommentLabel">Suppression du commentaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Supprimer le commentaire <span class="pseudo"></span> ? <br>
                    Cela n'affectera pas ses publications et ses commentaires
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</a>
                    <a class="btn btn-primary " id="linkDeleteComment" href="/deleteCommentCtrl.php?id=" role="button">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <!----- BANNIERE ---->

    <div class="container-fluid my-3">

        <!-- BANNIERE -->
        <div class="row  p-2 my-2 profilUserBanniere rounded-top ">
            <div class="col-2 col-lg-4  text-end">
                <a href="profilUser.html"> <img src="/public/assets/uploads/photoProfil/<?= $profilUser->avatar ?>" alt="photo user profil">
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
                <fieldset class="row ">
                    <div class="col-lg-6">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start ">Nom</h4>
                        <input type="text" id="disabledTextInput" name="lastname" class="form-control" value="<?= htmlspecialchars($profilUser->lastname) ?>">
                        <small><?= $error['lastname'] ?? '' ?></small>
                    </div>

                    <div class="col-lg-6">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start ">Prénom</h4>
                        <input type="text" id="disabledTextInput" name="firstname" class="form-control" value="<?= htmlspecialchars($profilUser->firstname) ?>">
                        <small><?= $error['firstname'] ?? '' ?></small>
                    </div>

                    <div class="col-lg-6">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start ">Admin ?</h4>
                        <select class="form-select " id="admin" name="admin" aria-label="admin">
                            <option value="0" <?= ($profilUser->admin === 0) ? 'selected' : '' ?>>NON</option>
                            <option value="1" <?= ($profilUser->admin === 1) ? 'selected' : '' ?>>OUI</option>
                        </select>
                        <small><?= $error['admin'] ?? '' ?></small>
                    </div>
                    <div class="col-lg-6">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start ">Email</h4>
                        <input type="text" id="disabledTextInput" name="email" class="form-control" value="<?= htmlspecialchars($profilUser->email) ?>">
                        <p><?= $error['email'] ?? '' ?></p>
                    </div>


                    <div class="col-lg-8 mx-auto mb-4">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start">Pseudo</h4>
                        <input type="text" id="disabledTextInput" name="pseudo" class="form-control" value="<?= htmlspecialchars($profilUser->pseudo) ?>">
                        <small><?= $error['pseudo'] ?? '' ?></small>
                    </div>
                    <div class="col-lg-8 mx-auto mb-2">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start">Avatar</h4>
                        <div class="row cc-selector">
                            <!-- AVATAR DEFAUT -->
                            <div class=" d-flex flex-column mb-1 ms-2">
                                <small class="text-white">Avatar par défaut</small>
                                <input <?= ($profilUser->avatar === "avatar_0.png") ? "checked='checked'" : '' ?> id="avatar_0" type="radio" name="avatar" value="avatar_0.png" />
                                <label class="avatar-cc avatar_0" for="avatar_0"></label>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-around center">
                                <!-- AVATAR 1 -->
                                <input <?= ($profilUser->avatar === "avatar_1.png") ? "checked='checked'" : '' ?> id="avatar_1" type="radio" name="avatar" value="avatar_1.png" />
                                <label class="avatar-cc avatar_1" for="avatar_1"></label>
                                <!-- AVATAR 2 -->
                                <input <?= ($profilUser->avatar === "avatar_2.png") ? "checked='checked'" : '' ?> id="avatar_2" type="radio" name="avatar" value="avatar_2.png" />
                                <label class="avatar-cc avatar_2" for="avatar_2"></label>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-around ">
                                <!-- AVATAR 3 -->
                                <input <?= ($profilUser->avatar === "avatar_3.png") ? "checked='checked'" : '' ?> id="avatar_3" type="radio" name="avatar" value="avatar_3.png" />
                                <label class="avatar-cc avatar_3" for="avatar_3"></label>
                                <!-- AVATAR 4 -->
                                <input <?= ($profilUser->avatar === "avatar_4.png") ? "checked='checked'" : '' ?> id="avatar_4" type="radio" name="avatar" value="avatar_4.png" />
                                <label class="avatar-cc avatar_4" for="avatar_4"></label>
                            </div>
                        </div>
                        <small><?= $error['avatar'] ?? '' ?></small>
                    </div>


                    <div class="col-lg-8 mx-auto mb-2">
                        <label for="disabledTextInput" class="form-label"></label>
                        <h4 class=" text-white text-start">Sport pratiqué</h4>
                        <select class="form-select " id="idCategories" name="idCategories" aria-label="Pratique">
                            <?php
                            foreach ($listCategory as $category) { ?>
                                <option value="<?= $category->id ?>" <?= ($profilUser->category === $category->name) ? 'selected' : '' ?>><?= $category->name ?></option>
                            <?php }
                            ?>
                        </select>
                        <small><?= $error['category'] ?? '' ?></small>
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
                                    <a class="text-decoration-none p-3 deleteApt" title="Supprimer la publication" data-bs-toggle="modal" data-bs-target="#validateModal" data-name="<?= $profilUser->pseudo ?>" data-id="<?= $publication->id ?>">
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
                                    <a href="" class="text-decoration-none p-3 deleteComment" title="Supprimer le commentaire" data-bs-toggle="modal" data-bs-target="#deleteComment" data-pseudo="<?= $profilUser->pseudo ?>" data-idcomment="<?= $comment->commentId ?>">
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