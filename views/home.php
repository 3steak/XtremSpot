      <!-- Background video -->
      <video id="background-video" autoplay loop muted>
          <source src="/public/assets/img/video_home.mp4" type="video/mp4">
      </video>
      <!----------- START MAIN  -------------->
      <main>
          <div class="container-fluid my-5 bg-white bg-opacity-75 ">
              <div class="row">
                  <div class="col">
                      <h1 class="text-center p-5 text-dark">FUTUR LOGO ICI</h1>
                  </div>
              </div>
          </div>
          <div class="container-fluid my-5 bg-white bg-opacity-75 ">
              <div class="row">
                  <div class="col">
                      <h1 class="text-center p-5 text-dark">FUTUR LOGO ICI</h1>
                  </div>
              </div>
          </div>
          <div class="container main mt-5">
              <div class="row d-flex justify-content-center">
                  <div class="col-10 col-lg-6 ">
                      <form class="bg-dark bg-opacity-75 pt-5 pb-2 px-4 mb-5 rounded-1" method="post" action="">
                          <h2 class="text-white text-center p-3">Connexion</h2>
                          <div class=" row">
                              <div class="input-group p-3">
                                  <span class="input-group-text bg-dark text-white" id="addon-wrapping">@</span>
                                  <input type="mail" class="form-control" id="email" placeholder="Email *" aria-label="email" aria-describedby="addon-wrapping" required>
                              </div>
                              <div class="input-group p-3">
                                  <input type="password" class="form-control" id="password" placeholder="Password *" aria-label="password" required>
                                  <span class="input-group-text bg-dark text-white" id="basic-addon2"><i class="fa-regular fa-eye" id="togglePassword"></i></span>
                              </div>
                              <a href="/controllers/forgotMdp.php" class="link-secondary text-white text-center text-decoration-none forgotMdp">Mot de
                                  passe oublié</a>


                              <div class="col-12 py-3 d-flex justify-content-center">
                                  <button type="submit" id="connexion" class="btn btn-dark px-5 w-75">Connexion</button>
                              </div>
                              <div class="col-12 py-3 d-flex justify-content-end">
                                  <a class="btn btn-sm btn-dark px-5 mt-2" id="register" type="submit" href="/controllers/registerCtrl.php" role="button">S'inscrire</a>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </main>
      <!----------- END OF MAIN  -------------->
      </main>