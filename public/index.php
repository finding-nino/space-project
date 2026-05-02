<?php

require_once '../config/db_conn.php';







$sql = "SELECT date, title, url, hdurl, media_type, explanation, copyright FROM apod_entries ORDER BY date DESC LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$date = $row['date'];
$title = $row['title'];
$imageUrl = $row['hdurl'] ?? $row['url'];
$media = $row['media_type'];
$explanation = $row['explanation'];
$copyright = $row['copyright'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Space Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<img id="bg" src="<?php echo $imageUrl; ?>">



<!--    <div>-->
<!--        --><?php //if ($media === 'image'): ?>
<!--            <img src="--><?php //= $imageUrl ?><!--" width="800">-->
<!--        --><?php //else: ?>
<!--            <iframe width="800" height="600" src="--><?php //= $imageUrl ?><!--"></iframe>-->
<!--        --><?php //endif; ?>
<!--    </div>-->


<div class="info-container" style="color: white">
    <h1><?= $title ?> </h1>


    <aside>
        <div id="info" >
            <?= $explanation ?>
        </div>
        <div>
            <?php if ($copyright):?>
                <?= $copyright?>
            <?php endif;?>
            <p><?= $date ?></p>
        </div>
    </aside>
</div>









</body>
</html>

<style>
    .info{

    }
</style>

<script>
    //document.getElementById('<?php //echo $imageUrl; ?>//')
    //const img = new Image();
    //img.onload = function() {
    //    document.body.style.backgroundImage = "url('<?php //echo $imageUrl; ?>//')";
    //    document.body.style.backgroundSize = "cover";
    //    document.body.style.backgroundPosition = "center";
    //    document.body.style.backgroundRepeat = "no-repeat";
    //};
    //img.src = "<?php //echo $imageUrl; ?>//";
    //document.body.style.backgroundColor = "black";
    //document.body.style.minHeight = "100vh";
</script>
