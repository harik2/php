<?php
$prenom = "Hajar";
$age = 30;
$p = "$prenom a $age ans";
if($age>18){
    $maj="Majeur";
    $color="red";
}else{
    $maj="Mineur";
    $color="green";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background:<?=$color?>">
    <h2>
        <?php echo $p; ?>
        <?php echo '<p style="color:red">$prenom</p>'; ?>
        <?php echo "<p style=\"color:red\">$prenom</p>"; // echapement 'ESCAPE'
        ?>
    </h2>
    <h2 style="color:green">
        <?= $prenom ?> a <?= $age ?> ans
    </h2>
    <h3>Bienenue <?php echo 'on\'eal'; ?></h3>
    <h3>Bienenue <?php echo "on'eal"; ?></h3>

    <h4>
    <?php if($age > 18){
        echo  "Majeur";
        }else {
        echo "Mineur";
        }
    
    ?>
    </h4>
    <h5>
    <?=$maj?>
    </h5>
</body>

</html>