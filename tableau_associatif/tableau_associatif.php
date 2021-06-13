<?php
$produit = ["libelle" => "hp dv 7", "prix" => 9000];
// var_dump($produit);
// print_r($produit);
$produit['qte']=100;
$produit[]=30;
$produit['config']=['processeur'=>'core i3','RAM'=>'8GO'];
$produit['fournisseurs']=['HP CASA','HP RABAT'];
// unset($produit['fournisseurs'][1]);
$produit['clients']=$produit['fournisseurs'];

unset($produit['fournisseurs']);

foreach($produit as $cle=>$valeur){
    if(!is_array($valeur))
echo "<h4>$cle  est $valeur</h4>";
else {
    if($cle=="config") echo "<h2>configuration : </h2>";
    if($cle=="clients") echo "<h2>Clients : </h2>";
    foreach($valeur as $c=>$v){
        echo "<h4>$c : $v</h4>";
    }
}
}
echo count($produit['clients']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Libelle</th>
                <th>Prix</th>
                <th>quantité</th>
                <th>config</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td><?=$produit['libelle']?></td>
                <td><?=$produit['prix']?></td>
                <td>quantité</td>
                <td>config</td>
            </tr>
        </tbody>

    </table>
</body>

</html>