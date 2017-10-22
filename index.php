<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>レシピの一覧</title>
</head>
<body>
    <h1>レシピの一覧</h1>
    <a href="form.html">レシピの新規登録</a>
    <?php
        echo "<td>" . htmlspecialchars($row['difficulty'], ENT_QUOTES, 'UTF-8') . "</td>\n";
        echo "<td>\n";
        echo "<a href=detail.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">詳細</a>\n";
        echo "| <a href = edit.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">変更</a>\n";
        echo "| <a href=delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">削除</a>\n";
        echo "<\td>\n";
        echo "</tr>\n";
        die();
    ?>
    
</body>
</html> 