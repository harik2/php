<?php 
$message="";
$class="d-none";
if(isset($_GET['s']) && $_GET['s']=='ok'){
$message="Message envoyé avec succès";
$class="d-block";
}
if(isset($_GET['s']) && $_GET['s']=='sujet'){
$message="Le champs sujet est obligatoire";
$class="d-block alert-danger";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous-contacter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container border">


        <div class="row">
            <div class="col-md-6 border  mx-auto shadow mt-5">
               
                    <div class="alert alert-info <?=$class?>"><?=$message?></div>
              
                <form action="store.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Email :
                        </label>
                        <input type="email" class="form-control" name="email" required>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Sujet :
                        </label>
                        <input type="text" class="form-control" name="sujet" required>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Message :
                        </label>
                        <textarea type="text" class="form-control" name="message" required>
                            </textarea>

                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>



                </form>

            </div>

        </div>

    </div>


</body>

</html>