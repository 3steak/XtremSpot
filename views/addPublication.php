   <!---------------- MAIN --------------->
   <main>
       <!----- BANNIERE OF USERPROFIL AND MODALMAP ---->

       <div class="container-fluid my-3">

           <!-- BANNIERE -->
           <div class="row  p-2 my-4 profilUserBanniere rounded-top">
               <div class="col-2 col-lg-6 text-center">
                   <a href="profilUser.html"> <img src="/public/assets/img/photoProfilUser.png" alt="photo user profil">
                   </a>
               </div>
               <div class="col-10 col-lg-6  d-flex align-items-center">
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
       </div>

       <div class="container-fluid mb-5">
           <div class="row d-flex justify-content-center">
               <div class="col-12 m-4">
                   <h1 class="text-white text-center">Nouvelle publication</h1>
               </div>
               <div class="col-11  card bg-dark p-4 m-2">
                   <form method="post" action="" enctype="multipart/form-data">
                       <h4 class="text-white">Choisir une photo ou vidéo :</h4>
                       <div class="input-group m-2 bg-dark">
                           <input type="file" class="form-control " name="inputGroupFile" id="inputGroupFile">
                           <label class="input-group-text" accept="image/png, image/jpeg, video/mp4" for="inputGroupFile"></label>
                       </div>
                       <?= $error['type'] ?? '' ?>
                       <div class="d-flex justify-content-center mt-5 mb-5"><textarea placeholder="Ajouter une légende" name="legendContent" id="legendContent" cols="100" maxlength="250" rows="4"></textarea>
                       </div>
                       <!------ town ------->
                       <h4 class="text-white">C'était où ?</h4>
                       <div class="col-12 col-lg-10 p-3">
                           <select class="form-select " id="nativeTown" name="town" aria-label="Native town ">
                               <option selected>Ville du spot *</option>
                               <?php
                                foreach ($listTown as $town) {
                                    echo  "<option>$town</option>";
                                }
                                ?>
                           </select>
                       </div>
                       <?= $error['town'] ?? '' ?>

                       <h4 class="text-white">Ajoute le lieu du spot !</h4>

                       <h3 class="text-white d-flex justify-content-center m-4">MAP LEAFLET</h3>
                       <div class="col-12 text-center"><button type="submit" class="btn btn-info">Ajouter</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>

   </main>
   <!-------FIN FEED USER  ----->