<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto shadow">
                <form action="store.php" method="post">
                    <div class="mb-3"><label for="libelle" class="form-label">Libellé : </label>
                        <input type="text" name="libelle" id="libelle" class="form-control">
                    </div>
                    <div class="mb-3"><label for="prix" class="form-label">Prix : </label>
                        <input type="text" class="form-control" name="prix" id="prix">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Ajouter</button>


                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>