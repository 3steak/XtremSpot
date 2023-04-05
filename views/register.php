  <!-- Background video -->
  <video id="background-video" autoplay loop muted>
      <source src="/public/assets/img/video_register (1).mp4" type="video/mp4">
  </video>
  <main>

      <div class="container main mt-5">
          <div class="row d-flex justify-content-center">

              <div class="col-10 col-lg-6">
                  <!-------------- FORM  ----------------->
                  <form class="bg-dark bg-opacity-75 rounded-1 pt-5 p-3 mb-5" action="" novalidate method="post">
                      <h2 class="text-center text-dark"><img src="/public/assets/img/logo-light.png" class="logoHome" alt="Logo Home"></h2>
                      <h1 class="text-white text-center mb-3">Inscription</h1>
                      <div class=" row">
                          <!-- Firstname -->
                          <div class="col-12 col-lg-6 p-3">
                              <input type="text" class="form-control" name="firstname" id="firstname" value="<?= !empty($_POST['firstname']) ? $_POST['firstname'] : '' ?>" placeholder="Firstname *" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="lirstname" required>
                              <?= $error['firstname'] ?? '' ?>
                          </div>

                          <!-- Lastname -->
                          <div class="col-12 col-lg-6 p-3">
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname *" value="<?= !empty($_POST['lastname']) ? $_POST['lastname'] : '' ?>" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="lastname" required>
                              <?= $error['lastname'] ?? '' ?>
                          </div>

                          <!-- Pseudo -->
                          <div class="col-12 p-3">
                              <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= !empty($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>" placeholder="Pseudo *" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="pseudo" required>
                          </div>
                          <?= $error['pseudo'] ?? '' ?>

                          <!-- Email -->
                          <div class="input-group p-3">
                              <span class="input-group-text bg-dark text-white" id="addon-wrapping">@</span>
                              <input type="mail" class="form-control" name="email" id="email" placeholder="Email *" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" maxlength="100" aria-label="email" aria-describedby="addon-wrapping" required>
                          </div>
                          <?= $error['email'] ?? '' ?>
                          <!------ CATEGORY ------->
                          <div class="col-12 p-3">
                              <select class="form-select " id="nativeTown" name="idCategories" aria-label="Pratique">
                                  <option selected>Sport pratiqué ? *</option>
                                  <?php
                                    foreach ($listCategory as $category) { ?>
                                      <option value="<?= $category->id ?>" <?= (!empty($_POST['idCategories']) === $category->id) ? 'selected' : '' ?>><?= $category->name ?></option>
                                  <?php }
                                    ?>
                              </select>
                              <?= $error['category'] ?? '' ?>
                              <!-- Password -->
                              <div class="col-12 p-3">
                                  <input type="password" class="form-control" name="password" id="password" placeholder="Password *" aria-label="password" required>
                                  <small class="text-white d-none" id="passwordHelp">Dois contenir au moins 8 lettres ou plus, une MAJUSCULE et une minuscule ainsi qu'un chiffre.</small><br>
                                  <small class="text-white mx-auto" id="passwordforce"></small>
                              </div>
                              <?= $error['password'] ?? '' ?>

                              <!-- confirmPassword -->
                              <div class="col-12 p-3">
                                  <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmer votre password *" aria-label="confirmPassword" required>
                                  <small class="text-white" id="passwordDif"></small>
                              </div>
                              <?= $error['confirmPassword'] ?? '' ?>

                              <div class="col-12 py-3  d-flex justify-content-center">
                                  <button type="submit" id="register" class="btn btn-dark px-5 w-75 text-white">S'inscrire</button>
                              </div>
                              <div class="col-12 py-4 d-flex justify-content-end">
                                  <a class="btn btn-sm btn-dark px-5 mt-2 text-white" id="connexion" type="submit" href="/controllers/homeCtrl.php" role="button">Se connecter</a>
                              </div>
                          </div>
                  </form>
              </div>
          </div>
      </div>
  </main>