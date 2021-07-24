<?php 

if(isset($_GET['numero']) && !empty($_GET['numero'])){
      //connexion bd
      $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
      $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $r = $cnx->prepare("SELECT  f.numero, f.datefacture , c.nom , c.prenom , p.libelle,p.prix ,
     l.qtefacture,p.prix*l.qtefacture as l_tht,  p.produit_id
      from facture f JOIN client c on f.client_id=c.client_id 
     join ligne_facture l on l.numero=f.numero join produit p on p.produit_id=l.produit_id
     where f.numero=?
     ");
      //execution de la requete 
      $r->execute([$_GET['numero']]);  
     $reslultat= $r->fetchAll();  
     $ligne1=$reslultat[0];
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture numero <?=$_GET['numero']?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <style>
        
         .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }

 @media print{
     a{
         display: none !important;
     }
 }
    </style>
    
</head>
<body>
    
<div class="container">
    <div class="page-header">
        <h1>Invoice Template </h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img class="img" alt="Invoce Template" src="http://pngimg.com/uploads/shopping_cart/shopping_cart_PNG59.png" /> </div>
                        <div class="col-md-8 text-right">
                            <h4 style="color: #F81D2D;"><strong>DIAGNE MARKET</strong></h4>
                            <p>221 ,Baker Street</p>
                            <p>1800-234-124</p>
                            <p>example@gmail.com</p>
                        </div>
                    </div> <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>FACTURE</h2>
                            <h5>#0000<?=$ligne1['numero']?>DM0</h5>
                        </div>
                    </div> <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Prix</h5>
                                    </th>
                                    <th>
                                        <h5>qte</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
<?php foreach($reslultat as $f ) {?>
                                <tr>
                                    <td class="col-md-9"><?=$f['libelle']?></td>
                                    <td class="col-md-3"></i> <?=$f['prix']?> cfa</td>
                                    <td class="col-md-3"> <?=$f['qtefacture']?> </td>
                                </tr>
<?php }?>
                                <tr>
                                    <td class="text-right">
                                        <p> <strong>Shipment and Taxes:</strong> </p>
                                        <p> <strong>Total Amount: </strong> </p>
                                        <p> <strong>Discount: </strong> </p>
                                        <p> <strong>Payable Amount: </strong> </p>
                                    </td>
                                    <td>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 82,900</strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> </p>
                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900</strong> </p>
                                    </td>
                                </tr>
                                <tr style="color: #F81D2D;">
                                    <td class="text-right">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900 </strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date :</b> 6 June 2019</p> <br />
                            <p><b>Signature</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" onclick="window.print()" class="btn btn-success">Imprimer</a>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js	"></script>
</body>
</html>