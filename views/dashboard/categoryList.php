    <!----------------START MAIN --------------->
    <main>
        <div class="container main mt-5 mb-4">
            <div class="row gap-2 flex-column justify-content-center">
                <div class="col-12">
                    <h1 class="text-white text-center m-2"><span class="xtrem">CATE</span><span class="spot">GORIES</span></h1>
                </div>
                <div class="col-8 mx-auto">
                    <form method="post" action="/controllers/dashboard/CRUDCtrl.php">
                        <label for="addCategorie" class="form-label">
                            <h4 class="text-white  pt-3">Ajouter une catégorie</h4>
                        </label>
                        <input type="text" class="form-control text-center" name="categorie" id="addCategorie" value="" placeholder="Ajouter une Categorie/Sport" pattern="<?= REGEX_NO_NUMBER ?>" aria-label="addCategorie" required>
                        <div class="col-12 text-center mt-4"><button type="submit" class="btn btn-primary">Ajouter</button>
                            <?= $error['categorie'] ?? '' ?>
                    </form>
                </div>
                <div class="row bg-table my-4">
                    <div class=" d-flex justify-content-center   bg-light p-3">

                        <table id="dataTable" class="display neumorphic">
                            <thead>
                                <tr class="">
                                    <th class="">Categories</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($category as $categorie) {
                                ?>

                                    <tr>
                                        <td class=""><?= $categorie->name ?></td>
                                        <td>
                                            <a class="deleteApt" title="Supprimer l'utilisateur" href="" data-bs-toggle="modal" data-bs-target="#validateModal" data-name="<?= $categorie->name ?> " data-id=<?= $categorie->id ?>>
                                                <i class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr> <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="validateModal" tabindex="-1" aria-labelledby="validateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="validateModalLabel">Suppression de la categorie</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Supprimer la categorie <span class="fullname"></span> ? <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-primary " id="linkDelete" href="/deleteCategoryCtrl?id=" role="button">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!------- END MAIN  ----->