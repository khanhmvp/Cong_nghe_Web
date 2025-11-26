<?php
include "functions.php";
$data = loadData();

$id = $_GET['id'];
$flower = $data[$id];

if ($_POST) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $imgName = $flower['img'];

    // nếu có upload ảnh thì thay
    if (!empty($_FILES['img']['name'])) {
        $file = $_FILES['img'];
        $imgName = time() . "-" . $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $imgName);
    }

    $data[$id] = ["name" => $name, "desc" => $desc, "img" => $imgName];
    saveData($data);
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h2>✏️ Sửa Hoa</h2>

    <form method="post" enctype="multipart/form-data" class="mt-3">
        <label class="form-label">Tên hoa</label>
        <input name="name" class="form-control" value="<?php echo $flower['name']; ?>" required>

        <label class="form-label mt-2">Mô tả</label>
        <textarea name="desc" class="form-control" rows="4" required><?php echo $flower['desc']; ?></textarea>

        <label class="form-label mt-2">Ảnh hiện tại</label><br>
        <img src="images/<?php echo $flower['img']; ?>" width="150"><br>

        <label class="form-label mt-2">Chọn ảnh mới (nếu muốn đổi)</label>
        <input type="file" name="img" class="form-control">

        <button class="btn btn-warning mt-3">Cập nhật</button>
        <a href="admin.php" class="btn btn-secondary mt-3">Hủy</a>
    </form>
</div>

</body>
</html>
