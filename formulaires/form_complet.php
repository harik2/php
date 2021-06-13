<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire complet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container border">
        <div class="row">
            <div class="col-md-6 border mx-auto mt-5">
                <form action="traitement.php" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label" >
                            Email :
                        </label>
                        <input required type="email" class="form-control" placeholder="test@gmail.com" id="email" name="email" autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="passe" class="form-label">
                           Mot de  passe :
                        </label>
                        <input required type="password" class="form-control" id="passe" name="passe" autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <label for="specialite" class="form-label">
                         Spécialité : 
                        </label>
                        <select  class="form-control" id="specialite" multiple name="specialite[]" >
                        <option value="" selected>...</option>
                        <option value="developpement">Développement</option>
                        <option value="gestion">Gestion</option>
                        <option value="designer">Designer</option>
                        </select>
                    </div>
                    <div class="form-check mb-4">
  <input class="form-check-input" type="radio"  name="genre" value="homme" id="homme">
  <label class="form-check-label" for="homme">
  Homme 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="femme" id="femme" name="genre">
  <label class="form-check-label" for="femme">
    Femme
  </label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="rouge" name="couleur[]" value="red" checked>
  <label class="form-check-label" for="rouge">Rouge</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="vert" name="couleur[]" value="green" >
  <label class="form-check-label" for="vert">Vert</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="bleu" name="couleur[]" value="blue">
  <label class="form-check-label" for="bleu">Bleu</label>
</div>

<div class="mb-4">
<label for="adresse" class="form-label"></label>
<textarea class="form-control" id="adresse"  name="adresse" ></textarea>
</div>

<div class="mb-4">
<button type="submit" class="btn btn-primary">Envoyer</button>
<button type="reset" class="btn btn-danger">RAZ</button>
<button type="button" class="btn btn-info">RIEN</button>
</div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>