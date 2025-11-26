<?php
function loadData() {
    $file = "data.json";
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    return json_decode($json, true);
}

function saveData($data) {
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents("data.json", $json);
}
