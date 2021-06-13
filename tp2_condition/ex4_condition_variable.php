<?php 
//
$genre="femme";
$prenom="Aya";
$chemin=($genre=="homme") ? "images/homme.jpg":"images/femme.jpg";
$sf="marié";
$p=($sf=="marié")? "Mme.":"Mlle.";
if($genre=="homme"){
$color="skyblue";
}else{
    $color="pink";
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
<body  style="background:<?=$color?>">

<img src="<?=$chemin?>" alt="" width="300">
    <h3><?=$prenom?></h3>

<?php if($genre=="femme") {?>
    <h4><?=$p?></h4>
<?php } ?>
</body>
</html>