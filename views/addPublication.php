   <!---------------- MAIN --------------->
   <main>
       <!----- MODALMAP ---->

       <div class="container-fluid mb-5">
           <div class="row d-flex justify-content-center">
               <div class="col-12 m-4">
                   <h1 class="text-white text-center"><span class="xtrem">NOUVELLE</span> <span class="spot">PUBLICATION</span></h1>
               </div>
               <?= $error['idUsers'] ?? '' ?>

               <div class="col-lg-8  card bg-dark p-4 m-2">
                   <!------------------   FORM  ---------------->
                   <form method="post" enctype="multipart/form-data" autocomplete="off">
                       <h4 class="text-white">Choisir une photo ou vidéo :</h4>
                       <div class="input-group m-2 bg-dark">
                           <input type="file" class="form-control " name="inputGroupFile" id="inputGroupFile" required>
                           <label class="input-group-text" accept="image/png, image/jpeg" for="inputGroupFile"></label>
                       </div>
                       <?= $error['type'] ?? '' ?>
                       <?= $error['file'] ?? '' ?>


                       <!------- TITLE  ------->
                       <h4 class="text-white mt-4">Titre du post *</h4>
                       <div class="d-flex justify-content-center mt-2 mb-5">
                           <input type="text" class="form-control" placeholder="Ajouter un titre" name="title" value="<?= $_POST['title'] ?? '' ?>" id="title" cols="100" maxlength="100" rows="1" required>
                           <?= $error['title'] ?? '' ?>
                       </div>


                       <!------- DESCRIPTION  ------->
                       <div class="d-flex justify-content-center mt-5 mb-5"><textarea placeholder="Décrivez votre photo ou le lieu de spot en question" name="description" <?= $_POST['description'] ?? '' ?> id="description" cols="100" maxlength="250" rows="4"></textarea>
                       </div>


                       <!------ TOWN ------->
                       <div class="col-12 col-lg-10 p-3">
                           <h4 class="text-white">C'était où ? *</h4>
                           <div class="form-group mx-auto">
                               <label for="zipcode">Code Postal</label>
                               <input type="text" name="zipcode" class="form-control" placeholder="Code postal" value="<?= $_POST['zipcode'] ?? '' ?>" id="zipcode" pattern="<?= REGEX_ZIPCODE ?>" required>
                               <small id="error-message" class="text-white"></small>
                           </div>
                           <div class="form-group">
                               <label for="town">Ville</label>
                               <select class="form-control" name="town" id="town"></select>
                           </div>
                           <?= $error['town'] ?? '' ?>
                           <?= $error['zipcode'] ?? '' ?>
                       </div>



                       <!------  MAP --------->
                       <h4 class="text-white">Ajoute le lieu du spot ! *</h4>

                       <div id="mapid">

                       </div>
                       <div hidden>
                           <input type="text" id="hiddenInput" name="latlng" value="">
                       </div>
                       <? $error['coordinates'] ?? '' ?>

                       <!------ CATEGORY ------->
                       <h4 class="text-white">Sport pratiqué ? *</h4>
                       <div class="col-12 col-lg-10 p-3">
                           <select class="form-select " id="nativeTown" name="idCategories" aria-label="Pratique">
                               <option selected>Sport *</option>
                               <?php
                                foreach ($listCategory as $category) { ?>
                                   <option value="<?= $category->id ?>"><?= $category->name ?></option>
                               <?php }
                                ?>
                           </select>
                           <?= $error['category'] ?? '' ?>
                       </div>
                       <div class="col-12 text-center mt-4"><button type="submit" class="btn btn-info">Ajouter</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </main>