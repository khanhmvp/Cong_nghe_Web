<?php 
include "functions.php";
$flowers = loadData();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center mb-4">🌸 Danh sách các loài hoa 🌸</h1>

    <div class="row">
        <?php foreach ($flowers as $f): ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="images/<?php echo $f['img']; ?>" class="card-img-top" height="200" style="object-fit: cover;">
                    <div class="card-body">
                        <h5><?php echo $f['name']; ?></h5>
                        <p><?php echo $f['desc']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
        <a href="admin.php" class="btn btn-dark">Trang quản trị</a>
    </div>
</div>

</body>
</html>
