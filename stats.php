<?php
include "connect.php";

$sql = "
    SELECT 
        u.id,
        u.surname,
        u.name,
        COALESCE(SUM(attempts.cnt), 0) AS total_attempts,
        COALESCE(SUM(attempts.correct), 0) AS correct_attempts
    FROM users u
    LEFT JOIN (
        SELECT user_id, COUNT(*) AS cnt, SUM(res) AS correct
        FROM kv_ur
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM det
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM kramer
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM treug
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM treug_square
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM is_treug
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM treug_mbh
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM sin
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM exp
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM integral
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        UNION ALL
        SELECT user_id, COUNT(*), SUM(res)
        FROM matrix_sum
        WHERE user_id IS NOT NULL
        GROUP BY user_id
        
        
        
    ) AS attempts ON u.id = attempts.user_id
    GROUP BY u.id
    ORDER BY u.id ASC
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Статистика учеников</title>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 align="center">Статистика выполнения заданий</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Всего попыток</th>
            <th>Правильных ответов</th>
            <th>Успеваемость (%)</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['surname']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['total_attempts'] ?></td>
            <td><?= $row['correct_attempts'] ?></td>
            <td>
                <?php
                $percent = ($row['total_attempts'] > 0) ? round(100 * $row['correct_attempts'] / $row['total_attempts'], 1) : 0;
                echo $percent . '%';
                ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <div align="center">
        <a href="index.html">Вернуться на главную</a>
    </div>
</body>
</html>