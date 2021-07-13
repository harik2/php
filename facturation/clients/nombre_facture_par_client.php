
<?php 
try{

    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // preparation de la requete sql
    $r=$cnx->prepare("select c.client_id,c.nom,c.prenom,c.email , count(*) as n_facture from client c join facture f on c.client_id=f.client_id group by c.client_id,c.nom,c.prenom,c.email UNION select c.client_id,c.nom,c.prenom,c.email , 0 from client c left join facture f on c.client_id=f.client_id where f.numero is null
    ");
    //execution de la requete 
    $r->execute();
    $client_factures=$r->fetchAll();
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
    <title>Document</title>
</head>
<body>

<table>
        <tr>
            <th>#</th>
            <th>Nom prenom</th>
            <th>Email</th>
            <th>Nombre  de facture </th>
          
            <th>Actions</th>
        </tr>

        <?php foreach($client_factures as $c) {?>
        <tr>
            <td><?=$c['client_id']?></td>
            <td><?=$c['nom']?> <?=$c['prenom']?></td>
            <td><?=$c['email']?></td>
            
            <td><?=$c['n_facture']?></td>
            <td>
                <a href="delete.php?id=<?=$c['client_id']?>">Supprimer</a>
                <a href="edit.php?id=<?=$c['client_id']?>">Modifier</a><a href="">Consulter</a>
            </td>
        </tr>
        <?php }?>
    </table>
    
</body>
</html>