       <!-- MODAL SIGNALEMENT  -->
       <!-- Modal -->
       <div class="modal fade" id="report" tabindex="-1" aria-labelledby="reportLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <form action="" method="post">
                       <div class="modal-header">
                           <h1 class="modal-title" id="reportLabel">Pourquoi refuser ?</h1>
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
                       <h1 class="text-white text-center m-2">MODERATION</h1>
                   </div>


                   <!-- PUBLICATION -->
                   <div class="container-fluid  my-3 cardUserContent">
                       <div class="row">
                           <div class="col-12">
                               <h2 class="text-white text-center m-2">Publications</h2>
                           </div>
                           <?php foreach ($publications as $publication) { ?>

                               <div class="card col-lg-5 d-flex mx-auto  text-bg-dark pb-3 m-2">
                                   <div class="col-12 p-2 ">
                                       <div class="list-group-item d-flex align-items-center ">
                                           <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto " src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                               <a href="#" class="text-decoration-none text-white p-2 ">
                                                   <?= htmlspecialchars($publication->pseudo) ?>
                                               </a>
                                       </div>
                                       <div>
                                           <p> Crée le <?= htmlspecialchars(date('d/m/Y H:i', strtotime($publication->created_at))) ?></p>
                                           <p><?= htmlspecialchars($publication->title) ?></p>
                                           <p><?= htmlentities($publication->description) ?></p>
                                       </div>
                                   </div>
                                   <img src="/public/assets/uploads/newPicture/<?= $publication->image_name ?>" class="card-img" alt="<?= $publication->title ?>">
                                   <div class="col-12 d-flex gap-2 mt-1"> <a href="/controllers/dashboard/moderationCtrl.php?idPublication=<?= $publication->id ?>" role="button" class="btn btn-primary w-50 mx-auto">ACCEPTER</a>
                                       <button role="button" class="btn btn-primary w-50 mx-auto" data-bs-toggle="modal" data-bs-target="#report">REFUSER</button>
                                   </div>
                               </div>
                           <?php } ?>
                       </div>
                   </div>

                   <!-- COMMENT -->
                   <div class="container my-3 cardUserContent">
                       <div class="row">
                           <div class="col-12">
                               <h2 class="text-white text-center m-2">Commentaires</h2>
                           </div>
                           <?php foreach ($comments as $comment) { ?>
                               <div class="card col-lg-10 mx-auto text-bg-dark pb-3 m-2">
                                   <div class="row justify-content-center">
                                       <div class="col-4 p-2 ">
                                           <div class="list-group-item d-flex align-items-center ">
                                               <a href="profilUser.html"><img class="img-fluid miniProfilUser my-auto" src="/public/assets/img/miniProfilUser.png" alt="photo profil utilisateur">
                                                   <a href="#" class="text-decoration-none text-white p-2 ">
                                                       <?= $comment->pseudo ?>
                                                   </a>
                                           </div>
                                           <div>
                                               <p><?= htmlspecialchars(date('d/m/Y H:i', strtotime($comment->created_at))) ?> </p>
                                           </div>
                                           <div class="input-group">

                                               <textarea class="form-control"><?= htmlspecialchars($comment->description) ?></textarea>
                                           </div>
                                       </div>
                                       <div class="col-4 p-2">
                                           <div class="list-group-item d-flex align-items-center ">
                                               Commentaire de la publication : <?= $comment->publicationTitle ?>
                                           </div>
                                           <div> <img src="/public/assets/uploads/newPicture/<?= $comment->publicationImg ?>" alt="<?= $comment->publicationTitle ?>">
                                           </div>

                                       </div>
                                   </div>
                                   <div class=" d-flex gap-2 mt-1"> <a href="/controllers/dashboard/moderationCtrl.php?idComment=<?= $comment->commentId ?>" role="button" class="btn btn-primary w-50 mx-auto">ACCEPTER</a>
                                       <button type="button" class="btn btn-primary w-50 mx-auto" data-bs-toggle="modal" data-bs-target="#report">REFUSER</button>
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