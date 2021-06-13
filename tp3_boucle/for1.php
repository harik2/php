<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <ul>
        <?php for ($i = 1; $i <= 10; $i++) { ?>
       <?php 
        if($i%3==0){
         $color="red";
        } 
        else if($i%3==1){    
            $color="green";
        }
        else{    
            $color="blue";
        }
                
        
        ?>

            <li  style="background:<?=$color?> "  >Produit <?= $i ?></li>
        <?php } ?>

    </ul>
</body>

</html>