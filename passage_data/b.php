<?php 
// recuperer le prix et la qte depuis le lien (get)



$total=0;
$message="";
//scenarios des erreurs :
// l'user ne renseigne les datas (pridx et qte) (vide)
if(empty($_POST['prix']) || empty($_POST['qte']) ){
    $message="tous les champs obligatoires ";
// prix et qte  ne sont pas numeriques
}else if(! is_numeric($_POST['prix']) || !is_numeric($_POST['qte'])) {
    $message="tous les champs doivent etre numeriques";
    
    // prix et qte sont <0
}else if($_POST['prix']<0 || $_POST['qte']<0){
    $message="les champs doivent etre n>0 ";
}else {
    
    $total=$_POST['prix']*$_POST['qte'];
}

// on envoie rien à b (on a accedé directement à b)


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
<div style="color:red">
<?=$message?>
</div>

<h3>Le total est : <?=$total?>DHS</h3>
    
</body>
</html>