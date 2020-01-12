<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品追加</title>
    <link rel="stylesheet" href="kanri.css">
</head>

<body>
    <div class="base">
        <?php if ($erro) echo "<span class=\"error\">$erro</span>" ?>
        <form action="insert.php" method="post">
            <p>
                商品名<br>
                <input type="text" name="name" value="<?php echo $name ?>">
            </p>
            <p>
                価格<br>
                <input type="text" name="price" value="<?php echo $price ?>">
            </p>
            <p>
                <input type="submit" name="submit" value="追加">
            </p>
        </form>
    </div>
    <div class="base">
        <a href="index.php">一覧に戻る</a>
    </div>
</body>

</html>