       <!-- MODAL SIGNALEMENT  -->
       <!-- Modal REFUSE COMMENT -->
       <div class="modal fade" id="refuseComment" tabindex="-1" aria-labelledby="refuseCommentLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form id="linkDeleteComment" action="/deleteCommentCrudCtrl?id=" action method="post">
                       <div class="modal-header">
                           <h1 class="modal-title" id="refuseCommentLabel">Pourquoi refuser ?</h1>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                           <div class="btn-group col-12 d-flex flex-column p-3">
                               <h3 class="text-black ms-2 pt-3 mb-2">Choissisez un motif de signalement</h3>
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
       <!-- MODAL REFUSE PUBLICATION -->
       <div class="modal fade" id="refusePublication" tabindex="-1" aria-labelledby="refusePublicationLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form id="linkDeletePublication" action="/deletePublicationCrudCtrl?id=" action method="post">
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

       <!---------------- MAIN --------------->
       <main>
           <div class="container main mt-5">
               <div class="row d-flex gap-2 justify-content-center">
                   <div class="col-12">
                       <h1 class="text-white text-center m-2"><span class="xtrem">MODE</span><span class="spot">RATION</span></h1>
                   </div>


                   <!-- PUBLICATION -->
                   <div class="container-fluid  my-3 cardUserContent">
                       <div class="row">
                           <div class="col-12">
                               <h2 class="text-white text-center m-2 mb-5"><span class="xtrem">Publi</span><span class="spot">cations</span></h2>
                           </div>
                           <?php foreach ($publications as $publication) { ?>

                               <div class="card col-lg-5 d-flex mx-auto  text-bg-dark pb-3 m-2">
                                   <div class="col-12 p-2 ">
                                       <div class="list-group-item d-flex align-items-center ">
                                           <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto " src="/public/assets/uploads/photoProfil/<?= $publication->avatar ?>" alt="photo profil utilisateur">
                                               <a href="#" class="text-decoration-none text-white p-2 ">
                                                   <?= htmlspecialchars($publication->pseudo) ?>
                                               </a>
                                       </div>
                                       <div>
                                           <p> Crée le <?= htmlspecialchars(date('d/m/Y H:i', strtotime($publication->created_at))) ?></p>
                                           <p><span class="spot">Titre : </span><?= $publication->title ?></p>
                                           <p><span class="spot">Descirption : </span><?= $publication->description ?></p>
                                       </div>
                                   </div>
                                   <img src="/public/assets/uploads/newPicture/<?= $publication->image_name ?>" class="card-img" alt="<?= $publication->title ?>">
                                   <div class="col-12 d-flex gap-2 mt-1"> <a href="/controllers/dashboard/moderationCtrl.php?idPublication=<?= $publication->id ?>" role="button" class="btn btn-primary w-50 mx-auto">ACCEPTER</a>
                                       <a type="button" href="" class="btn btn-primary w-50 mx-auto refusePublication" data-bs-toggle="modal" data-bs-target="#refusePublication" data-id=<?= $publication->id ?> data-email=<?= $publication->email ?>>REFUSER</a>
                                   </div>
                               </div>
                           <?php } ?>
                       </div>
                   </div>

                   <!-- COMMENT -->
                   <div class="container my-3 cardUserContent">
                       <div class="row">
                           <div class="col-12">
                               <h2 class="text-white text-center m-2"><span class="xtrem">Comm</span><span class="spot">entaires</span></h2>
                               <?= $error['refuseMsg'] ?? '' ?>
                               <?= $error['email'] ?? '' ?>
                           </div>
                           <?php foreach ($comments as $comment) { ?>

                               <div class="card col-lg-10 mx-auto text-bg-dark pb-3 m-2">
                                   <div class="row justify-content-around">
                                       <div class="col-4 p-2 ">
                                           <div class="list-group-item d-flex align-items-center ">
                                               <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/uploads/photoProfil/<?= $comment->avatar ?>" alt="photo profil utilisateur">
                                                   <a href="/../../controllers/profilUserCtrl.php?id=<?= htmlentities($comment->idUsers)  ?>" class="text-decoration-none text-white p-2 ">
                                                       <?= $comment->pseudo ?>
                                                   </a>
                                           </div>
                                           <div>
                                               <p><?= htmlspecialchars(date('d/m/Y H:i', strtotime($comment->created_at))) ?> </p>
                                           </div>
                                           <div class="input-group">

                                               <textarea class="form-control"><?= $comment->description ?></textarea>
                                           </div>
                                       </div>
                                       <div class="col-4 p-2">
                                           <div class="list-group-item d-flex align-items-center ">
                                               Publication : <?= $comment->publicationTitle ?>
                                           </div>
                                           <div><img class="img-fluid" src="/public/assets/uploads/newPicture/<?= $comment->publicationImg ?>" alt="<?= $comment->publicationTitle ?>">
                                           </div>

                                       </div>
                                   </div>
                                   <div class=" d-flex gap-2 mt-1">
                                       <a href="/controllers/dashboard/moderationCtrl.php?idComment=<?= $comment->commentId ?>" role="button" class="btn btn-primary w-50 mx-auto">ACCEPTER</a>
                                       <a type="button" href="" class="btn btn-primary w-50 mx-auto refuseComment" data-bs-toggle="modal" data-bs-target="#refuseComment" data-id=<?= $comment->commentId ?> data-email=<?= $comment->email ?>>REFUSER</a>
                                   </div>
                               </div>
                           <?php } ?>
                       </div>
                   </div>
               </div>
           </div>
           </div>
       </main>
       <!-------  MAIN  ----->