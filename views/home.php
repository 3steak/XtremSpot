      <!----------- START MAIN  -------------->
      <main class="d-flex align-items-center">
          <!-- Background video -->

          <video id="background-video" autoplay loop muted>
              <source src="/public/assets/img/video_home.mp4" type="video/mp4">
          </video>

          <div class="container containerHome  main mt-5">
              <?php flash('newPass') ?? '' ?>
              <?= $error['noValidated'] ?? '' ?>
              <div class="row  justify-content-center">
                  <div class="col-10 col-lg-5 bg-dark bg-opacity-75 pt-5 pb-2 px-4 mb-5 rounded-1">
                      <h1 class="text-center ">
                          <span class="xtrem">XTREM</span><span class="spot">SPOT</span><br>
                          <hr class="hrSlogan mx-auto"><span class="publication">Une Publication</span><br><span class="petitspot"> Un Spot</span>
                      </h1>
                      <p class="text-white text-center explainHome pt-2"> Rejoins notre communauté de passionés de sports <span class="smallSpot">extrêmes</span> !</p><br>
                      <p class="text-white text-center explainHome">🏄 Partage tes plus belles <span class="smallSpot">photos</span> de ride !📷</p><br>
                      <p class="text-white text-center explainHome"> 📍Découvre de nouveaux <span class="smallSpot">spots</span> incroyables dans ta région grâce à notre application de partage de spots 🤙</p><br>
                  </div>
                  <div class="col-10 col-lg-5 ">
                      <form class="bg-dark bg-opacity-75 pt-5 pb-2 px-4 mb-5 rounded-1" method="post" action="">
                          <h2 class="text-white text-center p-3">Connexion</h2>
                          <div class=" row">
                              <div class="input-group p-3">
                                  <span class="input-group-text bg-dark text-white" id="addon-wrapping">@</span>
                                  <input type="mail" class="form-control" id="email" name="email" placeholder="Email *" aria-label="email" aria-describedby="addon-wrapping" required>
                              </div>
                              <?= $error['email'] ?? '' ?>
                              <div class="input-group p-3">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password *" aria-label="password" required>
                                  <span class="input-group-text bg-dark text-white" id="basic-addon2"><i class="fa-regular fa-eye" id="togglePassword"></i></span>
                              </div>
                              <?= $error['password'] ?? '' ?>
                              <a href="/controllers/passwordLost/verifMailCtrl.php" class="link-secondary text-white text-center text-decoration-none forgotMdp">Mot de
                                  passe oublié</a>
                              <div class="col-12 py-3 d-flex justify-content-center">
                                  <button type="submit" id="connexion" class="btn btn-dark px-5 w-75">Connexion</button>
                              </div>
                              <div class="col-12 py-3 d-flex justify-content-end">
                                  <a class="btn btn-sm btn-dark px-5 mt-2 text-white" id="register" type="submit" href="/controllers/registerCtrl.php" role="button">S'inscrire</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </main>
      <!----------- END OF MAIN  -------------->