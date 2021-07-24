<?php

if(isset($_GET['produit_id']) && isset($_GET['numero'])){
    // il s'agit de suppression
    extract($_GET);// creer auto $produit_id=$_GET['produit_id']=> $produit_id,$numero
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // recuperer la qtestock du produit en se basant sur le produit_id
    $r = $cnx->prepare("delete from ligne_facture where produit_id=? and numero=?");
    //execution de la requete 
    $r->execute([$produit_id,$numero]);
    $message="Suppression ok";
}
if (isset($_POST['numero']) && isset($_POST['produit_id'])) {
    try {

        // recuperer les donnees du formulaires (par leurs name )
        $numero = $_POST['numero'];
        $produit_id = $_POST['produit_id'];
        $qtefacture = $_POST['qtefacture'];
      // ou  extract($_POST);

        //connexion bd
        $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // recuperer la qtestock du produit en se basant sur le produit_id
        $r = $cnx->prepare("select * from produit where produit_id=?");
        //execution de la requete 
        $r->execute([$produit_id]);
     $produit=   $r->fetch();
     
        // preparation de la requete sql
        
        if($qtefacture<=$produit['qtestock']){
// verifier si le produit se trouve deja dans la facture

 // recuperer la qtestock du produit en se basant sur le produit_id
 $r = $cnx->prepare("select * from ligne_facture where produit_id=?");
 //execution de la requete 
 $r->execute([$produit_id]);
$produit_ligne=   $r->fetch();// false,0,[],""<=> empty
if(!empty($produit_ligne)){
    $r = $cnx->prepare("update   ligne_facture set qtefacture=qtefacture+? where produit_id=? and numero=?");
    //execution de la requete 
    $r->execute([$qtefacture,$produit_id,$numero]);
    // maj du stock
    $r = $cnx->prepare("update produit set qtestock= qtestock-? where produit_id=?");
    $r->execute([$qtefacture, $produit_id]);


}else{


        $r = $cnx->prepare("insert into ligne_facture(numero,produit_id,qtefacture) 
        values(?,?,?)");
        //execution de la requete 
        $r->execute([$numero, $produit_id, $qtefacture]);
        // maj du stock
        $r = $cnx->prepare("update produit set qtestock= qtestock-? where produit_id=?");
        $r->execute([$qtefacture, $produit_id]);
}
          header("location:create.php?numero=".$_GET['numero']);
        }else{
            $message="Stock insuffisant , il ne reste que  ".$produit['qtestock']." du produit : ".$produit['libelle'];
        }
        } catch (PDOException $e) {
        echo "Erreur ajout du produit dans la facture    " . $e->getMessage();
    }
}

try {


    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparation de la requete sql
    if(isset($_GET['numero']) && !empty($_GET['numero'])){
  $r = $cnx->prepare("SELECT  f.numero, f.datefacture , c.nom , c.prenom , p.libelle,p.prix ,
   l.qtefacture,p.prix*l.qtefacture as l_tht,  p.produit_id
    from facture f JOIN client c on f.client_id=c.client_id 
   join ligne_facture l on l.numero=f.numero join produit p on p.produit_id=l.produit_id
   where f.numero=?
   ");
    //execution de la requete 
    $r->execute([$_GET['numero']]);  
    }else{
       $r = $cnx->prepare("SELECT f.numero, f.datefacture , c.nom , c.prenom , p.libelle,p.prix , l.qtefacture,p.prix*l.qtefacture as l_tht from facture f JOIN client c on f.client_id=c.client_id join ligne_facture l on l.numero=f.numero join produit p on p.produit_id=l.produit_id");
    //execution de la requete 
    $r->execute();  
    }
   
    $resultat = $r->fetchAll();
    // print_r($resultat);
    //   header("location:index.php?m=ok");
} catch (PDOException $e) {
    echo "Erreur de selection des produits, client et factures    ".$e->getMessage();
}
//liste des factures 
try {


    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparation de la requete sql
    $r = $cnx->prepare("select * from facture ");
    //execution de la requete 
    $r->execute();
    $factures = $r->fetchAll();
    // print_r($resultat);
    //   header("location:index.php?m=ok");
} catch (PDOException $e) {
    echo "Erreur de selection des produits, client et factures    ";
}
//liste des produits 
try {


    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparation de la requete sql
    $r = $cnx->prepare("select * from produit ");
    //execution de la requete 
    $r->execute();
    $produits = $r->fetchAll();
    // print_r($resultat);
    //   header("location:index.php?m=ok");
} catch (PDOException $e) {
    echo "Erreur de selection des produits, client et factures    ";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
          @media print {
              a,form,.alert{
                  display: none !important;
              }
             
          }  

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout des produits dans une facture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 border mx-auto">
                <?php 
                if(isset($message)){
                ?>
<div class="alert alert-danger">
    <?=$message?>
</div>
                <?php } ?>
                <form action="create.php?<?php if(isset($_GET['numero'])) echo 'numero='.$_GET['numero']?>" method="post">
                    Facture : <select type="text" name="numero" class="form-control" onchange="window.location='http://phpl3.fst:8080/facturation/facture_produit/create.php?numero='+this.value">
                        <option value="" selected>...</option>
                        <?php
                        //recuperer la liste des factures 
                        foreach ($factures as $f) {
                        ?>
                        <option value="<?=$f['numero']?>"  <?php if(isset($_GET['numero']) && $_GET['numero']==$f['numero'] ) echo "selected"?>  ><?=$f['numero']?></option>
                        <?php } ?>
                       
                    </select>
                    Produit : <select type="text" name="produit_id" class="form-control">
                    <option value="" selected>...</option>
                        <?php
                        //recuperer la liste des factures 
                        foreach ($produits as $p) {
                        ?>
                        <option value="<?=$p['produit_id']?>"><?=$p['libelle']?> | <?=$p['qtestock']?> </option>
                        <?php } ?>
                        </select>
                    Quantite : <input type="number" name="qtefacture" id="" class="form-control">
                    <button class="btn btn-primary my-3">Ajouter</button>
                </form>
            </div>
            
        </div>
        
    </div>
    <div class="alert alert-info text-center">
    <?=count($resultat);?> Produit<?=(count($resultat)==1)? "":"s"?>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Num Facture</th>
                <th scope="col">Date de la facture</th>
                <th scope="col">Client</th>
                <th scope="col">Libellé</th>
                <th scope="col">prix</th>
                <th scope="col">quantité facturée</th>
                <th scope="col">total ligne HT</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total=0;
            foreach ($resultat as $ligne) {
                $total =$total+   $ligne['l_tht'] ;
            ?>
                <tr>
                    <td scope="col"><?= $ligne['numero'] ?></td>
                    <td scope="col"><?= $ligne['datefacture'] ?></td>
                    <td scope="col"><?= $ligne['nom'] ?> <?= $ligne['prenom'] ?></td>
                    <td scope="col"><?= $ligne['libelle'] ?></td>
                    <td scope="col"><?= $ligne['prix'] ?></td>
                    <td scope="col"><?= $ligne['qtefacture'] ?></td>
                    <td scope="col"><?= $ligne['l_tht'] ?></td>
                    
                    <td scope="col">

                    <a href="create.php?numero=<?= $ligne['numero'] ?>&produit_id=<?= $ligne['produit_id'] ?>" class="btn btn-sm btn-danger" 
                    
                    onclick="return confirm('supprimer?')"
                    >Supprimer</a>

                </td>
                </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <th colspan="5"></th>
                
                <th>THT</th>
                <th><?=$total?>$</th>
                
            </tfoot>
        </table>
        
        <a href="#" onclick="window.print()" class="btn btn-success">Imprimer</a>
        <a href="print.php?numero=<?=$_GET['numero']?>"class="btn btn-success">Imprimer ticket</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>