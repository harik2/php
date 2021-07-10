<?php
try {

    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparation de la requete sql
    $r = $cnx->prepare("select * from client order by nom ");
    //execution de la requete 
    $r->execute();
    $clients =  $r->fetchAll();
} catch (PDOException $e) {
    echo "Erreur e selection des clients   " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nouvelle facture</title>
</head>

<body>

    <form action="store.php" method="post">
        Date de facture : <input type="date" name="datefacture" id="">
        Client : <select type="number" name="client_id" id="">
        <option value="" selected>....</option>
<?php foreach($clients as $c){?>
            <option value="<?=$c['client_id']?>"><?=$c['nom']?> <?=$c['prenom']?></option>
<?php } ?>
        </select>
        <button>Ajouter la facture </button>
    </form>
</body>

</html>