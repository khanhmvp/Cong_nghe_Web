<?php
include "functions.php";
$data = loadData();

if ($_POST) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    // xử lý ảnh upload
    $file = $_FILES['img'];
    $imgName = time() . "-" . $file['name'];
    move_uploaded_file($file['tmp_name'], "images/" . $imgName);

    $data[] = ["name" => $name, "desc" => $desc, "img" => $imgName];
    saveData($data);
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2>➕ Thêm Hoa Mới</h2>

    <form method="post" enctype="multipart/form-data" class="mt-3">
        <label class="form-label">Tên hoa</label>
        <input name="name" class="form-control" required>

        <label class="form-label mt-2">Mô tả</label>
        <textarea name="desc" class="form-control" rows="4" required></textarea>

        <label class="form-label mt-2">Ảnh</label>
        <input type="file" name="img" class="form-control" required>

        <button class="btn btn-primary mt-3">Lưu</button>
        <a href="admin.php" class="btn btn-secondary mt-3">Hủy</a>
    </form>
</div>

</body>
</html>
