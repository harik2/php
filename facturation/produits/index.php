<?php
try {


    //connexion bd
    $cnx = new PDO('mysql:host=localhost;dbname=db_facturation', "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparation de la requete sql
    $r = $cnx->prepare("select * from produit");
    //execution de la requete 
    $r->execute();
    $produits = $r->fetchAll();
} catch (PDOException $e) {
    echo "Erreur     " . $e->getMessage();
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
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>


<body>
<?php
    define('BASE', $_SERVER['DOCUMENT_ROOT']);

    include_once(BASE . "/facturation/_menu.php"); ?>
    <div class="container">
        <div class="row">
        <?php foreach ($produits as $p) { ?>
            <div class="col-md-4 shadow bg-danger">
                <img src="../<?=$p['photo']?>" alt="" style="width:400px;height: 200px;max-width: 100%;"  class="img-fluid">
                <div class="alert alert-light text-center">
                    <h4><?=$p['libelle']?> </h4>
                    <h4><?=$p['prix']?>$</h4>
                    <h4><?=$p['qtestock']?> en stock</h4>
                    <hr>
                    <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $p['produit_id'] ?>">Supprimer</a>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <?php if (isset($_GET['m']) && $_GET['m'] == 'uniq') { ?>
                <div class="alert alert-danger">
                    Impossible de supprimer ce produit, car il est deja utilise dans des factures
                </div>
            <?php } ?>
            <?php if (isset($_GET['m']) && $_GET['m'] == 'del') { ?>
                <div class="alert alert-success">
                    le produit a ete supprime avec succes !
                </div>
            <?php } ?>
            <h3 class="text-center my-5  text-primary">
                Liste des produits en stock
            </h3>
            <table class="table table-tripped" id="matar">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">prix</th>
                        <th scope="col">Quantite en stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $p) { ?>
                        <tr>
                            <th scope="row"><?= $p['produit_id'] ?></th>
                            <td><img src="<?= ($p['photo'] == '') ? 'http://placehold.it/200x200' : '../' . $p['photo'] ?>" alt="" width="100" class="img-thumbnail"></td>
                            <td><?= $p['libelle'] ?></td>
                            <td><?= $p['prix'] ?></td>
                            <td><?= $p['qtestock'] ?></td>
                            <td><a class="btn btn-sm btn-danger" href="delete.php?id=<?= $p['produit_id'] ?>">S</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="http://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#matar').DataTable({
                language: {
                    "sEmptyTable": "Aucune donnée disponible dans le tableau",
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>