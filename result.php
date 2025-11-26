<?php
$total = count($_POST) / 2; // mỗi câu có qX + ansX
$correct = 0;

for ($i = 0; $i < $total; $i++) {
    $user = $_POST["q$i"] ?? "Không chọn";
    $ans  = $_POST["ans$i"];

    if ($user == $ans) $correct++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4 text-center">
    <h1>Kết quả bài thi</h1>
    <h2 class="mt-3 text-success">Điểm: <?= $correct ?> / <?= $total ?></h2>

    <a href="index.php" class="btn btn-primary mt-3">Làm lại</a>
</div>
</body>
</html>
