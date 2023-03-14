    <!----------------START MAIN --------------->
    <main>
        <div class="container main mt-5">
            <div class="row d-flex gap-2 justify-content-center">
                <div class="col-12">
                    <h1 class="text-white text-center m-2">UTILISATEURS</h1>
                </div>
                <div class="container-fluid  my-3 cardUserContent">
                    <div class="row">
                        <div class="card d-flex  gap-2  bg-light p-3">

                            <table id="dataTable" class="display neumorphic">
                                <thead>
                                    <tr class="">
                                        <th class="dNoneMobil">Nom</th>
                                        <th class="dNoneMobil">Prénom</th>
                                        <th>Pseudo</th>
                                        <th class="dNoneMobil">Mail</th>
                                        <th class="">Admin</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $user) { ?>
                                        <tr>
                                            <td class="dNoneMobil"><?= htmlspecialchars($user->lastname) ?></td>
                                            <td class="dNoneMobil"><?= htmlspecialchars($user->firstname) ?></td>
                                            <td><a id="pseudo" title="Voir profil" href="/../../controllers/profilUserCtrl.php?id=<?= $user->id ?>"><?= htmlspecialchars($user->pseudo) ?></a></td>
                                            <td class="dNoneMobil"><a class="telmail" title="Appeler" href="mailto:<?= htmlspecialchars($user->email) ?>"><?= htmlspecialchars($user->email) ?></a></td>
                                            <td><?= ($user->admin === 1) ? "OUI" : "NON" ?></td>
                                            <td><a class="m-1 seeProfil" title="Voir et modifier profil" href="/../controllers/dashboard/profilCrudCtrl.php?id=<?= $user->id ?>"><i class="fa-regular fa-eye"></i></a>
                                                <a class="m-1 deleteApt" title="Supprimer l'utilisateur" href="" data-bs-toggle="modal" data-bs-target="#validateModal" data-name="<?= htmlspecialchars($user->lastname) ?> <?= htmlspecialchars($user->firstname) ?>" data-id=<?= $user->id ?>>
                                                    <i class="fa-regular fa-trash-can m-1"></i></a>
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
                                        <h1 class="modal-title fs-5" id="validateModalLabel">Suppression du user</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Supprimer l'utilisateur <span class="fullname"></span> ? <br>
                                        Cela n'affectera pas ses publications et ses commentaires
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-primary " id="linkDelete" href="/deleteUserCtrl?id=" role="button">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!------- END MAIN  ----->