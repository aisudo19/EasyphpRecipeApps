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
        require_once 'MAMP\db_config.php';
        $dsn = "mysql:dbname=db1;host=localhost;port=8889;charset=utf8";    
        try
        {
            $dbh = new PDO($dsn, $user, $pass);        
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT * FROM recipes";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<br>";
            echo "<table border = 1>";
                echo "<tr>\n";
                    echo "<th>料理名</th><th>予算</th><th>難易度</th>\n";
                    foreach($result as $row) {
                        echo "<tr>\n";
                        echo "<td>" . htmlspecialchars($row['recipe_name'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                        echo "<td>" . htmlspecialchars($row['budget'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                        echo "<td>" . htmlspecialchars($row['difficulty'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                        echo "<td><a href=detail.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">詳細</a>\n";
                        echo "| <a href = edit.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">変更</a>\n";
                        echo "| <a href=delete.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">削除</a></td>\n";

                        echo "</tr>\n";
                    }
                echo "</tr>\n";

            echo "</table>";
            die();
        } catch (Exception $e){
            echo "エラー発生：" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
        }
            
    ?>    
</body>
</html> 