<?php 
$name = ["florian","stanslaus","andrew","francis"];





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>names</h1>
    <ul><?php foreach($name as $a){ ?>
    
        <h1><?php echo $a.'<br/>' ?></h1> 
    
    <?php } ?>
</ul>

<?php include('content.php')?>
</body>
</html>