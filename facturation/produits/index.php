<?php 
try{

  
    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("select * from produit");
    //execution de la requete 
    $r->execute();
    $produits=$r->fetchAll();
}catch (PDOException $e) {
    echo "Erreur     ".$e->getMessage() ;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload de fichier et ajout de produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>

    <div class="container">

        <div class="row">
            <h3 class="text-center my-5  text-primary">
                Liste des produits en stock
            </h3>
            <table class="table table-tripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">prix</th>
                        <th scope="col">Quantite en stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($produits as $p){?>
                    <tr>
                        <th scope="row"><?=$p['produit_id']?></th>
                        <td><img src="<?=($p['photo']=='')? 'http://placehold.it/200x200':'../'.$p['photo']?>" alt="" width="100" class="img-thumbnail"></td>
                        <td><?=$p['libelle']?></td>
                        <td><?=$p['prix']?></td>
                        <td><?=$p['qtestock']?></td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>