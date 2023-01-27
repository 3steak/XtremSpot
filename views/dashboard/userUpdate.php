  <!----------------  START MAIN --------------->
  <main>
      <div class="container main mt-4">
          <div class="row d-flex gap-2 justify-content-center">
              <div class="col-12">
                  <h1 class="text-white text-center">PROFIL DE X</h1>
              </div>

              <div class="col-11 mb-2">
                  <!-- CARD SETTINGS -->
                  <div class="cardSettings  d-flex justify-content-center m-2 p-2">
                      <div class="col-12 ">
                          <form class="bg-dark rounded-1 p-3" method="post" action="">

                              <div class=" row">
                                  <div class="col-12 col-lg-6 p-3">
                                      <input type="text" class="form-control" id="firstname" placeholder="First name " aria-label="First name">
                                  </div>
                                  <div class="col-12 col-lg-6 p-3">
                                      <input type="text" class="form-control" id="lastname" placeholder="Last name " aria-label="Last name">
                                  </div>


                                  <div class="col-12 p-3">
                                      <input type="password" class="form-control" id="password" placeholder="Password " aria-label="password">
                                  </div>
                                  <div class="input-group p-3">
                                      <span class="input-group-text bg-dark text-white" id="addon-wrapping">@</span>
                                      <input type="mail" class="form-control" id="email" aria-label="email" value="toto@gmail.com" aria-describedby="addon-wrapping">
                                  </div>


                                  <h3 class="text-white ms-2 pt-3">Ville</h3>
                                  <div class="col-12 px-3">
                                      <input type="text" class="form-control" id="townUser" placeholder="userTown" aria-label="townUser">
                                  </div>

                                  <h3 class="text-white ms-2 pt-3">Sport pratiqué</h3>
                                  <div class="col-12 px-3">
                                      <input type="text" class="form-control" id="sportUser" placeholder="sportUser" aria-label="sportUser">
                                  </div>



                                  <h3 class="text-white ms-2 pt-3">Birthday</h3>
                                  <div class="col-12 px-3">
                                      <input type="date" class="form-control" id="birthdayUser" placeholder="" aria-label="birthdayUser">
                                  </div>
                                  <div class="col-12  mx-auto d-flex justify-content-around gap-4 my-4">
                                      <button type="submit" class="btn  btn-sm btn-primary min-w-25  ">MODIFIER</button>
                                      <button type="submit" class="btn btn-sm btn-primary min-w-25">SUPPRIMER</button>
                                  </div>

                              </div>


                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </div>

  </main>
  <!------- END MAIN  ----->