
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <table border="1"  class="table">
            <tr>
                <td>id</td>
                <td>Libelle</td>
                <td>Prix</td>
                <td>Actions</td>
            </tr>
            <?php 
try{

    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_zero', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("select *  from produit ");
    //execution de la requete 
    $r->execute();
   $resultat= $r->fetchAll();
// print_r($resultat);

}catch (PDOException $e) {
    echo "Échec d'ajout du produit  : " . $e->getMessage();
}

?>
<?php foreach($resultat as $l) {?>
            <tr>
                <td><?=$l['id']?></td>
                <td><?=$l['libelle']?></td>
                <td><?=$l['prix']?></td>
                <td>
<a  onclick="return confirm('supprimer?')" class="btn btn-danger" href="delete.php?id=<?=$l['id']?>">Supprimer</a>

                </td>
            </tr>
<?php } ?>
    </table>
    
</body>
</html>