<?php
$hp = ["libelle" => "hp dv 7", "prix" => 9000, 'qte' => 100];
$dell = ["libelle" => "dell 4", "prix" => 10000, 'qte' => 0];
$stock = [$hp,$dell ];
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
<?php  foreach($stock as $produit) {?>
            <tr>
                <td><?= $produit['libelle'] ?></td>
                <td><?= $produit['prix'] ?></td>
                <td>quantité</td>
                <td>config</td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</body>
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
<?php  for($i=0;$i<count($stock) ;$i++) {?>
            <tr>
                <td><?= $stock[$i]['libelle'] ?></td>
                <td><?= $stock[$i]['prix'] ?></td>
                <td>quantité</td>
                <td>config</td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</body>

</html>