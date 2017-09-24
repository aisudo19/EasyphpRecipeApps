<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>出力結果</title>
</head>
<body>
	<?php
		$user = "nakamura";
		$pass = "nakamura";
        $dsn = "mysql:dbname=db1;host=localhost;port=8889;charset=utf8";
        // charset=utf8"
        try{
            $dbh = new PDO($dsn, $user, $pass);        
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="SELECT * FROM recipes";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<table>\n";
            echo "<tr>\n";
            echo "<th>料理名</th><th>予算</th><th>難易度</th>\n";
            foreach($result as $row) {
                echo "<tr>\n";
                echo "<td>" . htmlspecialchars($row['recipe_name'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "<td>" . htmlspecialchars($row['budget'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "<td>" . htmlspecialchars($row['difficulty'],ENT_QUOTES, 'UTF-8') . "</td>\n";
                echo "</tr>\n";
            }
            echo "</tr>\n";            
            echo "</table>\n";    
            
            print_r($result);
            $dbh = null;
        }
        catch(Exception $e){
            echo 'Connection failed: ' . htmlspecialchars($e->getMessage(),ENT_QUOTES, "UTF-8");
            die();
        }
		    ?>
</body>
</html> 