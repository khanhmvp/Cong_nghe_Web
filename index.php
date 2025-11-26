<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4">
    <h2 class="text-center mb-4">Danh sách tài khoản từ file CSV</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>City</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>

        <?php
        // Mở file CSV
        if (($file = fopen("accounts.csv", "r")) !== FALSE) {
            $header = fgetcsv($file);  // Đọc dòng tiêu đề

            // Đọc từng dòng dữ liệu
            while (($row = fgetcsv($file)) !== FALSE) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }

            fclose($file);
        } else {
            echo "<tr><td colspan='7' class='text-center text-danger'>Không thể mở file CSV</td></tr>";
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>
