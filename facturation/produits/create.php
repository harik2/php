<?php

// print_r($_SERVER);
// $chemin_projet=$_SERVER['DOCUMENT_ROOT'];
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
    <?php
    define('BASE', $_SERVER['DOCUMENT_ROOT']);

    include_once(BASE . "/facturation/_menu.php"); ?>

    <div class="container">

        <div class="row">
            <div class="col-md-6 mx-auto border mt-3 p-3">
                <?php
                if (isset($_GET['m']) && $_GET['m'] == 'ok') { ?>
                    <div class="alert alert-info text-center">
                        Ajout Ok
                    </div>

                <?php } ?>
                <form action="store.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        Libellé: <input type="text" name="libelle" id="libelle" class="form-control">
                    </div>
                    <div class="mb-3">
                        Prix: <input type="text" name="prix" id="prix" class="form-control">
                    </div>
                    <div class="mb-3">
                        Quantité en stock: <input type="text" name="qtestock" id="qtestock" class="form-control">
                    </div>
                    <div class="mb-3">
                        Photo: <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary col-md-6">Valider</button>
                    </div>
                </form>


            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>