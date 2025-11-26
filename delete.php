<?php
include "functions.php";
$data = loadData();

$id = $_GET['id'];

unset($data[$id]);
$data = array_values($data); // sắp xếp lại index

saveData($data);

header("Location: admin.php");
exit;