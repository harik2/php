<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid back">
        <div class="row" style="height: 100vh;">
            <div class="col-md-6 border m-auto  form p-3">
                <?php 
                if(isset($_GET['m'])){
                ?>
                     <div class="alert alert-success">
                            message envoyé avec succès

                     </div>  
                <?php } ?>
                   
                
                
                <form  action="enregister.php" method="post" >
                    <div class="mb-3">
                        <label for="np" class="form-label">Nom & Prénom : </label>
                        <input type="text" name="nomprenom" class="form-control" id="np" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email : </label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input name="genre" class="form-check-input" type="radio" value="homme" id="homme" checked >
                            <label class="form-check-label" for="homme">
                                Homme
                            </label>
                    </div>
                        <div class="form-chec form-switch">
                            <input class="form-check-input" name="genre" type="radio" value="femme" id="femme" >
                            <label class="form-check-label" for="femme">
                                Femme
                            </label>
                        </div>
                        <div class="mb-3">
                        <label for="sp" class="form-label">Spécialité : </label>
                        <select type="text" name="specialite" class="form-control" id="sp" aria-describedby="emailHelp">
                                <option value="" selected>...</option>
                                <option value="management">Management</option>
                                <option value="informatique">Informatique</option>
                        </select>
                    </div>
                        
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message : </label>
                <textarea name="message" class="form-control" id="message" aria-describedby="emailHelp">
                        </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>

        </div>

    </div>

    </div>





    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>