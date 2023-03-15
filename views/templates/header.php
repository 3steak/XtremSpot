<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!-- leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script defer src="/public/assets/js/<?= $jsName ?>.js"></script>
    <!-- lien bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- lien DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <title>XtremSpot • </title>
</head>

<body class="body">

    <!--------------------- HEADER  --------------------------->

    <header class="bg-dark bg-opacity-75">
        <nav class="navbar  navbar-dark ">
            <div class="container-fluid ">
                <a class="navbar-brand " href="/controllers/feedUserCtrl.php"><img class="logoPrincipal" src="/public/assets/img/logo-light.png" alt="logo principal"></a>
                <!-- CE BOUTON CRUD APPARAIT SI USER = ADMIN -->
                <a class="btn btn-primary " href="/controllers/dashboard/CRUDCtrl.php" role="button">DASHBOARD</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav text-end ">
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/profilUserCtrl.php">
                                Profil
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/notifUserCtrl.php">
                                Notifications
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/feedUserCtrl.php">
                                Feed
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/addPublicationCtrl.php">
                                Ajouter une publication
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white  p-3" href="/controllers/addFriendsCtrl.php">
                                Ajouter un ami
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/settingsCtrl.php">
                                Paramètres
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white p-3" href="/controllers/homeCtrl.php">
                                Déconnexion
                            </a>
                        </li>
                        <li>
                            <hr class="border border-light border-2 ">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>