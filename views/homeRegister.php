  <!-- Background video -->
  <video id="background-video" autoplay loop muted>
      <source src="/public/assets/img/video_home.mp4" type="video/mp4">
  </video>
  <main>
      <div class="container main mt-5">
          <div class="row d-flex justify-content-center">
              <div class="col-10 col-lg-6">
                  <!-------------- FORM  ----------------->
                  <form class="bg-dark bg-opacity-75 rounded-1 p-3 mb-5" action="" novalidate method="post">
                      <h2 class="text-white text-center">Inscription</h2>
                      <div class=" row">
                          <!-- Firstname -->
                          <div class="col-12 col-lg-6 p-3">
                              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname *" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="lirstname" required>
                          </div>
                          <?= $error['firstname'] ?? '' ?>
                          <!-- Lastname -->
                          <div class="col-12 col-lg-6 p-3">
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname *" pattern="[A-Za-zÀ-ÿ' `\-]{2,20}" aria-label="lastname" required>
                          </div>
                          <?= $error['lastname'] ?? '' ?>

                          <!-- Pseudo -->
                          <div class="col-12 p-3">
                              <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo *" pattern="[A-Za-zÀ-ÿ' `\-]{2,20}" aria-label="pseudo" required>
                          </div>
                          <?= $error['pseudo'] ?? '' ?>

                          <!-- Email -->
                          <div class="input-group p-3">
                              <span class="input-group-text bg-dark text-white" id="addon-wrapping">@</span>
                              <input type="mail" class="form-control" name="email" id="email" placeholder="Email *" maxlength="100" aria-label="email" aria-describedby="addon-wrapping" required>
                          </div>
                          <!-- Password -->
                          <div class="col-12 p-3">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password *" aria-label="password" required>
                              <small class="text-white d-none" id="passwordHelp">Dois contenir au moins 8 lettres ou plus, une MAJUSCULE et une minuscule ainsi qu'un chiffre.</small><br>
                              <small class="text-white mx-auto" id="passwordforce"></small>
                          </div>
                          <!-- confirmPassword -->
                          <div class="col-12 p-3">
                              <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmer votre password *" aria-label="confirmPassword" required>
                              <small class="text-white" id="passwordDif"></small>
                          </div>
                          <!-- Birthday -->
                          <h3 class="text-white ms-2 pt-3">Birthday</h3>
                          <div class="col-12 px-3 mb-3">
                              <input type="date" class="form-control" id="birthdayUser" name="birthday" placeholder="" aria-label="birthdayUser" required>
                              <?= $error['birthday'] ?? '' ?>
                          </div>
                          <div class="col py-3 d-flex justify-content-center">
                              <button type="submit" id="register" class="btn btn-dark px-5">S'inscrire</button>
                          </div>
                          <div class="col py-3 d-flex justify-content-center">
                              <button type="submit" id="connecion" class="btn btn-dark px-5">Connexion</button>
                          </div>

                      </div>
                  </form>
              </div>
          </div>
      </div>
  </main>