<?php 
 $nom="LAMAI";
 $prenom="matar";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mon premier programme php</title>
</head>
<body>
    <?php echo "<h1>Bienvenue Mr $nom $prenom </h1>";   ?>
    <br>

  <h1>  <?php echo 'Bienvenue Mr $nom $prenom ';   ?></h1>
    <?php echo 'Bienvenue Mr '.$nom.' '. $prenom ;   ?><br>
    Bienvenue Mr <?php echo $nom.' '. $prenom ;   ?><br>
    Bienvenue Mr <?php echo $nom ;  ?>  <?php echo $prenom ;  ?><br>
<h1>Binevenue Mr <?php echo $nom?>  <?php echo $prenom?> </h1>
<h1>Binevenue Mr <?= $nom?>  <?=$prenom?> </h1>
</body>
</html>