<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品修正</title>
    <link rel="stylesheet" href="kanri.css">
</head>

<body>
    <div class="base">
        <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
        <form action="edit.php" method="post">
            <p>
                商品名<br>
                <input type="text" name="name" value="<?php echo $name ?>">
            </p>
            <p>
                商品説明<br>
                <textarea name="comment" cols="60" rows="10"><?php echo $comment ?></textarea>
            </p>
            <p>
                価格<br>
                <input type="text" name="price" value="<?php echo $price ?>">
            </p>
            <p>
                <input type="hidden" name="code" value="<?php echo $code ?>">
                <input type="submit" value="更新" name="submit">
            </p>
        </form>
    </div>
    <div class="base">
        <a href="index.php">一覧に戻る</a>
    </div>
</body>

</html>