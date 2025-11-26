<?php
// Đọc file quiz.txt
$raw = file_get_contents("quiz.txt");

// Tách thành các khối câu hỏi dựa vào dòng trống
$blocks = preg_split("/\r?\n\r?\n/", trim($raw));

$questions = [];

foreach ($blocks as $block) {
    $lines = array_filter(array_map('trim', explode("\n", $block)));
    if (count($lines) < 6) continue;

    $q = [];
    $q['question'] = $lines[0];
    $q['A'] = substr($lines[1], 3);
    $q['B'] = substr($lines[2], 3);
    $q['C'] = substr($lines[3], 3);
    $q['D'] = substr($lines[4], 3);

    // ANSWER: X
    $answerLine = end($lines);
    $q['answer'] = trim(str_replace("ANSWER:", "", $answerLine));

    $questions[] = $q;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4">
    <h1 class="text-center mb-4">Bài thi trắc nghiệm</h1>

    <form method="post" action="result.php">
        <?php foreach ($questions as $i => $q): ?>
            <div class="card mb-3 p-3 shadow-sm">
                <h5><strong>Câu <?= $i + 1 ?>:</strong> <?= $q['question'] ?></h5>

                <?php foreach (['A','B','C','D'] as $opt): ?>
                    <div>
                        <label>
                            <input type="radio" name="q<?= $i ?>" value="<?= $opt ?>">
                            <?= $opt ?>. <?= $q[$opt] ?>
                        </label>
                    </div>
                <?php endforeach; ?>

                <!-- Đáp án đúng (ẩn) -->
                <input type="hidden" name="ans<?= $i ?>" value="<?= $q['answer'] ?>">
            </div>
        <?php endforeach; ?>

        <button class="btn btn-primary">Nộp bài</button>
    </form>
</div>
</body>
</html>
