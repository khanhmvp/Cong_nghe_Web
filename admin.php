<?php 
include "functions.php";
$flowers = loadData();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản trị Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4 text-center">🌼 Quản trị danh sách hoa 🌼</h1>

    <a href="add.php" class="btn btn-primary mb-3">➕ Thêm Hoa</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Ảnh</th>
                <th>Tên Hoa</th>
                <th>Mô Tả</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $i => $f): ?>
            <tr>
                <td><img src="images/<?php echo $f['img']; ?>" width="120"></td>
                <td><?php echo $f['name']; ?></td>
                <td><?php echo $f['desc']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $i; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="delete.php?id=<?php echo $i; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Xóa hoa này?');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">⬅ Về trang khách</a>
</div>

</body>
</html>
