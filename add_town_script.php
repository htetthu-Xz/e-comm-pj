<?php

// this is a script to add townships and state data to database
require_once __DIR__ . "/town_data.php";

$data = json_decode($town_ship_datas, true);

$db = new PDO("mysql:host=localhost;dbname=torofy", "domak", "audrey");
foreach ($data as $state => $districts) {
    // Insert state
    $insertStateQuery = $db->prepare('INSERT INTO states (name) VALUES (:state)');
    $insertStateQuery->execute(['state' => $state]);
    $stateId = $db->lastInsertId();

    foreach ($districts as $district => $townships) {
        // Insert district
        $insertDistrictQuery = $db->prepare('INSERT INTO districts (name, state_id) VALUES (:district, :state_id)');
        $insertDistrictQuery->execute(['district' => $district, 'state_id' => $stateId]);
        $districtId = $db->lastInsertId();

        foreach ($townships as $township) {
            // Insert township
            $insertTownshipQuery = $db->prepare('INSERT INTO townships (name, district_id) VALUES (:township, :district_id)');
            $insertTownshipQuery->execute(['township' => $township, 'district_id' => $districtId]);
        }
    }
}