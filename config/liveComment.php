<?php
require_once(__DIR__ . '/../helpers/db.php');
require_once(__DIR__ . '/../models/Comment.php');

if (isset($_GET['input'])) {
    $input = trim(filter_input(INPUT_GET, 'input', FILTER_SANITIZE_SPECIAL_CHARS));

    //  dans methode GET
    $request = "SELECT appointments.id, `dateHour`, `idPatients`, `lastname`, `firstname`, `mail`
    FROM `appointments` JOIN `patients` 
    ON appointments.idPatients = patients.id WHERE `lastname` LIKE '%{$input}%' OR `dateHour` LIKE '%{$input}%' OR `firstname` LIKE '%{$input}%' OR `mail` LIKE '%{$input}%'  ORDER BY `lastname` LIMIT 10;";

    $appointments = Database::connect()->prepare($request);

    $appointments->execute();
    $appointments = $appointments->fetchAll();
    if (count($appointments) > 0) {
        echo json_encode($appointments);
    } else {
        false;
    }
}
