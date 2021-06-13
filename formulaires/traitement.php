<?php 
// print_r($_POST);


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
<p>
Email est : <?=$_POST['email'];?>
</p>
<p>
Mot de passe   : <?=$_POST['passe'];?>
</p>
<p>
Genre    : <?=$_POST['genre'];?>
</p>
<p>
SPECIALITE    : 
<?php 
$specialites=$_POST['specialite'];//['dev','design']

?>

<ul>
<?php foreach($specialites as $s) {?>
    <li><?=$s?></li>
<?php } ?>

</ul>
</p>
<ul>
<?php 

$cols=$_POST['couleur'];
foreach($cols as $c){
?>
<li  style="color:<?=$c?>"  ><?=$c?></li>

<?php } ?>
</ul>
    
</body>
</html>